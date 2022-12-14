<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

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
        DB::table('users')->insert(['username' => 'KNJ',//Str::random(10),
        'password' => Hash::make('KNJ@0912knj'), 
        'role' => 'admin',
        'nic'=>'968553266V',
        'gender'=>'Male',
        'mobile'=>'0779352589',
        'remember_token' => Str::random(10), ]);

        DB::table('users')->insert(['username' => 'Fernando',//Str::random(10),
        'password' => Hash::make('JOHN@0912john'), 
        'role' => 'admin',
        'name'=> 'W.J.H.P. Fernando',
        'address'=>'Marawila',
        'gender'=>'Male',
        'nic'=>'968553265V',
        'mobile'=>'0779352539',
        'remember_token' => Str::random(10), ]);
    }
}
