



$('#xtform').submit(function()
{
    var options = { dataType:'json',
        success: function(res) {
            if(res.code ==200){
                var url = '/m/';
                if(res.forword_url)
                    url = res.forword_url;
                window.location.href=url;
            }
            else
            {
                var msg = '';
                $.each(res.data.error_messages,function(n,value) {  

                    msg +=value+'\n';
               
                });
                
                if(msg!='')
                    alert(msg);

                // if(res.code=202)
                // {
                //     $('#yzimg').attr('src','/util/captcha?'+Math.random());
                // }
            }
        }

    };
    $('#xtform').ajaxSubmit(options);
    return false;
});