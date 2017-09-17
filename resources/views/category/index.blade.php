@extends('admin.parents')
@section('jsandcss')
    <script type="text/javascript">
        jQuery(function($) {
            var oTable1 = $('#sample-table-2').dataTable( {
                "aoColumns": [
                    { "bSortable": false },
                    null, null,null, null, null,
                    { "bSortable": false }
                ] } );


            $('table th input:checkbox').on('click' , function(){
                var that = this;
                $(this).closest('table').find('tr > td:first-child input:checkbox')
                        .each(function(){
                            this.checked = that.checked;
                            $(this).closest('tr').toggleClass('selected');
                        });

            });
            $('#select_num').change(function(){
                window.location.href="{{url('admin/category?num=')}}"+$(this).val();
            });
        })
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue">文章分类详情</h3>
            <div class="table-header">
                以下为查询结果
            </div>

            <div class="table-responsive">
                <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="sample-table-2_length" class="dataTables_length">
                                <label>每页显示
                                    <select size="1" id="select_num" name="sample-table-2_length" aria-controls="sample-table-2">
                                        <option value="10" >10</option>
                                        <option value="15" selected="selected">15</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                    记录
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_filter" id="sample-table-2_filter">
                                <label>Search: <input aria-controls="sample-table-2" type="text"></label>
                            </div>
                        </div>
                    </div>
                    <table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                        <thead>
                        <tr role="row">
                            <th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 74px;" aria-label="">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 100px;" aria-label="Domain: activate to sort column ascending">
                                分类ID
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

                            <td class=" ">
                                <a href="#">{{$val['cate_id']}}</a>
                            </td>
                            <td class=" ">{{$val['cate_name']}}</td>
                            <td class="hidden-480 ">{{$val['cate_title']}}</td>
                            <td class=" ">{{$val['cate_keywords']}}</td>
                            <td class=" ">{{$val['cate_description']}}</td>
                            <td class=" ">{{$val['cate_view']}}</td>
                            <td class="hidden-480 ">
                                {{$val['cate_order']}}
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="green" href="#" title="编辑">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#"  title="删除">
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
                                总共{{$data->count()}}条记录共{{$data->total()}}页，当前为第{{$data->currentPage()}}页
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