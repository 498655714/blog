@extends('main.layout')
@section('content')
    <ol class="breadcrumb sider-margin">
        <li><a href="{{url('main/index')}}">网站首页</a></li>
        <li class="active">{{$flag}}&nbsp;|&nbsp;{{$cate->cate_name}}</li>
    </ol>


    <div class="col-md-8 row-left index">
        @foreach($articles as $art_key => $art_val)
            <article>
                <h5>
                    <span class="original">[ {{$art_val['art_type']}} ]</span>
                    <i class="iconfont icon-recommend tui"></i>
                    <a href="{{url('main/detail/'.$art_val['art_id'])}}">{{$art_val['art_title']}}</a>
                </h5>

                <div class="clearfix">
                    <p class="article-remark">
                        <a class="article-img-a image-light" href="{{url('main/detail/'.$art_val['art_id'])}}">
                            <img src="/{{$art_val['art_thumb']}}" class="article-img" alt="{{$art_val['art_title']}}"
                                 title="{{$art_val['art_title']}}"/>
                        </a>
                        {{$art_val['art_description']}}
                        <a href="{{url('main/detail/'.$art_val['art_id'])}}" class="article-look">继续阅读</a>
                    </p>
                    <footer class="article-footer">
                        <div class="article-footer-l">
                            <i class="iconfont icon-tags"></i>@if(isset($art_val['art_tag']) && is_array($art_val['art_tag']))@foreach($art_val['art_tag'] as $tag_key => $tag_val)
                                &nbsp;&nbsp;<a class="article-tag" data-toggle="tooltip"
                                               data-placement="top" title="bootstrap">{{$tag_val['tag_name']}}</a>&nbsp;
                                &nbsp;&nbsp;&nbsp;@endforeach
                        </div>
                        <div class="article-footer-r">
                            <i class="iconfont icon-hit"></i>&nbsp;{{$art_val['art_view']}}&nbsp;&nbsp;
                            <i class="iconfont icon-review"></i>&nbsp;1
                        </div>
                    </footer>
                </div>
            </article>
        @endforeach
        <div class="more">
            <span class="loadingmore" data-id="1" data-key="" data-lenth="1" data-url="/class-ajax.html">加载更多</span>
        </div>

    </div>
@endsection
