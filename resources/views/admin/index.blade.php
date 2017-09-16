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
    <div class="widget-header widget-header-flat widget-header-small">
        <h5>
            <i class="icon-signal"></i>
            Traffic Sources
        </h5>

        <div class="widget-toolbar no-border">
            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                This Week
                <i class="icon-angle-down icon-on-right bigger-110"></i>
            </button>

            <ul class="dropdown-menu pull-right dropdown-125 dropdown-lighter dropdown-caret">
                <li class="active">
                    <a href="#" class="blue">
                        <i class="icon-caret-right bigger-110">&nbsp;</i>
                        This Week
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="icon-caret-right bigger-110 invisible">&nbsp;</i>
                        Last Week
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="icon-caret-right bigger-110 invisible">&nbsp;</i>
                        This Month
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="icon-caret-right bigger-110 invisible">&nbsp;</i>
                        Last Month
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection