<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Missionary extends Model
{
    protected $casts = [
        'phone_1' => 'array',
        'phone_2' => 'array',
    ];

    protected $fillable = [
        'id',
        'name',
        'email_1',
        'email_2',
        'phone_1',
        'phone_2',
        'note',
        'allocated_in',
        'allocated_country',
        'allocated_state',
        'allocated_city',
        'allocated_district',
        'allocated_lat',
        'allocated_long',
        'created_at',
        'updated_at',
        'created_by',
    ];
}
