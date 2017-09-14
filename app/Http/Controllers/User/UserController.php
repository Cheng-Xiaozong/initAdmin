<?php

namespace App\Http\Controllers\User;

use App\Services\AreaInfoService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $Request;
    protected $User;
    protected $AreaInfo;

    public function __construct(Request $request,UserService $user,AreaInfoService $areainfo)
    {
        $this->User=$user;
        $this->Request=$request;
        $this->AreaInfo=$areainfo;
    }

    //登陆
    public function login()
    {
        if($this->Request->isMethod('post'))
        {
            $data=$this->Request->input('data');
            if(empty($data['captcha']))
            {
                return redirect('/login')->with('error', '请输入正确的验证码！');
            }

            $user=$this->User::getUserByPhone($data['phone']);
            if(empty($user)){
                return redirect('/login')->with('error', '该手机号未注册，请检查你的手机号！');
            }

            if($user->status==1)
            {
                return redirect('/login')->with('error', '该帐号未被启用，请联系管理员！');
            }
            $this->Request->session()->put('user',$user);
            return redirect('/')->with('success', '登陆成功');
        }
        return view('user.login');
    }

    //登出
    public function logout()
    {
        $this->Request->session()->forget('user');
        if(!$this->Request->session()->has('user'))
        {
            return redirect('/login')->with('success', '退出成功');
        }
    }

    //注册
    public function register()
    {
        if($this->Request->isMethod('post'))
        {
            $data=$this->Request->input('data');
            $this->registerDataVerification();
            $user=$this->User::create($data);
            if($user)
            {
                $data_user['user_id']=$user->id;
                if($data['user_type']==0)
                {
                    $this->User::createPersonalUser($data_user);
                }else{
                    $data_user['company_name']=$data['company_name'];
                    $data_user['company_number']=$data['company_number'];
                    $data_user['legal_name']=$data['legal_name'];
                    $data_user['legal_phone']=$data['legal_phone'];
                    $data_user['legal_china_id']=$data['legal_china_id'];
                    $this->User::createCompanyUser($data_user);
                }
                return redirect('/login')->with('success', '注册成功，请联系管理员开通帐号');
            }else{
                return redirect()->back()->with('error','注册失败，请重试！');
            }
        }
        $data['area_info']=$this->AreaInfo::initData();
        return view('user.register',$data);
    }

    //验证数据
    public function registerDataVerification()
    {
        $data_field=[
            "data.name" => 'required',
            "data.phone" => 'required|unique:users,phone',
            "data.china_id" => 'required',
            "data.store_name" => 'required',
            "data.province" => 'required',
            "data.city" => 'required',
            "data.county" => 'required',
            "data.address" => 'required',
            "data.address_details" => 'required',
            "data.bank" => 'required',
            "data.bank_name" => 'required',
            "data.bank_number" => 'required',
            "data.user_type" => 'required',
        ];
        $data_dec=[
            'data.name' => '姓名',
            'data.phone' => '手机号',
            'data.china_id' => '身份证',
            'data.store_name' => '商店名称',
            'data.province' => '省份',
            'data.city' => '城市',
            'data.county' => '县',
            'data.address' => '详细地址',
            'data.address_details' => '完整地址',
            'data.bank' => '收款银行',
            'data.bank_name' => '开户名称',
            'data.bank_number' => '银行帐号',
            'data.user_type' => '注册类型',
        ];

        //如果是公司需要添加验证字段
        if($this->Request->input('data')['user_type']==1)
        {
            $data_field['data.company_name']='required';
            $data_field['data.company_number']='required';
            $data_field['data.legal_name']='required';
            $data_field['data.legal_phone']='required';
            $data_field['data.legal_china_id']='required';
            $data_dec['data.company_name']='公司名称';
            $data_dec['data.company_number']='证件号码';
            $data_dec['data.legal_name']='法人姓名';
            $data_dec['data.legal_phone']='法人手机号';
            $data_dec['data.legal_china_id']='法人身份证号';
        }
        $this->validate($this->Request, $data_field,
            [
            'required' => ':attribute 为必填项',
            'integer' => ':attribute 必须为整数',
            'unique'=>':attribute 已被注册',
            ],$data_dec);

    }

}
