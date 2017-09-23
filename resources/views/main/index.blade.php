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
    @foreach($articles as $art_key=>$art_val)
        <article>
            <h5>
                <span class="original">[ {{$art_val['art_type']}} ]</span>
                <i class="iconfont icon-recommend tui"></i>
                <a href="article-156.html">{{$art_val['art_title']}}</a>
            </h5>

            <div class="clearfix">
                <div class="article-remark">
                    <div class="article-css3">
                        <img class="article-css3_img" src="/{{$art_val['art_thumb']}}" alt="Image 01">

                        <div class="article-css3_caption">
                            <p class="article-css3_caption_p">{{$art_val['art_title']}}</p>
                            <a class="article-css3_caption_a" href="article-156.html" target="_blank"></a>
                        </div>
                    </div>
                    {{$art_val['art_description']}}
                    <a href="article-156.html" class="article-look">继续阅读</a>
                </div>
                <footer class="article-footer">
                    <div class="article-footer-l">
                        <i class="iconfont icon-tags"></i>
                        @if(!empty($art_val['art_tag']) && is_array($art_val['art_tag']))
                            @foreach($art_val['art_tag'] as $tag_key=>$tag_val)
                                &nbsp;&nbsp;<a class="article-tag" data-toggle="tooltip" data-placement="top"
                                               title="bootstrap">
                                    {{$tag_val['tag_name']}}
                                </a>&nbsp;&nbsp;
                            @endforeach
                        @endif
                    </div>
                    <div class="article-footer-r">
                        <i class="iconfont icon-hit"></i> {{$art_val['art_view']}}&nbsp;&nbsp;
                        <i class="iconfont icon-review"></i> 1
                    </div>
                </footer>
            </div>
        </article>
    @endforeach
</div>
@endsection