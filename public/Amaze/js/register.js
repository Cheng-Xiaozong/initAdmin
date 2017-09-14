//根据类型选择表单字段
$('[name="data[user_type]"]').change(function () {
    if($(this).val()==1)
    {
        $('.legal_fom').css('display','block');
    }else {
        $('.legal_fom').css('display','none');
    }
})

if($('[name="data[user_type]"]').val()==1)
{
    $('.legal_fom').css('display','block');
}

//省市地区三级联动
$('[name="data[province]"]').change(function () {
    $.ajax({
        url:$(this).attr('data-url'),
        type:'post',
        data:{_token:$('[name="_token"]').val(),id:$(this).val()},
        success:function(data)
        {
            if(data.status==0)
            {
                var html='<option value="">请选择</option>';
                for(var i in data.data)
                {
                   html+='<option value="'+data.data[i]["id"] +'">'+data.data[i]["name"]+'</option>';
                }
                $('[name="data[city]"]').html(html);
                $('[name="data[county]"]').html('<option value="">请选择</option>');
            }
        },
        error:function(data)
        {
            alert('网络错误，请稍后再试！');
        }
    })
})

$('[name="data[city]"]').change(function () {
    $.ajax({
        url:$(this).attr('data-url'),
        type:'post',
        data:{_token:$('[name="_token"]').val(),id:$(this).val()},
        success:function(data)
        {
            if(data.status==0)
            {
                var html='<option value="">请选择</option>';
                for(var i in data.data)
                {
                    html+='<option value="'+data.data[i]["id"] +'">'+data.data[i]["name"]+'</option>';
                }
                if($('[name="data[city]"]').val()=='')
                {
                    $('[name="data[county]"]').html('<option value="">请选择</option>');
                }else{
                    $('[name="data[county]"]').html(html);
                }
            }
        },
        error:function(data)
        {
            alert('网络错误，请稍后再试！');
        }
    })
})

//生成具体地址
$('[name="data[address]"]').blur(function () {
    if($('[name="data[county]"]').val()!=''){
        var val =$('[name="data[province]"]').find("option:selected").text()+$('[name="data[city]"]').find("option:selected").text()+$('[name="data[county]"]').find("option:selected").text()+" "+$('[name="data[address]"]').val();
        $('[name="data[address_details]"]').val(val);
    }else{
        $('[name="data[address_details]"]').val($('[name="data[address]"]').val());
    }
})

$('[name="data[county]"]').change(function () {
    var html = '';
    if($('[name="data[city]"]').val()!='')
    {
        html=$('[name="data[province]"]').find("option:selected").text()+$('[name="data[city]"]').find("option:selected").text()+$('[name="data[county]"]').find("option:selected").text()+" "+$('[name="data[address]"]').val();
        $('[name="data[address_details]"]').val(html);
    }
})

//获取验证码
$('.captcha').click(function () {
    function resetCode(){
        var second = 60;
        var timer = null;
        timer = setInterval(function(){
            second -= 1;
            if(second >0 ){
                $('.captcha').html('(已发送,请在<span style="color:red">'+second+'秒</span>后重试)');
            }else{
                clearInterval(timer);
                $('.captcha').html('点击发送验证码');
            }
        },1000);
    }
    resetCode();
});
