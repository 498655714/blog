@extends('main.layout')

@section('content')
<div class="col-md-8 row-left index">
    @foreach($articles as $art_key=>$art_val)
        <article>
            <h5>
                <span class="original">[ {{$art_val['art_type']}} ]</span>
                <i class="iconfont icon-recommend tui"></i>
                <a href="{{url('main/detail/'.$art_val['art_id'])}}">{{$art_val['art_title']}}</a>
            </h5>

            <div class="clearfix">
                <div class="article-remark">
                    <div class="article-css3">
                        <img class="article-css3_img" src="/{{$art_val['art_thumb']}}" alt="Image 01">

                        <div class="article-css3_caption">
                            <p class="article-css3_caption_p">{{$art_val['art_title']}}</p>
                            <a class="article-css3_caption_a" href="{{url('main/detail/'.$art_val['art_id'])}}" target="_blank"></a>
                        </div>
                    </div>
                    {{$art_val['art_description']}}
                    <a href="{{url('main/detail/'.$art_val['art_id'])}}" class="article-look">继续阅读</a>
                </div>
                <footer class="article-footer">
                    <div class="article-footer-l">
                        <i class="iconfont icon-tags"></i>
                        @if(!empty($art_val['art_tag']) && is_array($art_val['art_tag']))
                            @foreach($art_val['art_tag'] as $tag_key=>$tag_val)
                                &nbsp;&nbsp;<a class="article-tag" data-toggle="tooltip" data-placement="top"
                                                   title="{{$tag_val['tag_name']}}">
                                    {{$tag_val['tag_name']}}
                                </a>&nbsp;&nbsp;
                                @if(!(($tag_key+1)%4))<br>@endif
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