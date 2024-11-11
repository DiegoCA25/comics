<?php

namespace Database\Seeders;

use App\Models\Comic;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Escritor::factory(25)->create();
        Comic::factory(15)->create();

        for ($i=1; $i <=15 ; $i++) { 
            $comic = Comic::find($i);
            $comic->escritors()->attach(random_int(1,25));
        }

    }
}
