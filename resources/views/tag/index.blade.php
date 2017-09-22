<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>标签页面</title>
    <script src="{{asset('assets/js/jquery-2.0.3.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
        });
    </script>
</head>
<body>
<div  id="CloudLabel">
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
            <span class="{{$data[$i]}}">{{$val['tag_name']}}</span>&nbsp;
    @endfor
</div>
</body>
</html>