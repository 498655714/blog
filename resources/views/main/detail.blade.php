﻿@extends('main.layout')
@section('content')
    <ol class="breadcrumb sider-margin">
        <li><a href="{{url('main/index')}}">网站首页</a></li>
        <li class="active">所属分类&nbsp;|&nbsp;{{$articles['cate_name']}}</li>
    </ol>


    <div class="col-md-8 row-left index">

        <div class="articleinfo">
            <h5>
                <small>[ {{$articles['art_type']}} ]</small>
                <a>{{$articles['art_title']}}</a>
            </h5>
            <div class="articleinfo-write">作者：{{$articles['art_editor']}}&nbsp;&nbsp;阅读：（{{$articles['art_view']}}）<span class="hidden-xs">更新于：{{$articles['created_at']}}</span></div>
            <hr>
            <div class="articleinfo-content">
                {!! $articles['art_content'] !!}
            </div>

            <div class="articleinfo-copy hidden-xs">
                <p><i class="iconfont icon-tags"></i>本文标签：@if(isset($articles['art_tag']) && is_array($articles['art_tag']))
                                @foreach($articles['art_tag'] as $key=>$val)
                            &nbsp;&nbsp;<a class="article-tag" data-toggle="tooltip" data-placement="top"
                                           title="{{$val['tag_name']}}">
                                {{$val['tag_name']}}
                            </a>&nbsp;&nbsp;
                                @endforeach
                            @endif
                </p>
            </div>
            <hr />
            <div class="bdsharebuttonbox articleinfo-fenxiang hidden-xs">
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                <a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
            </div>
            <script>
                window._bd_share_config={"common":{"bdSnsKey":{}, "bdText":"", "bdMini":"2", "bdMiniList":false, "bdPic":"", "bdStyle":"1", "bdSize":"32"}, "share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
            </script>
            <div class="articleinfo-up">
                <p>上一篇：@if($pre_art)
                    <a title='{{$pre_art->art_title}}' href="{{url('main/detail/'.$pre_art->art_id)}}">&nbsp;{{$pre_art->art_title}}</a>@else 没有了 @endif
                </p>
            </div>
            <div class="articleinfo-down">
                <p>下一篇：@if($next_art)
                    <a title='{{$next_art->art_title}}' href="{{url('main/detail/'.$next_art->art_id)}}">&nbsp;{{$next_art->art_title}}</a>@else 没有了 @endif
                </p>
            </div>
            <hr />
        </div>
    </div>
@endsection