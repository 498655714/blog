@extends('admin.parents')
@section('content')
    <div class="col-xs-6 col-sm-3 pricing-box">
        <div class="widget-box">
            <div class="widget-header header-color-green">
                <h5 class="bigger lighter">成功画面</h5>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <ul class="list-unstyled spaced2">
                        <li>
                            <i class="icon-ok green"></i>
                            恭喜你已经成功
                        </li>
                    </ul>

                    <hr>
                    <div class="price">
                    </div>
                </div>

                <div>
                    <a href="javascript:history(-1)" class="btn btn-block btn-success">
                        <i class="icon-shopping-cart bigger-110"></i>
                        <span>返回</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection