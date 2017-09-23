<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>首页 - Neal小宝博客</title>
    <meta name="keywords" content="博客,laravel,bootstrap3"/>
    <meta name="description" content="Neal小宝博客，欢迎来访~"/>
    <meta name="version" content="v 1.0"/>
    <meta name="author" content="jiao"/>
    <!--移动设备优先-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if lt IE 9]>
    <script>window.location.href = "/error.html";</script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('main/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('main/css/my.css')}}"/>
    <link rel="stylesheet" href="{{asset('main/css/font_1477105914_3430886.css')}}">

    <script src="{{asset('main/js/jquery-1.10.1.min.js')}}"></script>
</head>
<body>
<!--内容开始-->
@yield('content')
<!--内容结束-->
</body>
</html>