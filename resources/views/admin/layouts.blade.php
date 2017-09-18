<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>博客后台管理系统</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-ie7.min.css')}}" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{asset('assets/css/ace-fonts.css')}}" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css')}}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{asset('assets/css/ace-ie.min.css')}}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{asset('assets/js/ace-extra.min.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('assets/js/jquery-2.0.3.min.js')}}"></script>
    @yield('jsandcss')
</head>

<body>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="{{url('admin/parents')}}">首页</a>
        </li>
        @if(isset($navigation) && !empty($navigation))
            @foreach($navigation as $item)
                <li class="active">{{$item}}</li>
            @endforeach
        @endif
    </ul><!-- .breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
        </form>
    </div><!-- #nav-search -->
</div>

<div class="page-content">
    <div class="page-header">
        <h1>
            {{$contenttitle_1 or '未知路径'}}
            <small>
                <i class="icon-double-angle-right"></i>
                {{$contenttitle_2 or '未知'}}
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
        @yield('content')
        </div>
    </div>
        <!-- PAGE CONTENT ENDS -->
</div><!-- /.page-content -->
<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset('assets/js/jquery-2.0.3.min.js')}}')}}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset('assets/js/jquery-1.10.2.min.js')}}'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='{{asset('assets/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/typeahead-bs2.min.js')}}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{asset('assets/js/excanvas.min.js')}}"></script>
<![endif]-->

<script src="{{asset('assets/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.easy-pie-chart.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.resize.min.js')}}"></script>

<!-- ace scripts -->

<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
<script src="{{asset('layer/layer.js')}}"></script>
<script src="{{asset('assets/js/ace.min.js')}}"></script>
@yield('footjs')
</body>
</html>
