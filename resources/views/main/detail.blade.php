@extends('main.layout')
@section('content')
    <ol class="breadcrumb sider-margin">
        <li><a href="{{url('main/index')}}">网站首页</a></li>
        <li class="active">所属分类&nbsp;|&nbsp;{{$articles['cate_name']}}</li>
    </ol>


    <div class="col-md-8 row-left index">

        <div class="about-all">
            [ {{$articles['art_type']}} ]<h4>{{$articles['art_title']}}</h4>
            <p>作者：{{$articles['art_editor']}}  阅读：（{{$articles['art_view']}}）创建时间：{{$articles['created_at']}}</p>
            <hr>
            <div class="about">
                {!! $articles['art_content'] !!}
            </div>
        </div>
    </div>
@endsection