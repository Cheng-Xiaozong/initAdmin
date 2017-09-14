<?php

namespace App\Http\Controllers\Area;

use App\Services\AreaInfoService;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AreaInfoController extends Controller
{

    protected $Request;
    protected $AreaInfo;

    public function __construct(Request $request,AreaInfoService $areainfo)
    {
        $this->Request=$request;
        $this->AreaInfo=$areainfo;
    }

    //省份变动
    public function getElementByPid()
    {
        $id=$this->Request->input('id');
        $elements=$this->AreaInfo::getElementByPid($id);
        if(count($elements)>0)
        {
            return ajaxReturn(0,'获取成功',$elements);
        }else{
            return ajaxReturn(-1,'获取失败',$elements);
        }
    }
}
