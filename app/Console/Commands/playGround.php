<?php

namespace App\Console\Commands;

use App\Models\Opportunity;
use App\Models\User;
use App\Notifications\OpportunityWon;
use Illuminate\Console\Command;

class playGround extends Command
{
    protected $signature = 'play';

    protected $description = 'Command description';

    public function handle()
    {
        $user = User::inRandomOrder()->first();
        // dd($user);

        $opportunity = Opportunity::whereStatus('won')->inRandomOrder()->first();

        $user->notify(
            new OpportunityWon(
                $opportunity
            )
        );
    }
}
