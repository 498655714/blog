@extends('admin.parents')
@section('content')
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>

        <div class="col-sm-9">
            <input id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" type="text">
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password Field </label>

        <div class="col-sm-9">
            <input id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" type="password">
                <span class="help-inline col-xs-12 col-sm-7">
                    <span class="middle">Inline help text</span>
                </span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Readonly field </label>

        <div class="col-sm-9">
            <input class="col-xs-10 col-sm-5" id="form-input-readonly" value="This text field is readonly!" readonly="true" type="text">
                <span class="help-inline col-xs-12 col-sm-7">
                    <label class="middle">
                        <input class="ace" id="id-disable-check" type="checkbox">
                        <span class="lbl"> Disable it!</span>
                    </label>
                </span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Relative Sizing</label>

        <div class="col-sm-9">
            <input class="input-sm" id="form-field-4" placeholder=".input-sm" type="text">
            <div class="space-2"></div>

            <div class="help-block ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="input-size-slider" style="width: 200px;" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Grid Sizing</label>

        <div class="col-sm-9">
            <div class="clearfix">
                <input class="col-xs-1" id="form-field-5" placeholder=".col-xs-1" type="text">
            </div>

            <div class="space-2"></div>

            <div class="help-block ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" id="input-span-slider" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right">Input with Icon</label>

        <div class="col-sm-9">
            <span class="input-icon">
                <input id="form-field-icon-1" type="text">
                <i class="icon-leaf blue"></i>
            </span>

            <span class="input-icon input-icon-right">
                <input id="form-field-icon-2" type="text">
                <i class="icon-leaf green"></i>
            </span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Tooltip and help button</label>

        <div class="col-sm-9">
            <input data-rel="tooltip" id="form-field-6" placeholder="Tooltip on hover" title="" data-placement="bottom" data-original-title="Hello Tooltip!" type="text">
            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details." title="" data-original-title="Popover on hover">?</span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Tag input</label>

        <div class="col-sm-9"><div class="tags"><span class="tag">Tag Input Control<button type="button" class="close">×</button></span><input name="tags" id="form-field-tags" value="Tag Input Control" placeholder="Enter tags ..." style="display: none;" type="text"><input placeholder="Enter tags ..." type="text"></div>

        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="button">
                <i class="icon-ok bigger-110"></i>
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i>
                Reset
            </button>
        </div>
    </div>

    <div class="hr hr-24"></div>

@endsection