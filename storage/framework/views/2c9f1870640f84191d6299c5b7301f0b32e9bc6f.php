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
<div  style="background:url(<?php echo e(URL::asset('upload/newsletter.png')); ?>) no-repeat; width:800px; height:1000px; margin:0 auto; padding:100px 50px 0 50px; box-sizing:border-box;">
    <div style="height:720px; width:440px; margin:40px auto;">
            <figure style="margin-top:80px; margin-bottom:40px;"><img src="http://rfps.glocify.org/front/img/logo.png" alt="fcdmandsale.com" style="margin:0px auto; display:table;" /></figure>
            <div style="padding:0 30px; border-bottom:1px solid #0096d6;">
                <p style="font-weight:bold; color:#0096d6;font-size:16px; margin-bottom:20px;">Hi Administrator</p>
                <p>New <?php echo $user_type;?> registration!</p>
                <aside style="margin-top:30px; line-height:25px;">
                    <p style="font-weight:bold; color:#0096d6;font-size:16px;"> <?php echo $user_type;?> account details:</p>
                    <p><strong>Email ID:</strong> <?php echo $email ?> <br/>
                        <strong>Name:</strong> <?php echo $first_name ;?> <?php echo $last_name; ?></p>
                        <strong>Contact No:</strong> <?php echo $contact_number ?></p>
                </aside>
            </div>
            
    </div>
</div>
</body>

</html>
