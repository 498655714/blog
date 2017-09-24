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
<!--顶部开始-->
{{--<div class="top-bg">--}}
{{--<div class="container">--}}
{{--<div class="top-l"><a class="from">Unknown</a></div>--}}
{{--<div class="top-r">--}}
{{--<span class="from qqlogin" data-url="/login-qq.html" data-callback="/index-base-callback.html"--}}
{{--style="cursor: pointer">QQ访问</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<!--顶部结束-->
<div class="container">

    <!--头部开始-->
    <div class="row header">
        <div class="col-lg-4 col-md-4 header-logo">
            <a title="" href="{{url('main/index')}}"><img src="{{asset('main/picture/logo.png')}}"/></a>
            <h5 class="hidden-xs">编程小白努力进阶中...</h5>
        </div>
        <div class="header-menu col-lg-5 col-md-5 col-xs-12">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">导航</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs" href="#">博客导航</a>
                </div>
                <div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="menu-active"><a href="{{url('main/index')}}">首页</a></li>
                        <li class=""><a href="{{url('main/list/3')}}">LNMP</a></li>
                        <li class=""><a href="{{url('main/list/2')}}">PHP</a></li>
                        <li class=""><a href="{{url('main/list/7')}}">Linux</a></li>
                        <li class=""><a href="{{url('main/list/8')}}">Mysql</a></li>
                        <li class=""><a href="{{url('main/list/4')}}">Git</a></li>
                        <li class=""><a href="{{url('main/about')}}">关于</a></li>
                    </ul>
                    <div class="menu-bar"></div>
                    <div class="menu-clean"></div>
                </div>
            </nav>
        </div>
    </div>
    <!--头部结束-->

    <div class="row aerousel">

        <!--内容开始-->
        @yield('content')
        <!--内容结束-->

        <!--侧边栏开始-->
        <div class="col-md-4 row-right index">

            <div class="sider-margin sider-box">
                <div class="sider-search">
                    <div class="input-group sider-search-input">
                        <form action="{{url('main/search')}}" method="post" class="form-search">
                            <input type="text" class="form-control sider-search-input" placeholder="请输入关键词" name="key">
                            <span class="input-group-btn">
	            	            <button class="btn btn-default btn-search" type="submit"><i
                                            class="iconfont icon-search search"></i></button>
	          	            </span>
                        </form>
                    </div>
                </div>

                <div class="sider-follow-hr hidden-xs"></div>
            </div>
            <div class="sider-margin sider-box">
                <h4><i class="iconfont icon-tags"></i>&nbsp;&nbsp;标签库</h4>
                <?php $data = ['danger sider-tag-end', 'default', 'primary', 'success', 'info', 'warning'] ?>
                <ul class="sider-tag-ul">
                    @foreach($tags as $tag_key=>$tag_val)
                        <li class="label label-xlg label-{{$data[array_rand($data)]}}"><a href="{{url('main/searchByTag/'.$tag_val['tag_id'])}}">{{$tag_val['tag_name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="sider-box">
                <h4><i class="iconfont icon-hit"></i>&nbsp;&nbsp;热点文章</h4>
                <ul class="sider-rand-ul">
                    @foreach($hot_art as $hot_key=>$hot_val)
                    <li>
                        <a href="{{url('main/detail/'.$hot_val['art_id'])}}" title="{{$hot_val['art_title']}}" class="sider-rand-img image-light">
                            <img src="/{{$hot_val['art_thumb']}}" class="article-img" alt="{{$hot_val['art_title']}}" title="{{$hot_val['art_title']}}"/>
                        </a>

                        <div class="sider-rand-title"><a href="{{url('main/detail/'.$hot_val['art_id'])}}">{{$hot_val['art_title']}}</a></div>
                        <div class="sider-rand-remark">{{$hot_val['art_description']}}</div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--侧边栏结束-->

    </div>
</div>

<!--底部开始-->
<div class="container-foot">
    <div class="container foot">
        <div class="row foot-margin">
            <div class="col-md-3 ">
                <p class="foot-box">
                    <i class="iconfont icon-program"></i>&nbsp;程序：&nbsp;Neal小宝博客                    <span
                            class="foot-box-r">
						<i class="iconfont icon-version"></i>&nbsp;版本：&nbsp;Beta 1.0                    </span>
                </p>

            </div>

            <div class="col-md-3 ">
                <p class="foot-box">
                    <i class="iconfont icon-framework"></i>&nbsp;框架：&nbsp;Laravel5.5                    <span
                            class="foot-box-r">
						<i class="iconfont icon-author"></i>&nbsp;作者：&nbsp;nealjiao                    </span>
                </p>
            </div>
        </div>
        <div class="row bottom">
            <div class="col-md-6 col-sm-5 bottom-left">
                © 2017 Neal小宝博客
            </div>
            <div class="col-md-6 col-sm-7 bottom-right hidden-xs">
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                    document.write(unescape("%3Cspan id='cnzz_stat_icon_1253899479'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1253899479' type='text/javascript'%3E%3C/script%3E"));</script>
                &nbsp;|&nbsp;鄂ICP备15000791号-1
            </div>
        </div>
    </div>
</div>
<!--底部结束-->

<!--返回顶部-->
<div class="toTop hidden-xs" style="display: none;">
    <span class="glyphicon glyphicon-chevron-up toTop-img"></span>
</div>
<!--返回顶部-->
<script src="{{asset('main/js/layer.js')}}"></script>
<script src="{{asset('main/js/bootstrap.js')}}"></script>
<script src="{{asset('main/js/common.js')}}"></script>
</body>
</html>