<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('categories')->insert([
            'CategoryName' => 'Romance',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'CategoryName' => 'Horror',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('authors')->insert([
            'name' => 'RFJST4REAL',
            'birth_of_date' => '2023/10/10',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('authors')->insert([
            'name' => 'The Rock',
            'birth_of_date' => '2023/10/10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->call([
            UserAdminSeeder::class,
        ]);
    }
}
