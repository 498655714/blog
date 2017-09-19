@extends('admin.layouts')
@section('jsandcss')
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui-1.10.3.custom.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/combo.select.css')}}">
    <script src="{{asset('assets/js/jquery.combo.select.js')}}"></script>
@endsection
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-block alert-{{$flag}}">
            <button type="button" class="close" data-dismiss="alert">
                <i class="icon-remove"></i>
            </button>
            @if($flag == 'success')
                <span class="label label-success arrowed">正确</span>
            @else
                <span class="label label-danger arrowed-in">错误</span>
            @endif
            <strong class="red">
                @foreach($errors as $error)
                    <span>{{$error}}</span>
                @endforeach
            </strong>
        </div>
    @endif
    <form class="form-horizontal" id="modal-form" role="form" action="{{url('admin/category/'.$data[0]['cate_id'])}}" method="post">
        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 父级分类：</label>

            <div class="col-sm-9">
                        <select name="cate_pid" width="150px">
                            <option value="0">--顶级分类--</option>
                            @foreach($cates as $key=>$val)
                            <option value="{{$val['cate_id']}}"@if($data[0]['cate_pid'] == $val['cate_id']) selected @endif>{{$val['cate_name']}}</option>
                            @endforeach
                        </select>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类名称：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="cate_name" placeholder="名称" class="input-xlarge" type="text" value="{{$data[0]['cate_name']}}">
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类说明：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="cate_title" placeholder="说明分类" class="col-xs-10 col-sm-5" type="text" value="{{$data[0]['cate_title']}}">
            </div>
        </div>


        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">关键词：</label>
            <div class="col-sm-6">
                <textarea id="form-field-11"  name="cate_keywords" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 69px; width:500px;">{{$data[0]['cate_keywords']}}</textarea>
            </div>
        </div>

        <div class="space-6"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">描述：</label>
            <div class="col-sm-6">
                <textarea id="form-field-11"  name="cate_description" class="autosize-transition form-control"  style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 140px; width:500px;">{{$data[0]['cate_description']}}</textarea>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 排序：</label>

            <div class="col-sm-9">
                <input id="form-field-2"  name="cate_order"  placeholder="排序" class="input-mini" type="text" value="{{$data[0]['cate_order']}}">
            </div>
        </div>
        <div class="space-6"></div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="button" onclick="submit()">
                    <i class="icon-ok bigger-110"></i>
                    确认
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset" onclick="javascrtpt:window.location.href='{{url('admin/category')}}'">
                    <i class="icon-undo bigger-110"></i>
                    返回列表页
                </button>
            </div>
        </div>

        <div class="hr hr-24"></div>
    </form>

@endsection
@section('footjs')
    <script src="{{asset('assets/js/jquery.autosize.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('select').comboSelect();
            $('textarea[class*=autosize]').autosize({append: "\n"});
            $('textarea.limited').inputlimiter({
                remText: '%n character%s remaining...',
                limitText: 'max allowed : %n.'
            });
        });
    </script>
    @endsection
