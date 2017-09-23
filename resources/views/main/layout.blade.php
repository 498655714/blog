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
                        <li class=""><a href="about.html">关于</a></li>
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               role="button" aria-expanded="false">分类&nbsp;&nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="class-1.html"><i class="icon-ok-sign"></i> LNMP</a></li>
                                <li class="divider"></li>
                                <li><a href="class-5.html"><i class="icon-ok-sign"></i> PHP</a></li>
                                <li class="divider"></li>
                                <li><a href="class-3.html"><i class="icon-ok-sign"></i> Linux</a></li>
                                <li class="divider"></li>
                                <li><a href="class-4.html"><i class="icon-ok-sign"></i> Mysql</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class=""><a href="links.html">邻居</a></li>
                        <li class=""><a href="comment.html">留言</a></li>
                        <li class=""><a href="downloads.html">资源</a></li>
                        <li class=""><a href="tools.html">工具</a></li>
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
                        <form action="/search.html" method="get" class="form-search">
                            <input type="text" class="form-control sider-search-input" placeholder="请输入关键词" name="key">
                            <span class="input-group-btn">
	            	            <button class="btn btn-default btn-search" type="submit"><i
                                            class="iconfont icon-search search"></i></button>
	          	            </span>
                        </form>
                    </div>
                </div>
                <div class="sider-follow hidden-xs sider-margin">
                    <a href="https://github.com/loveteemo" target="_blank"><i class="iconfont icon-github"></i></a>
                    <a><i class="iconfont icon-weixin" id="weixin"></i></a>
                    <a href="http://weibo.com/iteemo" target="_blank"><i class="iconfont icon-weibo"></i></a>
                </div>
                <div class="sider-follow-hr hidden-xs"></div>
            </div>
            <div class="sider-margin sider-box">
                <h4><i class="iconfont icon-tags"></i>&nbsp;&nbsp;标签库</h4>
                <?php $data =['danger sider-tag-end','default','primary','success','info','warning'] ?>
                <ul class="sider-tag-ul">
                    <li class="label label-{{$data[array_rand($data)]}} "><a href="article-27.html">兄弟元素</a></li>
                </ul>
            </div>
            <div class="sider-box">
                <h4><i class="iconfont icon-shuffle"></i>&nbsp;&nbsp;热点文章3个</h4>
                <ul class="sider-rand-ul">
                    <li>
                        <a href="article-52.html" title="搭建简易的SVN服务" class="sider-rand-img image-light">
                            <img src="picture/default.jpg" class="article-img" alt="搭建简易的SVN服务" title="搭建简易的SVN服务"/>
                        </a>

                        <div class="sider-rand-title"><a href="article-52.html">搭建简易的SVN服务...</a></div>
                        <div class="sider-rand-remark">由于在之前的公司习惯的SVN代码管理，而新公司这边的环境尚未部署，技术...</div>
                    </li>

                </ul>
            </div>
            <div class="sider-box">
                <h4><i class="iconfont icon-review"></i>&nbsp;&nbsp;最新互动</h4>

                <div class="tab" id="tab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#art" data-toggle="tab">最新评论</a></li>
                        <li><a href="#contents" data-toggle="tab">最新留言</a></li>
                        <li><a href="#hot" data-toggle="tab">最多点击</a></li>
                    </ul>
                </div>
            </div>
            <div class="sider-box">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="art">
                        <ul class="sider-content-ul">
                            <li>
                                <img src="picture/5596eac5a670452d82f79e4233a9b360.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;哈蜜瓜
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="article-27.html#31" title="123.....">123...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/e1c7d86d7f67436caf49f481c97931e4.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;羊先生
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="article-156.html#30" title="dsf&nbsp;.....">dsf&nbsp;...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/ffea1c28374448f69ce6fa48f0c4e2f0.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;SD</div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="article-149.html#29" title="&lt;!DOCTYPE html&g.....">&lt;!DOCTYPE
                                        html&g...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/58fc8963bea2412bbddd7db598ddf21f.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;‭</div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="download-155.html#27" title="图片竟然没出来啊 本来自定义一个表情的.....">图片竟然没出来啊
                                        本来自定义一个表情的...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/527065a5e63e4d018097e180b67187b4.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;雨过天晴boy
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="article-150.html#25" title=".....">...</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="contents">
                        <ul class="sider-content-ul">
                            <li>
                                <img src="picture/58fc8963bea2412bbddd7db598ddf21f.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;‭</div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="comment.html#32" title=".....">...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/bef33dd06acd4aab95645eddf7581984.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;♔佛爷♔
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="comment.html#28" title="师傅.....">师傅...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/b2738c9980854b81a9dadca9be2ce34e.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;873567832
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="comment.html#23" title="来看看.....">来看看...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/3f86baae49fc48de84b1651c39d57d32.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;卡布奇诺的秘密
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="comment.html#21" title="我来瞎转转。。- -.....">我来瞎转转。。- -...</a>
                                </div>
                            </li>
                            <li>
                                <img src="picture/4bcf1ca0c1934b99b4bac9523e58356f.gif" class="img-circle img-45"/>

                                <div class="sider-content-name"><i class="iconfont icon-review"></i>&nbsp;&nbsp;404 Not
                                    Found
                                </div>
                                <div class="sider-content-remark">
                                    &nbsp;&nbsp;<a href="comment.html#17" title="，来访.....">，来访...</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="hot">
                        <ul class="sider-hot-ul">
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a href="article-27.html">JQ获取兄弟元素的值</a>(7994)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a href="article-5.html">青春博客 Beta V1.8
                                    测试版</a>(7769)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a href="article-14.html">青春博客 Beta V1.7
                                    测试版</a>(4379)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a href="article-15.html">ThinkPHP 的分页BUG
                                    解决方法</a>(3968)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a
                                        href="article-68.html">ThinkPHP的易忽视点小结</a>(3899)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a
                                        href="article-16.html">Yii1.1.16入门级CMS</a>(3470)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a href="article-20.html">后台模板源文件下载</a>(3389)
                            </li>
                            <li><i class="iconfont icon-hit"></i>&nbsp;&nbsp;<a href="article-63.html">美化ThinkPHP模板</a>(2988)
                            </li>
                        </ul>
                    </div>
                </div>
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
                <h4>程序相关</h4>

                <p class="foot-box">
                    <i class="iconfont icon-program"></i>&nbsp;程序：&nbsp;Neal小宝博客                    <span
                            class="foot-box-r">
						<i class="iconfont icon-version"></i>&nbsp;版本：&nbsp;Beta 1.0                    </span>
                </p>

                <p class="foot-box">
                    <i class="iconfont icon-framework"></i>&nbsp;框架：&nbsp;Laravel5.5                    <span
                            class="foot-box-r">
						<i class="iconfont icon-author"></i>&nbsp;作者：&nbsp;nealjiao                    </span>
                </p>
            </div>
            <div class="col-md-3 hidden-xs">
                <h4>程序统计</h4>

                <p class="foot-box">
                    文章：&nbsp;154 篇
                    <span class="foot-box-r">
                        评论：&nbsp;18 条
                    </span>
                </p>

                <p class="foot-box">
                    建站：&nbsp;1166 天
                    <span class="foot-box-r">
                        留言：&nbsp;10 条
                    </span>
                </p>

                <p class="foot-box">
                    访问：&nbsp;5990743 次
                    <span class="foot-box-r">
                        友链：&nbsp;2 条
                    </span>
                </p>

            </div>

            <div class="col-md-3 hidden-xs">
                <h4>推荐文章</h4>

                <p class="foot-box-art">
                    <i class="iconfont icon-comment"></i>&nbsp;<a href="article-12.html"
                                                                  title="PHP中private和public还有protected的区别">PHP中private和public还有protected的区别</a>
                </p>

                <p class="foot-box-art">
                    <i class="iconfont icon-comment"></i>&nbsp;<a href="article-26.html" title="博客整合缩略图功能">博客整合缩略图功能</a>
                </p>

                <p class="foot-box-art">
                    <i class="iconfont icon-comment"></i>&nbsp;<a href="article-46.html" title="1.8版整合fancybox相册">1.8版整合fancybox相册</a>
                </p>

                <p class="foot-box-art">
                    <i class="iconfont icon-comment"></i>&nbsp;<a href="article-88.html" title="支付宝交易接口申请">支付宝交易接口申请</a>
                </p>
            </div>

        </div>
        <div class="row bottom">
            <div class="col-md-6 col-sm-5 bottom-left">
                © 2017 Neal小宝博客 & 版权所有
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