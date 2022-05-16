<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        factory(User::class)->create([
            "email"=>"pruebas@amobasoftware.com",
            "password"=>bcrypt("134679")
        ]);
    }
}
