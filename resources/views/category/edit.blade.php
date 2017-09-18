@extends('admin.layouts')
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
    <form class="form-horizontal" role="form" action="{{url('admin/category/update')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 父级分类：</label>

            <div class="col-sm-9">
                    <select class="width-80 chosen-select" id="form-field-select-3" data-placeholder="Choose a Country..." style="display: none;">
                        <option value="">&nbsp;</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                    </select>
                    <div class="chosen-container chosen-container-single" style="width: 444px;" title="" id="form_field_select_3_chosen">
                        <a class="chosen-single" tabindex="-1">
                            <span>Delaware</span>
                            <div>
                                <b></b>
                            </div>
                        </a>
                        <div class="chosen-drop">
                            <div class="chosen-search">
                                <input autocomplete="off" type="text">
                            </div>
                            <ul class="chosen-results">
                                <li class="active-result result-selected" style="" data-option-array-index="0">&nbsp;</li>
                                <li class="active-result" style="" data-option-array-index="1">
                                    Alabama
                                </li>
                                <li class="active-result" style="" data-option-array-index="2">Alaska</li>
                            </ul>
                        </div>
                    </div>
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类名称：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="cate_name" placeholder="名称" class="input-xlarge" type="text" value="{{$data[0]['cate_name']}}">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 分类说明：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="cate_title" placeholder="说明分类" class="col-xs-10 col-sm-5" type="text" value="{{$data[0]['cate_title']}}">
            </div>
        </div>


        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">关键词：</label>
            <div class="col-sm-9">
                <textarea id="form-field-11"  name="cate_keywords" class="autosize-transition form-control" value="{{$data[0]['cate_keywords']}}" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 69px;"></textarea>

            </div>
        </div>

        <div class="space-4"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">描述：</label>
            <div class="col-sm-9">
                <textarea id="form-field-11"  name="cate_description" class="autosize-transition form-control" value="{{$data[0]['cate_description']}}" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 69px;"></textarea>

            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 排序：</label>

            <div class="col-sm-9">
                <input id="form-field-2"  name="cate_order"  placeholder="排序" class="input-mini" type="text" value="{{$data[0]['cate_order']}}">
            </div>
        </div>
        <div class="space-4"></div>

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

    <script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('assets/js/fuelux/fuelux.spinner.min.js')}}"></script>
    <script type="text/javascript">

        jQuery(function($) {
            $(".chosen-select").chosen();
            $('#chosen-multiple-style').on('click', function (e) {
                var target = $(e.target).find('input[type=radio]');
                var which = parseInt(target.val());
                if (which == 2) $('#form-field-select-4').addClass('tag-input-style');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });


            $('[data-rel=tooltip]').tooltip({container: 'body'});
            $('[data-rel=popover]').popover({container: 'body'});

            $('textarea[class*=autosize]').autosize({append: "\n"});
            $('textarea.limited').inputlimiter({
                remText: '%n character%s remaining...',
                limitText: 'max allowed : %n.'
            });
        })
    </script>
    @endsection
