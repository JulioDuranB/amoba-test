<?php

use Illuminate\Database\Seeder;
use App\Persons;

class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Persons::class,10)->create([
            'type_person' => '1',
        ]);
        factory(App\Persons::class,10)->create([
            'type_person' => '0',
        ]);
    }
}
