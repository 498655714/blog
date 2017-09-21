<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>标签页面</title>
    <script src="{{asset('assets/js/jquery-2.0.3.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            randomCloudLabel();
        });
        function randomCloudLabel() {
            var obj = $("#CloudLabel span");
            function rand(num) {
                return parseInt(Math.random() * num + 1);
            }
            function randomcolor() {
                var str = Math.ceil(Math.random() * 16777215).toString(16);
                if (str.length < 6) {
                    str = "0" + str;
                }
                return str;
            }
            for (len = obj.length, i = len; i--; ) {
                obj[i].style.left = rand(600) + "px";
                obj[i].style.top = rand(400) + "px";
                obj[i].className = "color" + rand(5);
                obj[i].style.zIndex = rand(5);
                obj[i].style.fontSize = rand(50) + 12 + "px";
                obj[i].style.color = "#" + randomcolor();
            }
        }
    </script>
</head>
<body>
<div  id="CloudLabel">
    @foreach($tag as $key =>$val)
        <span>{{$val['tag_name']}}</span>&nbsp;
    @endforeach
</div>
</body>
</html>