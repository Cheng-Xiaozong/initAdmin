@extends('layout.iframe')
@section('style')
    <link rel="stylesheet" href="{{asset('Amaze/css/register.css')}}">
@endsection
@section('content')
    @include('common.errormsg')
    <div class="am-g main_part">
        <div class="box">
            <h1><span>保农经销商</span>管理员注册</h1>
            <form action="{{url('/register')}}" method="post" class="am-form" data-am-validator>
                {{ csrf_field() }}
                <fieldset>
                    <hr style="border:1px solid #fff;">
                    <div class="am-form-group">
                        <label for="doc-vld-name-2">姓名：</label>
                        <input type="text" id="doc-vld-name-2" minlength="2" placeholder="输入用户名（至少 2 个字符）" name="data[name]" value="{{old('data')['name']}}"  required/>
                        {{--<div class="error-msg">该手机号已经被注册</div>--}}
                    </div>

                  <div class="am-form-group">
                        <label for="doc-vld-name-2">手机号<small><span class="captcha" href="javascript:;">（发送验证码）</span></small>：</label>
                        <input type="text" id="doc-vld-name-2"  pattern="^1((3|5|8){1}\d{1}|70)\d{8}$" placeholder="输入手机号" name="data[phone]" value="{{old('data')['phone']}}"  required/>
                    </div>

                  <div class="am-form-group">
                        <label for="doc-vld-name-2">验证码：</label>
                        <input type="text" id="doc-vld-name-2"  placeholder="输入验证码" name="data[captcha]" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-url-2">身份证号：</label>
                        <input type="text" id="doc-vld-url-2" name="data[china_id]" value="{{old('data')['china_id']}}"  placeholder="输入身份证号"  pattern="^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-name-2">商城名称：</label>
                        <input type="text" id="doc-vld-name-2" minlength="3" placeholder="输入商城名称（至少 3 个字符）" name="data[store_name]" value="{{old('data')['store_name']}}"  required/>
                    </div>

                    <div class="am-form-group select-box clear">
                        <label for="doc-vld-name-2">经营所在地：</label>
                        <div style="height: 40px;">
                            <select name="data[province]" data-url="{{url('/getElementByPid')}}" required>
                                <option value="">请选择</option>
                                @foreach($area_info as $province)
                                    <option value="{{$province['id']}}">{{$province['name']}}</option>
                                @endforeach
                            </select>
                            <select name="data[city]" data-url="{{url('/getElementByPid')}}" required>
                                <option value="">请选择</option>
                            </select>
                            <select name="data[county]" required>
                                <option value="">请选择</option>
                            </select>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-name-2">详细地址：</label>
                        <input type="text" id="doc-vld-name-2"  placeholder="具体地址，不含省市县区" name="data[address]" value="{{old('data')['address']}}"  required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-name-2">完整地址：</label>
                        <input type="text" id="doc-vld-name-2"  placeholder="完整地址" name="data[address_details]" value="{{old('data')['address_details']}}"  readonly required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-name-2">收款银行：</label>
                        <input type="text" id="doc-vld-name-2"  placeholder="如：农业银行/工商银行" name="data[bank]"  value="{{old('data')['bank']}}" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-name-2">开户名称：</label>
                        <input type="text" id="doc-vld-name-2"  placeholder="开户名称如：张三" name="data[bank_name]"  value="{{old('data')['bank_name']}}" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-vld-name-2">银行帐号：</label>
                        <input type="text" id="doc-vld-name-2"  placeholder="请输入银行帐号" name="data[bank_number]"  value="{{old('data')['bank_number']}}" required/>
                    </div>

                    <div class="am-form-group">
                        <label for="doc-select-1">注册类型</label>
                        <select id="doc-select-1"  name="data[user_type]" required>
                            <option value="">请选择你的注册类型</option>
                            <option @if(old('data')['user_type']==0) selected @endif value="0">我是个体户</option>
                            <option @if(old('data')['user_type']==1) selected @endif value="1">我是公司</option>
                        </select>
                        <span class="am-form-caret"></span>
                    </div>

                    <div class="legal_fom" style="display: none">
                        <div class="am-form-group">
                            <label for="doc-vld-name-2">公司名称：</label>
                            <input type="text" id="doc-vld-name-2"  placeholder="请输入公司名称" name="data[company_name]"  value="{{old('data')['company_name']}}" required/>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-vld-name-2">证件号码：</label>
                            <input type="text" id="doc-vld-name-2"  placeholder="请输入证件号码" name="data[company_number]"  value="{{old('data')['company_number']}}" required/>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-vld-name-2">法人姓名：</label>
                            <input type="text" id="doc-vld-name-2"  placeholder="请输入法人姓名" name="data[legal_name]" value="{{old('data')['legal_name']}}" required/>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-vld-name-2">法人手机号：</label>
                            <input type="text" id="doc-vld-name-2"  placeholder="请输入法人手机号" name="data[legal_phone]" value="{{old('data')['legal_phone']}}"  pattern="^1((3|5|8){1}\d{1}|70)\d{8}$" required/>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-vld-name-2">法人身份证号：</label>
                            <input type="text" id="doc-vld-name-2"  placeholder="请输入法人身份证号" name="data[legal_china_id]"  value="{{old('data')['legal_china_id']}}"  pattern="^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$" required/>
                        </div>
                    </div>

                    <button class="am-btn am-btn-secondary" type="submit">提交</button>
                </fieldset>
            </form>
        </div>
    </div>


@endsection
@section('javascript')
    <script src="{{asset('Amaze/js/register.js')}}"></script>
@endsection