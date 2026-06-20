<?php

namespace Database\Seeders;

use App\Enum\Can;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()
            ->withPermission(Can::BE_AN_ADMIN)
            ->create([
                'name'     => 'Admin do CRM',
                'email'    => 'admin@crm.com',
                // 'phone'    => '11999999999',
                'password' => 'password',
                // 'notification_channels' => ['mail'],
                'notification_channels' => ["mail", "database", "sms", "whatsapp", "telegram"],
            ]);

        $this->normalUsers();
        $this->deletedUsers($admin);
    }

    private function defaultDefinition(): array
    {
         $definition = array_merge((new UserFactory())->definition(), ['password' => '$2y$10$Ybe7g6ojOtQLVDmX914YUeCqdpfKmuOkPlA9n0zvH.3HLO0u0PA56']);

        $definition['notification_channels'] = json_encode($definition['notification_channels']);

        return $definition;
    }

    private function normalUsers(): void
    {
        User::query()->insert(
            array_map(
                fn () => $this->defaultDefinition(),
                range(1, 50)
            )
        );
    }

    private function deletedUsers(User $admin): void
    {
        User::query()->insert(
            array_map(
                fn () => array_merge(
                    $this->defaultDefinition(),
                    [
                        'deleted_at' => now(),
                        'deleted_by' => $admin->id,
                    ]
                ),
                range(1, 50)
            )
        );
    }
}
