<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/9/12
 * Time: 11:12
 */
namespace App\Services;

use App\User;
use App\UserCompany;
use App\UserPersonal;

class UserService
{

    //通过ID查找
    public static function getUserById($id)
    {
        return User::find($id);
    }

    //通过手机号查找
    public static function getUserByPhone($phone)
    {
        return User::where('phone','=',$phone)->first();
    }

    //创建用户
    public static function create($data)
    {
        return User::create($data);
    }

    //创建个人关联数据
    public static function createPersonalUser($data)
    {
        return UserPersonal::create($data);
    }
    //创建公司关联数据
    public static function createCompanyUser($data)
    {
        return UserCompany::create($data);
    }

}