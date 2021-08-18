<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <title>Come Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
	@yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
    .mobile-hotline{display:none}
    .hotline {position: fixed;
        left: 10px;
        bottom: 10px;
        z-index: 9000;
        display: block;
        background: #337AB7;
        color: orange;
        padding-top: 5px;padding-bottom:5px; padding-left:12px; padding-right: 12px;
        border-radius: 99px;}
    .hotline .hotline-number{font-size:20px; color: orange; font-weight: bold}
     
    @media  (max-width: 767px) {
     
        .hotline{
     
            display :none;}}
</style>
<body>

    @include('layout.header')

   @yield('content')
   <a href="tel:+84972939830"><div class="hotline">
   <span class="before-hotline">Hotline:</span>
   <span class="hotline-number">033.497.2001</span>
   </div></a>
   @include('layout.footer')
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    
    <script src="js/my.js"></script>
	@yield('script')
</body>

</html>
