<?php
/**
 * Created by PhpStorm.
 * User: cheney
 * Date: 2017/9/13
 * Time: 16:48
 */
if(!function_exists('ajaxReturn'))
{
    function ajaxReturn($status,$message,$data=null)
    {
        return ['status'=>$status,'message'=>$message,'data'=>$data];
    }
}