<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@dianne.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'approved_at' => now(),
        ]);
    }
}
