<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    protected $fillable = [
        'user_id','company_name','company_number','legal_name','legal_phone','legal_china_id'
    ];
}
