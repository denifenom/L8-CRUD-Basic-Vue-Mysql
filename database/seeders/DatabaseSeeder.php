<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {       
        //$this->call(PostTableSeeder::class);
        //$this->call(ContactTableSeeder::class);

        //Bisa juga dengan Query Builder
        // DB::table('contacts')->insert([
        //     'name' => Str::random(10),
        //     'phone' => Str::random(10).'@gmail.com'
        // ]);

        \App\Models\Contact::factory(5)->create();

        //Bisa juga dengan factory
        // Contact::factory()
        // ->count(5)
        // ->hasPosts(1)
        // ->create();
    }
}
