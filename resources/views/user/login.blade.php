@extends('layout.iframe')
@section('style')
    <link rel="stylesheet" href="{{asset('Amaze/css/login.css')}}">
@endsection
@section('content')
    <div class="am-g main_part">
        <div class="am-u-sm-centered" style="width:50%">
            <h1><span>保农经销商</span>后台管理系统</h1>
            <form class="am-form" action="{{ url('/login') }}" method="post" data-am-validator>
                {{ csrf_field() }}
                <fieldset class="am-form-set">
                    <input type="text" placeholder="手机" name="data[phone]" value=""  pattern="^1((3|5|8){1}\d{1}|70)\d{8}$" required>
                    <input type="text" placeholder="验证码" name="data[captcha]" required>
                    <p class="login-box"> <span class="captcha" href="javascript:;">点击发送验证码</span> <a href="{{url('/register')}}">还没有管理员帐号？立即注册</a> </p>
                </fieldset>
                <button type="submit" class="am-btn am-btn-primary am-btn-block">登录</button>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('Amaze/js/login.js')}}"></script>
@endsection