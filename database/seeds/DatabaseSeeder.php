<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             PostTableSeeder::class,
             ContactTableSeeder::class,
             ]);
    }
}
