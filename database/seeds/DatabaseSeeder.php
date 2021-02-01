<?php

use Illuminate\Database\Seeder;
use App\User;
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
