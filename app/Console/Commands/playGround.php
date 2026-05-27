<?php

namespace App\Console\Commands;

use App\Models\Opportunity;
use App\Models\User;
use App\Notifications\OpportunityWon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class playGround extends Command
{
    protected $signature = 'play';

    protected $description = 'Command description';

    public function handle()
    {
        // $user = User::inRandomOrder()->first();
        // dd($user);

        $users = User::query()->limit(10)->get();

        $opportunity = Opportunity::whereStatus('won')->inRandomOrder()->first();

        Notification::send($users, new OpportunityWon($opportunity));

        //também poderia enviar mais usuários utilizando o notify do modelo User, mas nesse caso, o notify do Laravel não é tão performático, pois ele dispara um evento para cada notificação enviada, e isso pode ser um problema quando temos muitos usuários para notificar. Já o Notification::send é mais performático, pois ele dispara um evento para cada notificação enviada, mas ele é mais eficiente, pois ele agrupa as notificações por tipo e por canal de envio, e isso pode ser um problema quando temos muitos usuários para notificar.
        // $users->foreach(function (User $user) use ($opportunity) {
        //     $user->notify(new OpportunityWon($opportunity));
        // });

        // $user->notify(
        //     new OpportunityWon(
        //         $opportunity
        //     )
        // );
    }
}
