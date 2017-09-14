/*获取验证码*/
$('.captcha').click(function () {
    function resetCode(){
        var second = 60;
        var timer = null;
        timer = setInterval(function(){
            second -= 1;
            if(second >0 ){
                $('.captcha').html('已发送,请在<span style="color:#ffffff">'+second+'秒</span>后重试!');
            }else{
                clearInterval(timer);
                $('.captcha').html('点击发送验证码');
            }
        },1000);
    }
    resetCode();
});


