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
    <form class="form-horizontal" id="modal-form" role="form" action="{{url('admin/article')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文章分类：</label>

            <div class="col-sm-9">
                <select name="cate_id" width="150px">
                    <option value="0">--选择分类--</option>
                    @foreach($cates as $key=>$val)
                        <option value="{{$val['cate_id']}}">{{$val['cate_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文章标题：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="art_title" placeholder="这里写标题" class="input-xlarge" type="text" >
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">关键词：</label>
            <div class="col-sm-6">
                <textarea id="form-field-11"  name="art_tag" class="autosize-transition form-control" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 69px; width:500px;"></textarea>
            </div>
        </div>

        <div class="space-6"></div>
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">描述：</label>
            <div class="col-sm-6">
                <textarea id="form-field-11"  name="art_description" class="autosize-transition form-control"  style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 140px; width:500px;"></textarea>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 缩略图：</label>

            <div class="col-sm-5">
                <div class="ace-file-input ace-file-multiple">
                    <input multiple="" id="id-input-file-3" type="file">
                    <label class="file-label" data-title="Drop files here or click to choose">
                        <span class="file-name" data-title="No File ...">
                            <i class="icon-cloud-upload"></i>
                        </span>
                    </label>
                    <a class="remove" href="#">
                        <i class="icon-remove"></i>
                    </a>
                </div>
            </div>
        </div>


        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文章内容：</label>

            <div class="col-sm-9">
                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>

                <script id="editor" type="text/plain" style="width:850px;height:500px;"></script>
                <script type="text/javascript">

                    //实例化编辑器
                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                    var ue = UE.getEditor('editor');
                </script>
                <style>
                    .edui-default{line-height: 28px;}
                    div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                    {overflow:hidden; height:22px;}
                    div.edui-box{overflow:hidden; height:22px;}
                </style>
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
    <script src="{{asset('assets/js/jquery.inputlimiter.1.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.maskedinput.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('select').comboSelect();
            $('textarea[class*=autosize]').autosize({append: "\n"});
            $('textarea.limited').inputlimiter({
                remText: '%n character%s remaining...',
                limitText: 'max allowed : %n.'
            });

            $('#id-input-file-3').ace_file_input({
                style:'well',
                btn_choose:'Drop images here or click to choose',
                btn_change:null,
                no_icon:'icon-picture',
                droppable:true,
                thumbnail:'small',//large | fit
                before_change:function(files, dropped) {
                    var allowed_files = [];
                    for(var i = 0 ; i < files.length; i++) {
                        var file = files[i];
                        if(typeof file === "string") {
                            //IE8 and browsers that don't support File Object
                            if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
                        }
                        else {
                            var type = $.trim(file.type);
                            if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
                                    || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
                            ) continue;//not an image so don't keep this file
                        }

                        allowed_files.push(file);
                    }
                    if(allowed_files.length == 0) return false;

                    return allowed_files;
                }
                //,icon_remove:null//set null, to hide remove/reset button
                /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
                /**,before_remove : function() {
						return true;
					}*/
                ,
                preview_error : function(filename, error_code) {
                    //name of the file that failed
                    //error_code values
                    //1 = 'FILE_LOAD_FAILED',
                    //2 = 'IMAGE_LOAD_FAILED',
                    //3 = 'THUMBNAIL_FAILED'
                    //alert(error_code);
                }

            }).on('change', function(){
                //console.log($(this).data('ace_input_files'));
                //console.log($(this).data('ace_input_method'));
            });
        });
    </script>
@endsection
