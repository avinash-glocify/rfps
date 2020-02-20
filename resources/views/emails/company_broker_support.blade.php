<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
</head>

<body style="margin:0; padding:0; color:#8b8c8c; font-family:'Raleway';">
<div  style="background:url({{ URL::asset('upload/newsletter.png') }}) no-repeat; width:800px; height:1000px; margin:0 auto; padding:100px 50px 0 50px; box-sizing:border-box;">
    <div style="height:720px; width:440px; margin:40px auto;">
            <figure style="margin-top:80px; margin-bottom:40px;"><img src="http://rfps.glocify.org/front/img/logo.png" alt="fcdmandsale.com" style="margin:0px auto; display:table;" /></figure>
            <div style="padding:0 30px; border-bottom:1px solid #0096d6;">
                <p style="font-weight:bold; color:#0096d6;font-size:16px; margin-bottom:20px;">Hi Customer</p>
               
                <aside style="margin-top:30px; line-height:25px;"> <!--
                    <p style="font-weight:bold; color:#0096d6;font-size:16px;"> -->
					<p>Thanks a lot for Contact NET PEO Support.</p>
					<p> Support Id:  {{$support_id}}</p> 
                      <p> Subject:  {{$subject1}}</p> 
                     <p> Name:  {{$name}}</p> 
                     <p> Email:  {{$email}}</p> 
                     <p> Role:  {{$role}}</p> 
                     <p> Phone No:  {{$phone_number}}</p> 
                     <p> Message:  {{$message1}}</p> 
					
					
					Thanks
                   </p>
                    
                </aside>
            </div>
            
    </div>
</div>
</body>

</html>
