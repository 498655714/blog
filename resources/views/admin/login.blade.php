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
    <script src="{{asset('assets/js/ace-extra.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui-1.10.3.full.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/typeahead-bs2.min.js')}}"></script>

    <!-- 协议弹出层 -->
    <style>
        *{padding:0px;margin:0px;}
        .pop { overflow: auto; display: none;  width: 650px; min-height: 470px;  max-height: 750px;  height:470px;  position: absolute;  top: 0;  left: 0;  bottom: 0;  right: 0;  margin: auto;  padding: 25px;  z-index: 130;  border-radius: 8px;  background-color: #fff;  box-shadow: 0 3px 18px rgba(100, 0, 0, .5);  }
        .pop-top{  height:50px;  width:100%;  border-bottom: 1px #E5E5E5 solid;  }
        .pop-top h2{  float: left;  display:block}
        .pop-top span{  float: right;  cursor: pointer;  font-weight: bold; display:block}
        .pop-foot{  height:35px;  line-height:35px;  width:100%;  border-top: 1px #E5E5E5 solid;  text-align: right;  }
        .pop-cancel, .pop-ok { height:35px; padding:2px 15px;  margin:5px 5px;  border: none;  border-radius: 5px;  background-color: #337AB7;  color: #fff;  cursor:pointer;  }
        .pop-cancel {  background-color: #FFF;  border:1px #CECECE solid;  color: #000;  }
        .pop-content{  height: 380px;  }
        .pop-content-right{  width: 100%;  float: left;  padding-top:20px;  padding-left:20px;  font-size: 16px;  line-height:35px;  }
        .bgPop{  display: none;  position: absolute;  z-index: 129;  left: 0;  top: 0;  width: 100%;  height: 100%;  background: rgba(0,0,0,.2);  }
    </style>
    <script>
        $(document).ready(function () {
            $('.pop-close').click(function () {
                $('.bgPop,.pop').hide();
            });
            $('.click_pop').click(function () {
                $('.bgPop,.pop').show();
            });
            $('#agree').click(function(){
                $('#accept').prop('checked','checked');
                $('#register').removeAttr('disabled');
                $('.bgPop,.pop').hide();
            });
        })

    </script>
    <!-- /协议弹出层 -->
    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>
    <!-- 登录、注册、忘记密码界面-->
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
            //绑定键盘回车事件
            $(document).keydown(function(event){
                if(event.keyCode == 13) {
                    if($('#login-box').hasClass('visible')){
                        $('#loginform').submit();
                    }
                    if($('#signup-box').hasClass('visible')){
                        $('#registform').submit();
                    }
                    if($('#forgot-box').hasClass('visible')){
                        $('#sendform').submit();
                    }
                }
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
															<a  href="javascript:void(0)" class="click_pop">User Agreement</a>
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
                    </div><!-- /position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!--遮罩层-->
        <div class="bgPop"></div>
        <!--弹出框-->
        <div class="pop">
            <div class="pop-top">
                <h2>博客系统注册协议</h2>
                <span class="pop-close">Ｘ</span>
            </div>
            <div class="pop-content">
                <div class="pop-content-right">
                    一、博客系统概述  （注：协议请您仔细阅读，如有不理解地方请与客服联系：QQ:498655714）  本协议是注册会员协议。“注册会员”是指愿意接受或实际上已经接受本博客系统提供的产品和服务的个人。   此份协议是注册会员接受本博客系统产品和服务时适用的通用条款。
                    因此，请您在注册成为本博客系统会员的注册会员前或接受本博客系统的产品和服务之前，请您详细地阅读本注册会员协议的所有内容。注册会员了解并同意：只要注册会员点击“同意”按钮并完成注册，注册会员就已接受了本注册会员协议及本博客系统公布的各项服务规则（包括填写实名
                    的联系方式等等），并愿意受其约束。如果发生纠纷，注册会员不得以未仔细阅读为由进行抗辩。    注册会员了解并同意：随着市场经营情况的变化，本博客系统有权随时更改本注册会员协议及相关服务规则。修改本注册会员协议时，本博客系统将于相关页面公告修改的事实，有权不对注册会员进行个
                    别通知。注册会员应该在每次登录购买商品前查询本博客系统官方网站的相关公告，以了解本注册会员协议及其他服务规则的变化。若注册会员不同意本注册会员协议或相关服务规则，或者不同意本博客系统作出的修改，注册会员可以主动停止使用本博客系统提供的产品和服务，如果在本博客系统修改协
                    议或服务规则后，注册会员仍继续使用本博客系统提供的产品和服务，即表示注册会员同意本博客系统对本注册会员协议及相关服务规则所做的所有修改。由于注册会员在注册会员协议变更后因未熟悉公告规定而引起的损失，本博客系统将不会承担任何责任。   本博客系统（以下简称本站）的各项电子
                    服务的所有权和运作权归本站。本站提供的服务将完全按照其发布的服务条款和操作规则严格执行。注册会员必须完全同意所有服务条款并完成注册程序，才能成为本站的注册会员。注册会员确认：本协议条款是处理双方权利义务的当然约定依据，除非违反国家强制性法律，否则始终有效。在下订单的同
                    时，您也同时承认了您拥有购买这些产品的权利能力和行为能力，并且将您对您在订单中提供的所有信息的真实性负责。

                    二、服务简介  本站运用自己的操作系统通过国际互联网络为注册会员提供网络服务。同时，注册会员必须：  自行配备上网的所需设备，包括个人电脑、调制解调器或其他必备上网装置。  自行负担个人上网所支付的与此服务有关的电话费用、网络费用。  基于本站所提供的网络服务的重要性，
                    注册会员应同意：  提供详尽、准确的个人资料。  不断更新注册资料，符合及时、详尽、准确的要求。  本站对注册会员的电子邮件、手机号等隐
                    私资料进行保护，承诺不会在未获得注册会员许可的情况下擅自将注册会员的个人资料信息出 租或出售给任何第三方，但以下情况除外：   注册会员
                    同意让第三方共享资料； 注册会员同意公开其个人资料，享受为其提供的产品和服务；本站需要听从法庭传票、法律命令或遵循法律程序；  本站发现
                    注册会员违反了本站服务条款或本站其它使用规定。  关于注册会员隐私的具体协议以本站的隐私声明为准。  如果注册会员提供的资料包含有不正确的
                    信息，本站保留结束注册会员使用网络服务资格的权利。

                    三、价格和数量  本站将尽最大努力保证您所购商品与网站上公布的价格一致，但价目表和声明 并不构成要约。本站有权在发现了其网站上显现的产品及
                    订单的明显错误或缺货的情况下，单方面撤回任何承诺。同时，本站保留对产品订购的数量的限制权。产品的价格和可获性都在本站上指明。这类信息将随
                    时更改且不发任何通知。商品的价格都包含了增值税。如果发生了意外情况，在确认了您的订单后，由于供应商提价，税额变化引起的价格变化，或是由于
                    网站的错误等造成商品价格变化，您有权取消您的订单，并希望您能及时通过电子邮件或电话通知本站客户服务部。

                    四、注册会员的帐户，密码和安全性  注册会员一旦注册成功，成为本站的合法的注册会员。您可随时根据需要改变您的密码。注册会员将对注册会员名和
                    密码安全负全部责任。另外，每个注册会员都要对以其注册会员名进行的所有活动和事件负全责。注册会员若发现任何非法使用注册会员帐户或存在安全漏
                    洞的情况，请立即通告本站。

                    五、拒绝提供担保  注册会员个人对网络服务的使用承担风险。本站对此不作任何类型的担保，不论是明确的或隐含的，但是不对商业性的隐含担保、特定
                    目的和不违反规定的适当担保作限制。本站不担保服务一定能满足注册会员的要求，也不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保。
                    本站对在本站上得到的任何商品购物服务或交易进程，不作担保。

                    六、有限责任  本站对任何直接、间接、偶然、特殊及继起的损害不负责任，这些损害可能来自：不正当使用网络服务，在网上购买商品或进行同类型服务，在
                    网上进行交易，非法使用网络服务或注册会员传送的信息有所变动。这些行为都有可能会导致本站的形象受损，所以本站事先提出这种损害的可能性。

                    七、保障注册会员  同意保障和维护本站全体注册会员利益，并承诺做到保质量，保价格，保服务质量！

                    八、通告  所有发给注册会员的通告都可通过重要页面的公告或电子邮件或常规的信件传送。本站的活动信息也将定期通过页面公告及电 子邮件方式向注册会
                    员发送。注册会员协议条款的修改、服务变更、或其它重要事件的通告会以电子邮箱或者短信进行通知。
                    九、注册会员的建议奖励  注册会员在他们发表的一些良好建议以及一些比较有价值的策划方案时，本站愿意展示会员的构想落于实现，这其中本站会对一些比
                    较好的注册会员反馈信息进行不等的产品奖励或者是积分奖励，但如出现会员策划与广告销售商之间的矛盾本站不承担任何责任。

                    十、责任限制  如因不可抗力或其他本站无法控制的原因使本站销售系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等，本站不承担责任
                    。但是本站会尽可能合理地协助处理善后事宜，并努力使客户免受经济损失。  除了本站的使用条件中规定的其它限制和除外情况之外，在中国法律法规所允许的
                    限度内，对于因交易而引起的或与之有关的任何直接的、间接的、特殊的、附带的、后果性的或惩罚性的损害，或任何其它性质的损害，本站、本站的董事、管理
                    人员、雇员、代理或其它代表在任何情况下都不承担责任。本站的全部责任，不论是合同、保证、侵权（包括过失）项下的还是其它的责任，均不超过您所购买的
                    与该索赔有关的商品价值额。

                    十一、法律管辖和适用  本协议的订立、执行和解释及争议的解决均应适用中国法律。  如发生本站服务条款与中国法律相抵触时，则这些条款将完全按法律规定重
                    新解释，而其它合法条款则依旧保持对注册会员产生法律效力和影响。  本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除
                    而其余条款应予以执行。  如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向本站所在地的人民法院提起诉讼。

                    十二、其他规定   若本用户协议中的任何条款存在理解分歧，均应以完美世界作出的解释为准。   如本用户协议中的任何内容无论因何种原因完全或部分无效或
                    不具有执行力，本用户协议的其余内容仍应有效并且对协议各方有约束力。    本用户协议中的标题仅为方便而设，不具法律或契约效果。
                </div>
                <div class="pop-foot">
                    <input type="button" value="关闭" class="pop-cancel pop-close"/>
                    <input type="button" id='agree' value="我同意" class="pop-ok"/>
                </div>
            </div>
        </div>
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
