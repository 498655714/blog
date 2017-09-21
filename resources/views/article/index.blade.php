
@extends('admin.layouts')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-header">
                以下为查询结果
            </div>

            <div class="table-responsive">
                <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                    <table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                        <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 74px;" aria-label="">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 145px;" aria-label="Price: activate to sort column ascending">
                                文章缩略图
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 145px;" aria-label="Price: activate to sort column ascending">
                                文章题目
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 158px;" aria-label="Clicks: activate to sort column ascending">
                                文章描述
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 233px;" aria-label="Update: activate to sort column ascending">
                                关键词、标签
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                作者
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                查看次数
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                创建时间
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                更新时间
                            </th>
                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 205px;" aria-label="">
                                操作
                            </th>
                        </tr>
                        </thead>


                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        @foreach($data as $key=>$val)
                            <tr class="{{$key%2 ?'odd':'even'}}">
                                <td class="center  sorting_1">
                                    <label>
                                        <input class="ace" type="checkbox">
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class=" "><img src="/{{$val['art_thumb']}}" style="width: 100px;height: 80px"/></td>
                                <td class=" "><a href="{{url('/admin/article/'.$val['art_id'].'/edit')}}">{{$val['art_title']}}</a></td>
                                <td class="hidden-480 ">{{$val['art_description']}}</td>
                                <td class=" ">
                                    @if(isset($val['art_tag']) && !empty($val['art_tag']))
                                        {{$tag = explode(',',$val['art_tag'])}}
                                        @foreach($tag as $tag_id)
                                            @foreach($tags as $tag_key => $tag_val)
                                                @if($tag_key == $tag_id)
                                                    {{$tag_val}}
                                                @endif
                                            @endforeach
                                            &nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    @endif
                                </td>
                                <td class=" ">{{$val['art_editor']}}</td>
                                <td class=" ">{{$val['art_view']}}</td>
                                <td class=" ">{{$val['created_at']}}</td>
                                <td class=" ">{{$val['updated_at']}}</td>
                                <td class=" ">
                                    <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                        <a class="green" href="{{url('/admin/article/'.$val['art_id'].'/edit')}}" title="编辑">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>

                                        <a class="red" href="javascript:;" onclick="deleteart({{$val['art_id']}})" title="删除">
                                            <i class="icon-trash bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_info" id="sample-table-2_info">
                                当前为第{{$data->currentPage()}}页
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footjs')
    <script type="text/javascript">
        function deleteart(art_id){
            layer.confirm('您确定删除该篇文章吗？', {
                btn: ['是的','再想想'] //按钮
            }, function(){
                url = "{{url('admin/article')}}/"+art_id;
                $.post(url,
                        {'_token':'{{csrf_token()}}','_method':'delete'},
                        function(data){
                            if(data.status == 1){
                                location.href =location.href;
                                layer.msg(data.message,{icon: 6})
                            }else{
                                layer.msg(data.message,{icon: 5})
                            }
                        });
            },function() {
                layer.msg('再想想吧,你不知道你做的是什么~')
            });
        }
        jQuery(function($) {
            $('table th input:checkbox').on('click' , function(){
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function(){
                            this.checked = that.checked;
                            $(this).closest('tr').toggleClass('selected');
                        });

            });

        })
    </script>
@endsection
