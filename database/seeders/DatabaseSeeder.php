<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $dbPath = base_path('/database/squarepeg.sqlite');

        // Create sqlite database, if needed
        if (! file_exists($dbPath)) {
            file_put_contents($dbPath, '');
        }
    }
}
