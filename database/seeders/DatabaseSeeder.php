<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // this is just for test.
        $currentDate = Carbon::now();

        $user_id = DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'rolType' => 'Administrator',
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);

        DB::table('password_manager')->insert([
            'social_network_name' => 'Facebook',
            'url' => 'htps://facebook.com/okshop',
            'username' => 'okshop',
            'password' => Crypt::encryptString('password'),
            'user_id' => $user_id,
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);


        $this->call([
            ProductSeeder::class
        ]);
    }
}
