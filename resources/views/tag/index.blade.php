<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>标签页面</title>
    <link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css')}}" />
    <script src="{{asset('assets/js/jquery-2.0.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
    <script src="{{asset('assets/js/ace.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
        });
    </script>
</head>
<body>
<div >
    <?php $data = [
            'label',
            'label label-success arrowed',
            'label label-warning',
            'label label-danger arrowed-in',
            'label label-info arrowed-in-right arrowed',
            'label label-inverse'
        ];
    ?>
    @for($i=0;$i<count($tags);$i++)
            <span class="{{$data[$i]}}">{{$tags[$i]['tag_name']}}</span>&nbsp;
    @endfor
</div>
<div>
    <a href="#">添加标签</a>&nbsp;&nbsp;&nbsp;<a href="#">删除标签</a>
</div>
</body>
</html>