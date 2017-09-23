@extends('main.layout')
@section('content')
<!-- 轮播开始 -->
<script src="{{asset('main/js/jquery.banner.js')}}"></script>
<ul class="hiSlider container hidden-xs banner">
    <li class="hiSlider-item" data-title="laravel5.5版本的博客测试版正在测试中">
        <a href=".#" target="_blank">
            <img src="{{asset('main/picture/a1.jpg')}}" alt="laravel5.5版本的博客测试版正在测试中">
        </a>
    </li>
    <li class="hiSlider-item" data-title="在原本的基础上改动较大，想学习laravel5.5的朋友别错过哦">
        <a href=".#" target="_blank">
            <img src="{{asset('main/picture/a2.jpg')}}" alt="在原本的基础上改动较大，想学习laravel5.5的朋友别错过哦">
        </a>
    </li>
    <li class="hiSlider-item" data-title="更多最新动态，请关注青春博客微信公众号">
        <a href=".#" target="_blank">
            <img src="{{asset('main/picture/a3.jpg')}}" alt="更多最新动态，请关注青春博客微信公众号">
        </a>
    </li>
</ul>
<script>
    $('.banner').hiSlider({
        isFlexible: true,
        isSupportTouch: true,
        isShowControls: false,
        titleAttr: function () {
            return $('img', this).attr('alt');
        }
    });
</script>


<div class="col-md-8 row-left index">

    <div class="alert alert-success alert-dismissible" role="alert">
        <ul class="testslider">
            <li><i class="iconfont icon-notice"></i>&nbsp;博客v 1.0 & laravel 上线啦</li>
            <li><i class="iconfont icon-notice"></i>&nbsp;博客v 1.0 & 啥时候能上线啊</li>
            <li><i class="iconfont icon-notice"></i>&nbsp;laravel5.5学习不能那么简单哦</li>
        </ul>
    </div>
    <script src="{{asset('main/js/jquery.textslider.js')}}"></script>
    <script>
        $(function () {
            $(".alert").textSlider();
        })
    </script>

    <article>
        <h5>
            <span class="original">[ 原创 ]</span>
            <i class="iconfont icon-recommend tui"></i>
            <a href="article-156.html">bootstrap鼠标悬停下拉菜单</a>
        </h5>

        <div class="clearfix">
            <div class="article-remark">
                <div class="article-css3">
                    <img class="article-css3_img" src="picture/1488855357.jpg" alt="Image 01">

                    <div class="article-css3_caption">
                        <p class="article-css3_caption_p">bootstrap鼠标悬停下拉菜单</p>
                        <a class="article-css3_caption_a" href="article-156.html" target="_blank"></a>
                    </div>
                </div>
                Bootstrap的下拉菜单一直都是需要点击，才会显示出来，可能不太符合大家的使用习惯。这里给大家推荐一款JS
                <a href="article-156.html" class="article-look">继续阅读</a>
            </div>
            <footer class="article-footer">
                <div class="article-footer-l">
                    <i class="iconfont icon-tags"></i>&nbsp;&nbsp;<a class="article-tag" data-toggle="tooltip"
                                                                     data-placement="top"
                                                                     title="bootstrap">bootstrap</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                            class="article-tag" data-toggle="tooltip" data-placement="top" title="鼠标悬停">鼠标悬停</a>&nbsp;&nbsp;
                </div>
                <div class="article-footer-r">
                    <i class="iconfont icon-hit"></i> 57&nbsp;&nbsp;
                    <i class="iconfont icon-review"></i> 1
                </div>
            </footer>
        </div>
    </article>
</div>
@endsection