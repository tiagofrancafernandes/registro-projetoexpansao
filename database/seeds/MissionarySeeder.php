<?php

use App\Missionary;
use Illuminate\Database\Seeder;

class MissionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data        = [
            'name'                => rand(100, 200).'_name',
            'email_1'             => rand(100, 200).'_email_1@email.com',
            'phone_1'             => ["number" => "444444444444444","socials" => ["wa" => "1", "telegram" => "1"]],
            'phone_2'             => ["number" => "444444444444444","socials" => ["telegram" => "1"]],
            // 'note'                => rand(100, 200).'_note',
            'allocated_in'        => 'Cidade tal',
            'allocated_country'   => 'Brazil',
            'allocated_state'     => 'Rondonia',
            'allocated_city'      => 'Porto Velho',
            'allocated_district'  => 'centro',
            'allocated_lat'       => '',
            'allocated_long'      => '',
            'created_by'          => 2,
        ];

        $missionary = Missionary::updateOrCreate(['email_1' => $data['email_1']], $data);


    }
}
