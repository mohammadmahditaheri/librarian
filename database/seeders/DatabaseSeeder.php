<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\Books\database\seeders\AuthorSeeder;
use App\Services\Books\database\seeders\BookCopySeeder;
use App\Services\Books\database\seeders\BookSeeder;
use App\Services\Books\database\seeders\CategorySeeder;
use App\Services\Books\database\seeders\LanguageSeeder;
use App\Services\Books\database\seeders\PublisherSeeder;
use Illuminate\Database\Seeder;

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
            LanguageSeeder::class,
            CategorySeeder::class,
            PublisherSeeder::class,
            BookSeeder::class,
            BookCopySeeder::class
        ]);
    }
}
