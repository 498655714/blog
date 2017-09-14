<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>博客后台管理系统</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="/static/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/static/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="/static/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="/static/css/ace-fonts.css" />

    <!-- ace styles -->

    <link rel="stylesheet" href="/static/css/ace.min.css" />
    <link rel="stylesheet" href="/static/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/static/css/ace-skins.min.css" />
    <link rel="stylesheet" href="/static/css/easyui.css" />
    <link rel="stylesheet" href="/static/css/icon.css" />
    <style type="text/css">
        .intro
        {
            color: #416AA3;
            font-weight: bold;
        }
    </style>


    <script src="/static/js/ace-extra.min.js"></script>
    <script type="text/javascript">
        var Sys = {};
        var ua = navigator.userAgent.toLowerCase();
        var s;
        (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :
                (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] :
                        (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :
                                (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :
                                        (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0;

        if (Sys.opera || Sys.safari)
        {
            window.setInterval("reinitIframe()", 200);
        }
        function reinitIframe() //针对opera safari
        {
            var iframe = document.getElementByIdx_x_x_x("PandL");
            try {
                var bHeight = iframe.contentWindow.document.body.scrollHeight;
                var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
                var height = Math.max(bHeight, dHeight);
                iframe.height = height;
            } catch (ex) {
            }
        }

        function iframeAutoFit(iframeObj)
        {
            setTimeout(function ()
            {
                if (!iframeObj)
                    return;
                iframeObj.height = (iframeObj.Document ? iframeObj.Document.body.scrollHeight : iframeObj.contentDocument.body.offsetHeight) + 30;//这里+30是有目的的，比如ie下会少那么一些像素
            }, 200)
        }
    </script>
</head>

<body>
<div class="navbar navbar-default" id="navbar">

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <span style="margin-top:8px;"><img src="/static/avatars/zhengshi.png" style="height:35px; margin-top:5px;" class="msg-photo" alt="正时汽车"/></span>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="grey">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge badge-grey">4</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-ok"></i>
                            4 Tasks to complete
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Software Update</span>
                                    <span class="pull-right">65%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:65%" class="progress-bar "></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Hardware Upgrade</span>
                                    <span class="pull-right">35%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Unit Testing</span>
                                    <span class="pull-right">15%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">Bug Fixes</span>
                                    <span class="pull-right">90%</span>
                                </div>

                                <div class="progress progress-mini progress-striped active">
                                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                See tasks with details
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">8</span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-warning-sign"></i>
                            8 Notifications
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                                New Comments
                                            </span>
                                    <span class="pull-right badge badge-info">+12</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="btn btn-xs btn-primary icon-user"></i>
                                Bob just signed up as an editor ...
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
                                                New Orders
                                            </span>
                                    <span class="pull-right badge badge-success">+8</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-info icon-twitter"></i>
                                                Followers
                                            </span>
                                    <span class="pull-right badge badge-info">+11</span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                See all notifications
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-envelope-alt"></i>
                            5 Messages
                        </li>

                        <li>
                            <a href="#">
                                <img src="/static/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Alex:</span>
                                                Ciao sociis natoque penatibus et auctor ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>a moment ago</span>
                                            </span>
                                        </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="/static/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Susan:</span>
                                                Vestibulum id ligula porta felis euismod ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>20 minutes ago</span>
                                            </span>
                                        </span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <img src="/static/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Bob:</span>
                                                Nullam quis risus eget urna mollis ornare ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>3:15 pm</span>
                                            </span>
                                        </span>
                            </a>
                        </li>

                        <li>
                            <a href="inbox.html">
                                See all messages
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/static/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $userName; ?>
                                </span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="icon-cog"></i>
                                系统设置
                            </a>
                        </li>

                        <li>
                            <a class="gaoliang" href="javascript:;" onClick="createurl('personal','/index/user/personcenter?userId=<?php echo $_SESSION['userId'];?>','个人中心')">
                                <i class="icon-user"></i>
                                个人中心
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="user/loginout">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <!-- <button class="btn btn-success">
                         <i class="icon-signal"></i>
                     </button>

                     <button class="btn btn-info">
                         <i class="icon-pencil"></i>
                     </button>

                     <button class="btn btn-warning">
                         <i class="icon-group"></i>
                     </button>

                     <button class="btn btn-danger">
                         <i class="icon-cogs"></i>
                     </button>-->
                </div>

                <!--<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>-->
            </div><!-- #sidebar-shortcuts -->

            <ul class="nav nav-list">
                <?php foreach($left as $ak=>$aval){?>
                <?php $keyarr = explode("_",$ak);?>
                <li class="remark">
                    <a href="#" class="dropdown-toggle">
                        <i class=<?php echo $keyarr[1]?>></i>
                        <!--标题-->
                        <span class="menu-text"><?php echo $keyarr[0];?></span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">

                        <?php foreach($aval as $nk=>$nval){?>
                        <?php if(!is_numeric($nk)){?>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-double-angle-right"></i>
                                <?php echo $nk;?>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <?php foreach($nval as $fk=>$fval){?>
                                <li>
                                    <a class="gaoliang" href="javascript:;" onClick="createurl('','<?php echo $fval['url'];?>','<?php echo $fval['title'];?>')">
                                        <i class="icon-double-angle-right"></i>
                                        <?php echo $fval['title'];?>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                        <?php }else{?>
                        <li>
                            <a class="gaoliang" href="javascript:;" onClick="createurl('','<?php echo $nval['url'];?>','<?php echo $nval['title'];?>')">
                                <i class="icon-double-angle-right"></i>
                                <?php echo $nval['title'];?>
                            </a>
                        </li>
                        <?php }?>
                        <?php }?>
                    </ul>

                </li>
                <?php }?>
            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>
        </div>

        <div class="main-content">
            <!--  tab -->
            <div id="tt">
                <div title="主页">
                    <iframe name="mainFrame"  frameborder="0" src="/home/index/index" width="100%" height="100%" onLoad="javascript:iframeAutoFit(this);" scrolling="auto"></iframe>
                </div>
            </div>
        </div><!-- /.main-content -->

        <!-- <div class="ace-settings-container" id="ace-settings-container">
             <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                 <i class="icon-cog bigger-150"></i>
             </div>

             <div class="ace-settings-box" id="ace-settings-box">
                 <div>
                     <div class="pull-left">
                         <select id="skin-colorpicker" class="hide">
                             <option data-skin="default" value="#438EB9">#438EB9</option>
                             <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                             <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                             <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                         </select>
                     </div>
                     <span>&nbsp; Choose Skin</span>
                 </div>

                 <div>
                     <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                     <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                 </div>

                 <div>
                     <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                     <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                 </div>

                 <div>
                     <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                     <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                 </div>

                 <div>
                     <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                     <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                 </div>

                 <div>
                     <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                     <label class="lbl" for="ace-settings-add-container">
                         Inside
                         <b>.container</b>
                     </label>
                 </div>
             </div>
         </div>--><!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='/static/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/static/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document)
        document.write("<script src='/static/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="/static/js/excanvas.min.js"></script>
<![endif]-->

<script src="/static/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/static/js/jquery.ui.touch-punch.min.js"></script>
<script src="/static/js/jquery.slimscroll.min.js"></script>
<script src="/static/js/jquery.easy-pie-chart.min.js"></script>
<script src="/static/js/jquery.sparkline.min.js"></script>
<script src="/static/js/flot/jquery.flot.min.js"></script>
<script src="/static/js/flot/jquery.flot.pie.min.js"></script>
<script src="/static/js/flot/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->

<script src="/static/js/ace-elements.min.js"></script>
<script src="/static/js/ace.min.js"></script>
<script src="/static/js/jquery.easyui.min.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    function createurl(a, b, c) {
        CreateDiv(a, b, c);
    }

    $(function () {
        $('#tt').tabs({
            tools: [{
                iconCls: 'icon-add',
                handler: function () {
                    alert('add');
                }
            }, {
                iconCls: 'icon-save',
                handler: function () {
                    alert('save');
                }
            }]
        });
    });

    function CreateDiv(a, b, c) {
        if ($('#tt').tabs('exists', c)) {
            $('#tt').tabs('select', c);
            var tab = $('#tt').tabs('getSelected');
            $('#tt').tabs('update', {
                tab: tab,
                options: {
                    title: c,
                    content: "<iframe name='mainFrame' frameborder='0' src='" + b + "' width='100%' height='100%' onLoad='javascript:iframeAutoFit(this);' scrolling='auto'></iframe>",
                    iconCls: 'icon-save',
                    closable: true,
                    fit: true,
                    selected: true
                }
            });
        } else
            $('#tt').tabs('add', {
                title: c,
                content: "<iframe name='mainFrame' frameborder='0' src='" + b + "' width='100%' height='100%' onLoad='javascript:iframeAutoFit(this);' scrolling='auto'></iframe>",
                iconCls: 'icon-save',
                closable: true
            });
    }

    $(".gaoliang").click(tab);
    function tab() {
        $(".gaoliang").removeClass("intro");
        $(this).addClass("intro");
    }
</script>
<script type="text/javascript">
    $(".gaoliang").click(function () {
        $(".nav-list li").removeClass("active");
        $(this).parent().parent().addClass('active');
        $(this).parents(".remark").addClass('active');
        $(this).parent().addClass('active');
    });
</script>
<script type="text/javascript">
    jQuery(function ($) {
        $('.easy-pie-chart.percentage').each(function () {
            var $box = $(this).closest('.infobox');
            var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
            var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
            var size = parseInt($(this).data('size')) || 50;
            $(this).easyPieChart({
                barColor: barColor,
                trackColor: trackColor,
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: parseInt(size / 10),
                animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
                size: size
            });
        });

        $('.sparkline').each(function () {
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html', {tagValuesAttribute: 'data-values', type: 'bar', barColor: barColor, chartRangeMin: $(this).data('min') || 0});
        });

        var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
        var data = [
            {label: "social networks", data: 38.7, color: "#68BC31"},
            {label: "search engines", data: 24.5, color: "#2091CF"},
            {label: "ad campaigns", data: 8.2, color: "#AF4E96"},
            {label: "direct traffic", data: 18.6, color: "#DA5430"},
            {label: "other", data: 10, color: "#FEE074"}
        ];
        function drawPieChart(placeholder, data, position) {
            $.plot(placeholder, data, {
                series: {
                    pie: {
                        show: true,
                        tilt: 0.8,
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
                    margin: [-30, 15]
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


        var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
        var previousPoint = null;

        placeholder.on('plothover', function (event, pos, item) {
            if (item) {
                if (previousPoint != item.seriesIndex) {
                    previousPoint = item.seriesIndex;
                    var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                    $tooltip.show().children(0).text(tip);
                }
                $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
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

        var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
        $.plot("#sales-charts", [
            {label: "Domains", data: d1},
            {label: "Hosting", data: d2},
            {label: "Services", data: d3}
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: {show: true},
                points: {show: true}
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
                backgroundColor: {colors: ["#fff", "#fff"]},
                borderWidth: 1,
                borderColor: '#555'
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

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                return 'right';
            return 'left';
        }

        $('.dialogs,.comments').slimScroll({
            height: '300px'
        });

        //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
        //so disable dragging when clicking on label
        var agent = navigator.userAgent.toLowerCase();
        if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
            $('#tasks').on('touchstart', function (e) {
                var li = $(e.target).closest('#tasks li');
                if (li.length == 0)
                    return;
                var label = li.find('label.inline').get(0);
                if (label == e.target || $.contains(label, e.target))
                    e.stopImmediatePropagation();
            });

        $('#tasks').sortable({
                    opacity: 0.8,
                    revert: true,
                    forceHelperSize: true,
                    placeholder: 'draggable-placeholder',
                    forcePlaceholderSize: true,
                    tolerance: 'pointer',
                    stop: function (event, ui) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                        $(ui.item).css('z-index', 'auto');
                    }
                }
        );
        $('#tasks').disableSelection();
        $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
            if (this.checked)
                $(this).closest('li').addClass('selected');
            else
                $(this).closest('li').removeClass('selected');
        });


    })
</script>

</body>
</html>