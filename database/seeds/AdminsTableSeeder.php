<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name       = 'Admin';
        $email      = 'admin@admin.com';
        $password   = 'admin123';
        $active     = true;

        $user       = Admin::where('email', $email)->first();

        $user_data  = [
            'name'      => $name,
            'email'     => $email,
            'password'  => bcrypt($password),
            'active'    => $active,
        ];

        if($user)
        {
            $user->update($user_data);
        }else{
            Admin::create($user_data);
        }
    }
}
