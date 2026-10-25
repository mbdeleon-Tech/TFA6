<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create(['username' => 'admin.marc', 'full_name' => 'Alex Rivera', 'password' => 'Northstar123!']);
        User::query()->create(['username' => 'bea.villanueva', 'full_name' => 'Bea Villanueva', 'password' => 'Northstar123!']);
        User::query()->create(['username' => 'carlo.ramos', 'full_name' => 'Carlo Ramos', 'password' => 'Northstar123!']);
        User::query()->create(['username' => 'diana.torres', 'full_name' => 'Diana Torres', 'password' => 'Northstar123!']);
        User::query()->create(['username' => 'ethan.lim', 'full_name' => 'Ethan Lim', 'password' => 'Northstar123!']);

        foreach ([
            ['Andrea Santos', 'andrea.santos@example.com', '0917 000 1001'],
            ['Miguel Reyes', 'miguel.reyes@example.com', '0917 000 1002'],
            ['Sofia Cruz', 'sofia.cruz@example.com', '0917 000 1003'],
            ['Gabriel Mendoza', 'gabriel.mendoza@example.com', '0917 000 1004'],
            ['Isabella Garcia', 'isabella.garcia@example.com', '0917 000 1005'],
        ] as [$fullName, $email, $phone]) {
            Customer::query()->create(compact('fullName', 'email', 'phone'));
        }
    }
}
