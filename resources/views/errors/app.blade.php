<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('head_title', getcong('site_name'))</title>
        <meta name="description" content="@yield('head_description', getcong('site_description'))" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="@yield('head_title',  getcong('site_name'))" />
        <meta property="og:description" content="@yield('head_description', getcong('site_description'))" />
        <meta property="og:keywords" content="@yield('head_keywords', getcong('site_description'))" />
        <meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
        <meta property="og:url" content="@yield('head_url', url('/'))" />
        <!-- Web fonts -->
        <link rel="shortcut icon" href="{{ URL::asset('upload/'.getcong('site_favicon')) }}">
		 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link href="{{ URL::asset('site_assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('site_assets/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('site_assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('site_assets/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" media="all">
		<link href="{{ URL::asset('site_assets/css/style.css') }}" rel="stylesheet"> 
    </head>
    <body>
	   
        
            
        <!-------- Scripts ---------->
       

	</body>
        
</html>
    