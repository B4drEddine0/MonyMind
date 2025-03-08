<?php

use App\Console\Commands\GlobalAlerts;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\IncreaseSalary;
use App\Console\Commands\RecurrentesDepences;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command(IncreaseSalary::class)->daily()->at('14:55');
Schedule::command(GlobalAlerts::class)->daily()->at('14:55');
Schedule::command(RecurrentesDepences::class)->daily()->at('14:55');