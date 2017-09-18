@extends('admin.layouts')
@section('content')
    @if(count($errors)>0)
    <div class="alert alert-block alert-{{$flag}}">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>
        @if($flag == 'success')
            <span class="label label-success arrowed">正确</span>
        @else
            <span class="label label-danger arrowed-in">错误</span>
        @endif
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
                <input id="form-field-2" name="oldpass" placeholder="请输入原始密码" class="col-xs-10 col-sm-5" type="password">
            </div>
        </div>

        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 新密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2" name="password" placeholder="新密码6-20位" class="col-xs-10 col-sm-5" type="password">
            </div>
        </div>


        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 确认密码：</label>

            <div class="col-sm-9">
                <input id="form-field-2"  name="password_confirmation"  placeholder="再次输入密码" class="col-xs-10 col-sm-5" type="password">
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
                <button class="btn" type="reset" onclick="javascrtpt:window.location.href='{{url('admin/parents')}}'">
                    <i class="icon-undo bigger-110"></i>
                    返回首页
                </button>
            </div>
        </div>

        <div class="hr hr-24"></div>
    </form>

@endsection
