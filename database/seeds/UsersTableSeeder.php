<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id'=>1,
            'name'=>'Sam Global Technologies',
            'email'=>'sam@gmail.com',
            'password'=>bcrypt(2446224462),
            'remember_token'=>str_random(10),

        ]);
    }
}
