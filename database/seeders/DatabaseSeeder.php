<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test5@example.com',
            'password' => bcrypt('123'),
        ]);

        $customer = new \App\Models\Customer;

        $customer->phone = '0920119922';
        $customer->password = bcrypt('123');
        $customer->save();
       
        // php artisan db:seed
    }
}
