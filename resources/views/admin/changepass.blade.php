@extends('admin.parents')
@section('content')
    @if(count($errors)>0)
    <div class="alert alert-block alert-error">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <span class="label label-warning">
            <i class="icon-warning-sign bigger-120"></i>
            错误
        </span>
        <strong class="red">
            @foreach($errors as $error)
                <span>{{$error}}</span>
            @endforeach
        </strong>
    </div>
    @endif
    <form class="form-horizontal" role="form" action="{{url('admin/changepass')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 原始密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="oldpass" placeholder="Old Password" class="col-xs-10 col-sm-5" type="password">
            </div>
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2">请输入原始密码</label>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="password" placeholder="New Password" class="col-xs-10 col-sm-5" type="password">
            </div>
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码6-20位</label>
        </div>


        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 确认密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2"  name="password_confirmation"  placeholder="Repeat New Password" class="col-xs-10 col-sm-5" type="password">
            </div>
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 再次输入密码</label>
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