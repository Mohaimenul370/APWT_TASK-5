<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'name'=>'Tanjimul Islam',
                'email'=>'admin@tnrsoft.com',
                'userType'=>'1',
                'password'=> bcrypt('123456'),

            ],

            [
                'name'=>'User',
                'email'=>'user@tnrsoft.com',
                'userType'=>'0',
                'password'=> bcrypt('123456'),

            ],

        ];

  

        foreach ($user as $key => $value) {

            User::create($value);

        }
    }
}
