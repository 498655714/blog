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
    <form class="form-horizontal" id="modal-form" role="form" action="{{url('admin/article')}}" method="post" >
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文章分类：</label>

            <div class="col-sm-9">
                <select name="cate_id" width="150px">
                    <option value="0">--顶级分类--</option>
                    @foreach($cates as $key=>$val)
                        <option value="{{$val['cate_id']}}" {{old('foo', '请输入...')}}>{{$val['cate_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 文章标题：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="art_title"  placeholder="这里写标题" class="input-xxlarge" type="text" >
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 作者：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="art_editor" placeholder="这里作者" class="input-large" type="text" >
            </div>
        </div>

        <div class="space-6"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">关键词：</label>
            <div class="col-sm-6">
                @foreach($tags as $tag=>$value)
                <label>
                    <input name="tags[]" class="ace" type="checkbox" value="{{$value['tag_id']}}">
                    <span class="lbl"> {{$value['tag_name']}}&nbsp;&nbsp;&nbsp;</span>
                </label>
                @endforeach
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
                    <input  id="id-input-file-text" name="art_thumb" type="text" class="input-xlarge">
                    {{--<img id="id-input-file-img" src="" hidden/>--}}
                    <input multiple="" id="id-input-file-3" type="file">
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

                <script id="editor" name="art_content" type="text/plain" style="width:850px;height:500px;"></script>
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
    <script type="text/javascript">
        jQuery(function($) {
            $('select').comboSelect();
            $('textarea[class*=autosize]').autosize({append: "\n"});

            var $form = $('#modal-form');
            var file_input = $form.find('input[type=file]');
            var upload_in_progress = false;
            $('#id-input-file-3').ace_file_input({
                style: 'well',
                btn_choose: '选择要上传的图片',
                btn_change: null,//更改按钮
                droppable: true,//允许拖放
                thumbnail: 'large',//预览大小设置 small | large | fit

                before_remove: function () {
                    if (upload_in_progress)
                        return false;//如果在上传文件中，不允许重置文件在input
                    return true;
                },
                //发生改变前
                before_change: function (files, dropped) {
                    var file = files[0];
                    if (typeof file == "string") {//files is just a file name here (in browsers that don't support FileReader API)
                        if (!(/\.(jpe?g|png|gif)$/i).test(file)) {
                            layer.msg('请选择图片文件! 格式：jpeg|png|gif', {icon: 5})
                            return false;
                        }
                    }
                    else {
                        var type = $.trim(file.type);
                        if (( type.length > 0 && !(/^image\/(jpe?g|png|gif)$/i).test(type) )
                                || ( type.length == 0 && !(/\.(jpe?g|png|gif)$/i).test(file.name) )//for android's default browser!
                        ) {
                            layer.msg('请选择图片文件! 格式：jpeg|png|gif', {icon: 5});
                            return false;
                        }

                        if (file.size > 1048576) {//~100Kb
                            layer.msg('图片大小不能超过1mb！', {icon: 5});
                            return false;
                        }
                    }

                    return true;
                }
            }).on('change',function(){
                var submit_url = "{{url('admin/article/imgtoup')}}";
                if(!file_input.data('ace_input_files')) return false;//no files selected

                var deferred ;
                if( "FormData" in window ) {
                    //for modern browsers that support FormData and uploading files via ajax
                    var fd = new FormData($form.get(0));
                    //if file has been drag&dropped , append it to FormData
                    //if(file_input.data('ace_input_method') == 'drop') {
                    var files = file_input.data('ace_input_files');
                    if(files && files.length > 0) {
                        fd.append(file_input.attr('name'), files[0]);
                            //to upload multiple files, the 'name' attribute should be something like this: myfile[]
                    }
                    //}

                    upload_in_progress = true;
                    deferred = $.ajax({
                        url: submit_url,
                        type: $form.attr('method'),
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        data: fd,
                        xhr: function() {
                            var req = $.ajaxSettings.xhr();
                            if (req && req.upload) {
                                req.upload.addEventListener('progress', function(e) {
                                    if(e.lengthComputable) {
                                        var done = e.loaded || e.position, total = e.total || e.totalSize;
                                        var percent = parseInt((done/total)*100) + '%';
                                        //percentage of uploaded file
                                    }
                                }, false);
                            }
                            return req;
                        },
                        beforeSend : function() {
                        },
                        success : function() {

                        }
                    })

                }
                else {
                    //for older browsers that don't support FormData and uploading files via ajax
                    //we use an iframe to upload the form(file) without leaving the page
                    upload_in_progress = true;
                    deferred = new $.Deferred

                    var iframe_id = 'temporary-iframe-'+(new Date()).getTime()+'-'+(parseInt(Math.random()*1000));
                    $form.after('<iframe id="'+iframe_id+'" name="'+iframe_id+'" frameborder="0" width="0" height="0" src="about:blank" style="position:absolute;z-index:-1;"></iframe>');
                    $form.append('<input type="hidden" name="temporary-iframe-id" value="'+iframe_id+'" />');
                    $form.next().data('deferrer' , deferred);//save the deferred object to the iframe
                    $form.attr({'method' : 'POST', 'enctype' : 'multipart/form-data',
                        'target':iframe_id, 'action':submit_url});

                    $form.get(0).submit();

                    //if we don't receive the response after 60 seconds, declare it as failed!
                    setTimeout(function(){
                        var iframe = document.getElementById(iframe_id);
                        if(iframe != null) {
                            iframe.src = "about:blank";
                            $(iframe).remove();

                            deferred.reject({'status':'fail','message':'上传超时!'});
                        }
                    } , 60000);
                }


                ////////////////////////////
                deferred.done(function(result){
                    upload_in_progress = false;

                    if(result.status == 'OK') {
                        layer.msg('恭喜！图片上传成功！', {icon: 6});
                        $('#id-input-file-text').val(result.url);
                        //$('#id-input-file-img').attr('src',"/"+result.url).removeAttr('hidden');
                    }
                    else {
                        layer.msg(result.message, {icon: 5});
                    }
                }).fail(function(res){
                    upload_in_progress = false;
                    layer.msg('系统错误', {icon: 5});
                });

                deferred.promise();
                return false;
            });

            //重置
            $form.on('reset', function() {
                file_input.ace_file_input('reset_input');
            });

        });
    </script>
@endsection
