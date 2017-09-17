@extends('admin.parents')
@section('content')
    <form class="form-horizontal" role="form" action="{{url('admin.changepass')}}" method="post">

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 原始密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2" placeholder="Password" class="col-xs-5 col-sm-5" type="password">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2" placeholder="Password" class="col-xs-5 col-sm-5" type="password">
            </div>
        </div>


        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 重新输入新密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2" placeholder="Password" class="col-xs-5 col-sm-5" type="password">
            </div>
        </div>


        <div class="space-4"></div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="button" onclick="submit()">
                    <i class="icon-ok bigger-110"></i>
                    确认
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset" onclick="javascript:history.back(-1)">
                    <i class="icon-undo bigger-110"></i>
                    返回
                </button>
            </div>
        </div>

        <div class="hr hr-24"></div>
    </form>

@endsection