<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

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
        $users = User::whereNotNull('salaire')->whereMonth('date_salaire', $now->month)->whereDay('date_salaire', $now->day)->get();

        foreach($users as $user){
            $user->budget += $user->salaire;
            $user->save();
            $this->info("Updated budget for {$user->name}");
        }
        $this->info('User budgets have been updated successfully for todays matching users.');
    }
}
