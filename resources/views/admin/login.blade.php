<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>博客管理系统 | 登录界面</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome-ie7.min.css')}}" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{asset('assets/css/ace-fonts.css')}}" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{asset('assets/css/ace-ie.min.css')}}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('assets/js/jquery-2.0.3.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui-1.10.3.full.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- ace scripts -->

    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(session('clip') == 'register')
                show_box('signup-box');
            @endif
            @if(session('clip') == 'login')
                show_box('login-box');
            @endif
            @if(session('clip') == 'forgot')
                show_box('forgot-box');
            @endif
            $('#loginbut').click(function(){
                $('#loginform').submit();
            });
            $('#reset').click(function(){
                $('#registform').reset();
            });
            $('#sendme').click(function(){
                $('#sendform').submit();
            });
            $('#register').click(function(){
                $('#registform').submit();
            });
            $('#accept').click(function(){
                if($(this).prop('checked')){
                    $('#register').removeAttr('disabled');
                }else{
                    $('#register').attr('disabled','disabled');
                }
            });

            $( "#id-btn-dialog1" ).on('click', function(e) {
                e.preventDefault();
                var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
                    modal: true,
                    title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='icon-ok'></i> jQuery UI Dialog</h4></div>",
                    title_html: true,
                    buttons: [
                        {
                            text: "Cancel",
                            "class" : "btn btn-xs",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        },
                        {
                            text: "OK",
                            "class" : "btn btn-primary btn-xs",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]
                });

                /**
                 dialog.data( "uiDialog" )._title = function(title) {
						title.html( this.options.title );
					};
                 **/
            });
        });
    </script>
</head>

<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="icon-leaf green"></i>
                            <span class="red">Neal</span>
                            <span class="white">个人博客</span>
                        </h1>
                        <h4 class="blue">&copy; Neal jiao</h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="icon-coffee green"></i>
                                        Please Enter Your Information
                                    </h4>

                                    <div class="space-6"></div>

                                    <form id="loginform" action="{{url('admin/login')}}" method="post">
                                        {{csrf_field()}}
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															@if(session('msg'))
                                                                <p class="red">{{session('msg')}}</p>
                                                            @endif
														</span>
                                            </label>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" class="form-control" placeholder="Username" />
															<i class="icon-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="validatecode" placeholder="ValidateCode" />
                                                            <img src="{{url('admin/validatecode')}}" onclick="this.src='{{url('admin/validatecode?tm=')}}'+Math.random()"/>
														</span>

                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <label class="inline">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"> Remember Me</span>
                                                </label>

                                                <button type="button" id="loginbut" class="width-35 pull-right btn btn-sm btn-primary">
                                                    <i class="icon-key"></i>
                                                    Login
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                    <div class="social-or-login center">
                                        <span class="bigger-110">Or Login Using</span>
                                    </div>

                                    <div class="social-login center">
                                        <a class="btn btn-primary">
                                            <i class="icon-facebook"></i>
                                        </a>

                                        <a class="btn btn-info">
                                            <i class="icon-twitter"></i>
                                        </a>

                                        <a class="btn btn-danger">
                                            <i class="icon-google-plus"></i>
                                        </a>
                                    </div>
                                </div><!-- /widget-main -->

                                <div class="toolbar clearfix">
                                    <div>
                                        <a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
                                            <i class="icon-arrow-left"></i>
                                            I forgot my password
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
                                            I want to register
                                            <i class="icon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /login-box -->

                        <div id="forgot-box" class="forgot-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header red lighter bigger">
                                        <i class="icon-key"></i>
                                        Retrieve Password
                                    </h4>

                                    <div class="space-6"></div>

                                    <p>
                                    @if(session('msg'))
                                        {{session('msg')}}
                                    @else
                                        Enter your email and to receive instructions
                                    @endif
                                    </p>

                                    <form id="sendform" action="{{url('admin/forgot')}}" method="post">
                                        {{csrf_field()}}
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control" placeholder="Email" />
															<i class="icon-envelope"></i>
														</span>
                                            </label>

                                            <div class="clearfix">
                                                <button type="button" id="sendme" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="icon-lightbulb"></i>
                                                    Send Me!
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- /widget-main -->

                                <div class="toolbar center">
                                    <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                                        Back to login
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /forgot-box -->

                        <div id="signup-box" class="signup-box widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="icon-group blue"></i>
                                        New User Registration
                                    </h4>

                                    <div class="space-6"></div>
                                    <p class="red">
                                        @if(session('msg'))
                                            {{session('msg')}}
                                        @else
                                            Enter your details to begin:
                                        @endif
                                    </p>

                                    <form id="registform" action="{{url('admin/register')}}" method="post">
                                        {{csrf_field()}}
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control" placeholder="Email" />
															<i class="icon-envelope"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="name" class="form-control" placeholder="Username" />
															<i class="icon-user"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password"  name="password"  class="form-control" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password"  name="repassword"  class="form-control" placeholder="Repeat password" />
															<i class="icon-retweet"></i>
														</span>
                                            </label>

                                            <label class="block">
                                                <input id="accept" type="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a id="id-btn-dialog1" href="#">User Agreement</a>
														</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" id="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="icon-refresh"></i>
                                                    Reset
                                                </button>

                                                <button type="button" id="register" disabled class="width-65 pull-right btn btn-sm btn-success">
                                                    Register
                                                    <i class="icon-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                                        <i class="icon-arrow-left"></i>
                                        Back to login
                                    </a>
                                </div>
                            </div><!-- /widget-body -->
                        </div><!-- /signup-box -->
                        <!--dialog-message-->
                        <div id="dialog-message" class="hide">
                            <p>
                                This is the default dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.
                            </p>

                            <div class="hr hr-12 hr-double"></div>

                            <p>
                                Currently using
                                <b>36% of your storage space</b>
                                .
                            </p>
                        </div><!-- #dialog-message -->
                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src={{asset('assets/js/jquery-2.0.3.min.js')}}>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src={{asset('assets/js/jquery-1.10.2.min.js')}}>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src={{asset('assets/js/jquery.mobile.custom.min.js')}}>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
    function show_box(id) {
        jQuery('.widget-box.visible').removeClass('visible');
        jQuery('#'+id).addClass('visible');
    }
</script>
</body>
</html>
