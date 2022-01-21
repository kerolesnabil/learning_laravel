<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{trans('admin.news')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{url("")}}/js/jquery-3.6.0.min.js"></script>
    <script>

        $(document).on('click','#add_news',function () {
            var form =$('#news').serialize();
            var url=$('#news').attr('action');
            $.ajax({
                url:url,
                datatype:'json',
                data:form,
                type:'post',
                beforeSend:function () {
                    // $('.alert_error').empty();
                },success:function (data) {

                    data = JSON.parse(data);

                    if (data.status===true)
                    {
                        $('.list_news tbody').append(data.result);
                       $('#news')[0].reset();
                    }



                },error:function (data_error,exception) {
                    if(exception === 'error')
                    {

                        $('.alert_error center h1').html(data_error.responseJSON.message);
                        var error_list='';
                        $.each(data_error.responseJSON.errors,function(i,v){

                            error_list += '<li>'+v+'</li>';
                        });
                        $('.alert_error ul').html(error_list);

                    }
                }
            });
            return false;

        })

    </script>

</head>
<body>