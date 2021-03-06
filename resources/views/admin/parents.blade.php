
@extends('admin.layouts')

@section('content')
    <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <i class="icon-ok green"></i>

        欢迎来到
        <strong class="green">
            博客管理后台
            <small>(v1.0)</small>
        </strong>
        ,
        祝你工作快乐。
    </div>
    <div class="widget-box">
        <div class="widget-header widget-header-flat widget-header-small">
            <h5>
                <i class="icon-signal"></i>
                服务器配置信息及流量来源
            </h5>
        </div>

        <div class="widget-body">
            <div class="widget-main">
                <div style="width:50%; padding: 2px;">
                    <table style="width: 300px">
                        <tbody>
                        <tr>
                            <td><span style="font-size: large">操作系统</span></td>
                            <td><span style="font-size: small">{{PHP_OS}}</span></td>
                        </tr>
                        <tr>
                            <td ><span style="font-size: large">运行环境</span></td>
                            <td><span style="font-size: small">{{$_SERVER['SERVER_SOFTWARE']}}</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-size: large">版本</span></td>
                            <td><span style="font-size: small">v-1.0</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-size: large">上传附件限制</span></td>
                            <td><span style="font-size: small"><?php echo get_cfg_var("upload_max_filesize")? get_cfg_var("upload_max_filesize"):'不允许上传'?></span></td>
                        </tr>
                        <tr>
                            <td><span style="font-size: large">服务器域名/IP</span></td>
                            <td><span style="font-size: small">{{$_SERVER['SERVER_NAME']}}/{{$_SERVER['SERVER_ADDR']}}</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-size: large">HOST</span></td>
                            <td><span style="font-size: small">{{$_SERVER['SERVER_ADDR']}}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="piechart-placeholder" style="width: 50%; min-height: 150px; padding: 0px; position: relative;">
                    <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 150px;" width="574" height="150">

                    </canvas>
                    <canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 574px; height: 150px;" width="574" height="150">

                    </canvas>
                    <div class="legend">
                        <div style="position: absolute; width: 95px; height: 110px; top: 15px; right: -30px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                        </div>
                        <table style="position:absolute;top:15px;right:-30px;;font-size:smaller;color:#545454">
                            <tbody>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #68BC31;overflow:hidden">

                                        </div>
                                    </div>
                                </td>
                                <td class="legendLabel">社交网络</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden">

                                        </div>
                                    </div>
                                </td>
                                <td class="legendLabel">搜索引擎</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox"><div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden">

                                        </div>
                                    </div>
                                </td>
                                <td class="legendLabel">品牌广告</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">直接流量</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">其他</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="hr hr8 hr-double"></div>
                </div>

            </div><!-- /widget-main -->
        </div><!-- /widget-body -->
    </div>
@endsection
@section('footjs')
    <script  type="text/javascript">
        var placeholder = $('#piechart-placeholder').css({'width':'50%' , 'min-height':'150px'});
        var data = [
            { label: "社交网络",  data: 38.7, color: "#68BC31"},
            { label: "搜索引擎",  data: 24.5, color: "#2091CF"},
            { label: "品牌广告",  data: 8.2, color: "#AF4E96"},
            { label: "直接流量",  data: 18.6, color: "#DA5430"},
            { label: "其他",  data: 10, color: "#FEE074"}
        ]
        function drawPieChart(placeholder, data, position) {
            $.plot(placeholder, data, {
                series: {
                    pie: {
                        show: true,
                        tilt:0.8,
                        highlight: {
                            opacity: 0.25
                        },
                        stroke: {
                            color: '#fff',
                            width: 2
                        },
                        startAngle: 2
                    }
                },
                legend: {
                    show: true,
                    position: position || "ne",
                    labelBoxBorderColor: null,
                    margin:[-30,15]
                }
                ,
                grid: {
                    hoverable: true,
                    clickable: true
                }
            })
        }
        drawPieChart(placeholder, data);

        /**
         we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
         so that's not needed actually.
         */
        placeholder.data('chart', data);
        placeholder.data('draw', drawPieChart);
        $('.easy-pie-chart.percentage').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size/10),
                animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
                size: size
            });
        })

        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
        });

        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if(item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = item.seriesIndex;
                    var tip = item.series['label'] + " : " + item.series['percent']+'%';
                    $tooltip.show().children(0).text(tip);
                }
                $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
            } else {
                $tooltip.hide();
                previousPoint = null;
            }

        });






        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }

        var d3 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.2) {
            d3.push([i, Math.tan(i)]);
        }


        var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
        $.plot("#sales-charts", [
            { label: "Domains", data: d1 },
            { label: "Hosting", data: d2 },
            { label: "Services", data: d3 }
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: { show: true },
                points: { show: true }
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: -2,
                max: 2,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: { colors: [ "#fff", "#fff" ] },
                borderWidth: 1,
                borderColor:'#555'
            }
        });


        $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('.tab-content')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }

        $('.dialogs,.comments').slimScroll({
            height: '300px'
        });


    </script>
    @endsection