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
            'label label-xlg',
            'label label-xlg label-success arrowed',
            'label label-xlg  label-warning',
            'label label-xlg  label-danger arrowed-in',
            'label label-xlg  label-info arrowed-in-right arrowed'
        ];
    ?>
    @foreach($tags as $key=> $val)
        <span class="{{$data[array_rand($data)]}}">{{$val['tag_name']}}</span>&nbsp;
    @endforeach
</div>
<div>
    <a href="#">添加标签</a>&nbsp;&nbsp;&nbsp;<a href="#">删除标签</a>
</div>
</body>
</html>