<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const STATUS_ENABLE = 0;    //状态(启用)
    const STATUS_DISABLE = 1;    //状态(禁用)

    protected $fillable = [
        'name','china_id',
        'store_name','phone','province','city',
        'county','address','address_details',
        'status','user_type','bank','bank_name',
        'bank_number'
    ];

    protected $hidden = [
       /* 'password', 'remember_token',*/
    ];
}
