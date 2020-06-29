<?php

use App\User;
use Illuminate\Database\Seeder;

class SimpleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name       = 'First User';
        $email      = 'user@user.com';
        $password   = 'user123';
        $active     = true;

        $user       = User::where('email', $email)->first();

        $user_data  = [
            'name'            => $name,
            'email'           => $email,
            'password'        => bcrypt($password),
            'active'          => $active,
            'activate_token'  => ''
        ];

        if($user)
        {
            $user->update($user_data);
        }else{
            User::create($user_data);
        }
    }
}
