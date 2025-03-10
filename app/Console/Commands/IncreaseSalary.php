<?php

namespace App\Console\Commands;

use App\Mail\autoSalaire;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Epargne;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class IncreaseSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:increase-salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $users = User::whereNotNull('salaire')->whereDay('date_salaire', $now->day)->get();

        foreach($users as $user){
            $epargne = $user->epargne()->first();
            if ($epargne) {
                if($user->budget >= $epargne->target_amount){
                    $epargne->saved_amount = $epargne->target_amount;
                    $epargne->is_completed = true;
                    $epargne->save();
                    $user->budget -= $epargne->target_amount;
                    $user->save();
                }else{
                    $epargne->saved_amount = $user->budget;
                    $epargne->save();
                    $user->budget = 0;
                    $user->save();
                }
            } else {
                $this->warn("No epargne record found for {$user->name}");
            }
        }

        foreach($users as $user){
            $user->budget += $user->salaire;
            $user->save();
            $Data = [
                'username' => $user->name,
                'salaire' => $user->salaire
            ];
            Mail::to($user->email)->send(new autoSalaire($Data));
            $this->info("Updated budget for {$user->name}");
        }
        $this->info('User budgets have been updated successfully for todays matching users.');
    }
}
