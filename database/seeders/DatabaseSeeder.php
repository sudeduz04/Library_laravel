<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $this->call([
            UserSeeder::class,
        ]);

        DB::table('publicators')->insert([
            'name' => 'İş Bankası',
            'email' => 'isbankasi@gmail.com',
            'phone' => '05555555555',
            'address' => 'Elazığ',
            'created_at' => now(),
        ]);
        DB::table('authors')->insert([
            'name' => 'Muhammed',
            'surname' => 'Aydın',
            'created_at' => now(),
        ]);
    }
}
