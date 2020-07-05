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
        $admins     = [
            [
                'name'       => 'First User',
                'email'      => 'firstuser@user.com',
                'password'   => 'user123',
                'active'     => true,
            ],
            [
                'name'       => 'Second User',
                'email'      => 'seconduser@user.com',
                'password'   => 'user123',
                'active'     => true,
            ],
        ];

        foreach($admins as $a)
        {
            $user       = User::where('email', $a['email'])->first();

            $user_data  = [
                'name'            => $a['name'],
                'email'           => $a['email'],
                'password'        => bcrypt($a['password']),
                'active'          => $a['active'],
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
}
