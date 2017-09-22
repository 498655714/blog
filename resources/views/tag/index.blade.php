<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>标签页面</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-fonts.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css')}}" />
    <script src="{{asset('assets/js/jquery-1.8.0.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
    <script src="{{asset('assets/js/ace.min.js')}}"></script>
    <script type="text/javascript">
        function updatetag(){
            $('#tag_name').val($(this).html());
            $('#tag_id').val($(this).attr('id'));
        }
        function submit_tag(){
            $.post(
                    '{{url("admin/tag/edit")}}',
                    {'_token':'{{csrf_token()}}','tag_name':$('#tag_name'),'tag_id':$('#tag_id')},
                    function(data){
                        if(data.status == 1){
                            location.href =location.href;
                            layer.msg(data.message,{icon: 6})
                        }else{
                            layer.msg(data.message,{icon: 5})
                        }
                    }
            );
        }
    </script>
</head>
<body>
<div  class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <div class="space-6"></div>
            <div>
                <form id="tags_form" action="admin/tag/edit" method="post">
                    {{csrf_field()}}
                    <input id="tag_name" name="tag_name" placeholder="写要添加的标签"class="input-xlarge" type="text" >
                    <input id="tag_id" name="tag_id" type="hidden" >
                    <button class="btn btn-sm btn-success" onclick="submit_tag()">
                        <i class="icon-save"></i>
                        保存
                    </button>
                </form>
            </div>
            <div class="space-6"></div>
            <div >
                <?php $data = [
                        'label label-xlg',
                        'label label-xlg label-success arrowed',
                        'label label-xlg  label-warning',
                        'label label-xlg  label-danger arrowed-in',
                        'label label-xlg  label-inverse arrowed-in',
                        'label label-xlg  label-info arrowed-in-right arrowed'
                ];
                ?>
                @foreach($tags as $key=> $val)
                    <span  class="{{$data[array_rand($data)]}}"><a id="{{$val['tag_id']}}" href="javascript:;" onclick="updatetag()">{{$val['tag_name']}}</a></span>&nbsp;
                    @if(!(($key+1)%9))
                        <br>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</div>

</body>
</html>