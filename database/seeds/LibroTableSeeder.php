<?php

use Illuminate\Database\Seeder;
use App\Libro;

class LibroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Libro::class, 80)->create();
    }
}
