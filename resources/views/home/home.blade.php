@extends('layout.iframe')
@section('content')
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>Index</small></div>
        </div>
        <hr>

        <!--内容开始-->
        <div class="am-g">
            <div class="am-u-sm-12">
                <h4 class="am-text-center am-text-xl am-margin-top-lg am-text-secondary">欢迎登陆保农经销商后台管理系统</h4>
                <p class="am-text-center">
                    Welcome to the Tiantoucia management system!<br><br>
                    <img src="{{asset('Amaze/i/admin_bg.jpg')}}" alt="" style="width:60%">
                </p>

            </div>
        </div>

        <!--内容结束-->
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>

    </div>
@endsection

