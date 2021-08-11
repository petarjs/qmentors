<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'petar+admin@quantox.com',
            'password' => bcrypt('123123123'),
        ]);

        $operator = User::create([
            'name' => 'Operator',
            'email' => 'petar+operator@quantox.com',
            'password' => bcrypt('123123123'),
        ]);

        $mentor = User::create([
            'name' => 'Mentor',
            'email' => "petar+mentor@quantox.com",
            'password' => bcrypt('123123123'),
        ]);

        $mentee = User::create([
            'name' => 'Mentee',
            'email' => 'petar+mentee@quantox.com',
            'password' => bcrypt('123123123'),
        ]);

        $admin->assignRole(['admin', 'operator']);
        $operator->assignRole('operator');
        $mentor->assignRole('mentor');
        $mentee->assignRole('mentee');
    }
}
