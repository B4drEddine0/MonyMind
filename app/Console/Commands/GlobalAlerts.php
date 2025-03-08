<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\alert;
use App\Models\Depences;
use Illuminate\Support\Facades\Mail;
use App\Mail\GlobalAlert;
use Carbon\Carbon;

class GlobalAlerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:global-alerts';

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
        $users = User::all();

        foreach ($users as $user) { 
            $alert = Alert::where('user_id', $user->id)->latest()->first(['id','porcentage','user_id']);
            
            if (!$alert) {
                continue;
            }
            
            $percentage = $alert->porcentage;
            $salPercentage = $user->salaire * ($percentage / 100);
            $depenses = Depences::where('user_id', $user->id)->whereMonth('date', Carbon::now()->month)->whereYear('date', Carbon::now()->year)->sum('amount');
            $username = $user->name;
            if ($depenses >= $salPercentage) {
                    $Data = [
                        'username' => $username,
                        'alert' => $alert
                    ];
                    Mail::to($user->email)->send(new GlobalAlert($Data));
            } else {
                $this->info('the percentage not reached yet, no alert needed');
            }
        }
        
        $this->info('Global alerts process completed successfully.');
    }
}
