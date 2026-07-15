<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // First default user for testing purposes
        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),

        ]);
        // 2nd default user for testing purposes
        User::factory()->create([
            'name' => 'Mahbub WebDev',
            'username' => 'mahbub',
            'email' => 'mahbub.webdev@example.com',
            'password' => bcrypt('12321232'),

        ]);

        // Insert default data row for home slides
        DB::table('home_slides')->insert([
            'home_slide' => 'upload/home_slide/default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert default data row for the about page
        DB::table('abouts')->insert([
            'title' => 'I am a Professional Web Developer',
            'short_title' => 'About Me',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->call([
            FooterTableSeeder::class,
        ]);
    }
}
