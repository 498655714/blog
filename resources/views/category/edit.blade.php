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
    <form class="form-horizontal" id="modal-form" role="form" action="{{url('admin/category/update')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 父级分类：</label>

            <div class="col-sm-9">

                <div class="jq22">
                    <div class="combo-select">
                        <select tabindex="-1">
                            <option value="">月份</option>
                            <option value="一月">一月</option>
                            <option value="二月">二月</option>
                            <option value="三月">三月</option>
                            <option value="四月">四月</option>
                            <option value="五月">五月</option>
                            <option value="六月">六月</option>
                            <option value="七月">七月</option>
                            <option value="八月">八月</option>
                            <option value="九月">九月</option>
                            <option value="十月">十月</option>
                            <option value="十一月">十一月</option>
                            <option value="十二月">十二月</option>
                        </select>
                        <div class="combo-arrow"></div>
                        <ul class="combo-dropdown">
                            <li class="option-item option-hover" data-index="0" data-value="">月份</li>
                            <li class="option-item" data-index="1" data-value="一月">一月</li>
                            <li class="option-item option-selected" data-index="2" data-value="二月">二月</li>
                            <li class="option-item" data-index="3" data-value="三月">三月</li>
                            <li class="option-item" data-index="4" data-value="四月">四月</li>
                            <li class="option-item" data-index="5" data-value="五月">五月</li>
                            <li class="option-item" data-index="6" data-value="六月">六月</li>
                            <li class="option-item" data-index="7" data-value="七月">七月</li>
                            <li class="option-item" data-index="8" data-value="八月">八月</li>
                            <li class="option-item" data-index="9" data-value="九月">九月</li>
                            <li class="option-item" data-index="10" data-value="十月">十月</li>
                            <li class="option-item" data-index="11" data-value="十一月">十一月</li>
                            <li class="option-item" data-index="12" data-value="十二月">十二月</li>
                        </ul><input placeholder="月份" class="combo-input text-input" type="text">
                    </div>
                </div>
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
                <button class="btn" type="reset" onclick="javascrtpt:window.location.href='{{url('admin/parents')}}'">
                    <i class="icon-undo bigger-110"></i>
                    返回首页
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
