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
                                分类名称
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 158px;" aria-label="Clicks: activate to sort column ascending">
                                分类说明
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 233px;" aria-label="Update: activate to sort column ascending">
                                关键词
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                描述
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                查看次数
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">
                                排序
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
                            <td class=" "><a href="{{url('/admin/category/'.$val['cate_id'].'/edit')}}">{{$val['_cate_name']}}</a></td>
                            <td class="hidden-480 ">{{$val['cate_title']}}</td>
                            <td class=" ">{{$val['cate_keywords']}}</td>
                            <td class=" ">{{$val['cate_description']}}</td>
                            <td class=" ">{{$val['cate_view']}}</td>
                            <td class="hidden-480 ">
                                <input type="text" class="input-mini" onchange="change_order('{{$val['cate_id']}}',$(this).val())" value="{{$val['cate_order']}}"/>

                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="{{url('/admin/category/'.$val['cate_id'].'/edit')}}" title="编辑">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="deletecate({{$val['cate_id']}})"  title="删除">
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
                                {{--共{{$data->total()}}条记录，当前为第{{$data->currentPage()}}页--}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                {{--{{$data->links()}}--}}
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
        function change_order(cate_id,cate_order){
            $.ajax({
                type: "POST",
                url: "{{url('admin/cate/vieworder')}}",
                data: {'cate_id':cate_id, '_token':'{{csrf_token()}}','cate_order':cate_order},
                dataType: "json",
                success: function(data){
                    if(data.status == 1){
                        layer.msg(data.message, {icon: 6});
                    }else{
                        layer.msg(data.message, {icon: 5});
                    }
                }
            });
        }
        function deletecate(cate_id){
            layer.confirm('您确定删除该分类吗？', {
                btn: ['是的','再想想'] //按钮
            }, function(){
                $.post(
                        "{{url('admin/category/')}}/".cate_id,
                        {'_token':'{{csrf_token()}}','_method':'delete','cate_id':cate_id},
                        function(data){
                            if(data.status == 1){
                                layer.msg(data.message,{icon: 6})
                            }else{
                                layer.msg(data.message,{icon: 5})
                            }
                        }
                );
                layer.msg('的确很重要', {icon: 1});
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
