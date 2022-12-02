<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'adminnya saya',
            'username'=>'admin123',
            'email'=>'admin123@gmail.com',
            'password'=>bcrypt('admin123'),
            'is_admin'=>true
        ]);

        User::create([
            'name'=>'usernya saya',
            'username'=>'user123',
            'email'=>'user123@gmail.com',
            'password'=>bcrypt('user123'),
            'is_admin'=>false
        ]);
    }
}
