@extends('admin.parents')

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