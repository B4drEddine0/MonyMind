<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Depences;
use App\Models\User;
use Carbon\Carbon;

class RecurrentesDepences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:recurrentes-depences';

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
        $recurringDepences = Depences::where('is_recurring', true)->get();

        foreach ($recurringDepences as $depence) {
            $today = Carbon::now();
            $originalDate = Carbon::parse($depence->date);
            $shouldProcess = false;
    
            switch ($depence->recurrence_schedule) {
                case 'monthly':
                    if ($today->day == $originalDate->day) {
                        $shouldProcess = true;
                    }
                    break;
                case 'weekly':
                    if ($today->dayOfWeek == $originalDate->dayOfWeek) {
                        $shouldProcess = true;
                    }
                    break;
                case 'yearly':
                    if ($today->day == $originalDate->day && $today->month == $originalDate->month) {
                        $shouldProcess = true;
                    }
                    break;
            }
            
            if ($shouldProcess) {
                $user = User::find($depence->user_id);
                
                if ($user) {
                    $user->budget -= $depence->amount;
                    $user->save();
                    
                    $newDepence = $depence->replicate();
                    $newDepence->date = $today;
                    $newDepence->is_recurring = false;
                    $newDepence->save();
                }
            }
        }

        $this->info("done.");
    }
}
