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
                <div>
                    <table>
                        <tbody>
                        <tr>
                            <td>操作系统:</td>
                            <td>操作系统:</td>
                        </tr>
                        <tr>
                            <td>运行环境:</td>
                            <td>操作系统:</td>
                        </tr>
                        <tr>
                            <td>版本:</td>
                            <td>v-1.0</td>
                        </tr>
                        <tr>
                            <td>上传附件限制:</td>
                            <td>v-1.0</td>
                        </tr>
                        <tr>
                            <td>服务器域名/IP:</td>
                            <td>v-1.0</td>
                        </tr>
                        <tr>
                            <td>HOST</td>
                            <td>v-1.0</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="piechart-placeholder" style="width: 90%; min-height: 150px; padding: 0px; position: relative;">
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
                                <td class="legendLabel">social networks</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden">

                                        </div>
                                    </div>
                                </td>
                                <td class="legendLabel">search engines</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox"><div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden">

                                        </div>
                                    </div>
                                </td>
                                <td class="legendLabel">ad campaigns</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">direct traffic</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid null;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">other</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="hr hr8 hr-double"></div>

                <div class="clearfix">
                    <div class="grid3">
															<span class="grey">
																<i class="icon-facebook-sign icon-2x blue"></i>
																&nbsp; likes
															</span>
                        <h4 class="bigger pull-right">1,255</h4>
                    </div>

                    <div class="grid3">
															<span class="grey">
																<i class="icon-twitter-sign icon-2x purple"></i>
																&nbsp; tweets
															</span>
                        <h4 class="bigger pull-right">941</h4>
                    </div>

                    <div class="grid3">
															<span class="grey">
																<i class="icon-pinterest-sign icon-2x red"></i>
																&nbsp; pins
															</span>
                        <h4 class="bigger pull-right">1,050</h4>
                    </div>
                </div>
            </div><!-- /widget-main -->
        </div><!-- /widget-body -->
    </div>
@endsection