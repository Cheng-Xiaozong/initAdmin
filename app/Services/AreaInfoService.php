<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/9/12
 * Time: 11:12
 */
namespace App\Services;

use App\AreaInfo;

class AreaInfoService
{
    //初始化省县市
    public static function initData()
    {
        return AreaInfo::where('pid','=',0)->get()->toArray();
    }

    //获取子类
    public static function getElementByPid($id)
    {
        return AreaInfo::where('pid','=',$id)->get()->toArray();
    }

}