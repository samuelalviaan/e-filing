<?php
namespace Database\Seeders;

use App\Archive;
use Database\Seeders\UserSeeder;
use Database\Seeders\ArchivesTableSeeder;
use Database\Seeders\CodeArchivesSeeder;
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
        $this->call(UserSeeder::class);
        // $this->call(ArchivesTableSeeder::class);
        // $this->call(CodeArchivesSeeder::class);

        // Archive::factory(50)->create();
    }
}
