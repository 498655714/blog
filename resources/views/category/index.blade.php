@extends('admin.parents')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h3 class="header smaller lighter blue">jQuery dataTables</h3>
            <div class="table-header">
                Results for "Latest Registered Domains"
            </div>

            <div class="table-responsive">
                <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid"><div class="row"><div class="col-sm-6"><div id="sample-table-2_length" class="dataTables_length"><label>Display <select size="1" name="sample-table-2_length" aria-controls="sample-table-2"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> records</label></div></div><div class="col-sm-6"><div class="dataTables_filter" id="sample-table-2_filter"><label>Search: <input aria-controls="sample-table-2" type="text"></label></div></div></div><table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                        <thead>
                        <tr role="row"><th class="center sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 74px;" aria-label="




														">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 199px;" aria-label="Domain: activate to sort column ascending">Domain</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 145px;" aria-label="Price: activate to sort column ascending">Price</th><th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 158px;" aria-label="Clicks: activate to sort column ascending">Clicks</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 233px;" aria-label="

															Update
														: activate to sort column ascending">
                                <i class="icon-time bigger-110 hidden-480"></i>
                                Update
                            </th><th class="hidden-480 sorting" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" style="width: 191px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" style="width: 205px;" aria-label=""></th></tr>
                        </thead>


                        <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">app.com</a>
                            </td>
                            <td class=" ">$45</td>
                            <td class="hidden-480 ">3,330</td>
                            <td class=" ">Feb 12</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-warning">Expiring</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">base.com</a>
                            </td>
                            <td class=" ">$35</td>
                            <td class="hidden-480 ">2,595</td>
                            <td class=" ">Feb 18</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-success">Registered</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">max.com</a>
                            </td>
                            <td class=" ">$60</td>
                            <td class="hidden-480 ">4,400</td>
                            <td class=" ">Mar 11</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-warning">Expiring</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">best.com</a>
                            </td>
                            <td class=" ">$75</td>
                            <td class="hidden-480 ">6,500</td>
                            <td class=" ">Apr 03</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-inverse arrowed-in">Flagged</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">pro.com</a>
                            </td>
                            <td class=" ">$55</td>
                            <td class="hidden-480 ">4,250</td>
                            <td class=" ">Jan 21</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-success">Registered</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">team.com</a>
                            </td>
                            <td class=" ">$40</td>
                            <td class="hidden-480 ">3,200</td>
                            <td class=" ">Feb 09</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-inverse arrowed-in">Flagged</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">up.com</a>
                            </td>
                            <td class=" ">$95</td>
                            <td class="hidden-480 ">8,520</td>
                            <td class=" ">Feb 22</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-info arrowed arrowed-righ">Sold</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">view.com</a>
                            </td>
                            <td class=" ">$45</td>
                            <td class="hidden-480 ">4,100</td>
                            <td class=" ">Mar 12</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-success">Registered</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="odd">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">nice.com</a>
                            </td>
                            <td class=" ">$38</td>
                            <td class="hidden-480 ">3,940</td>
                            <td class=" ">Feb 12</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-info arrowed arrowed-righ">Sold</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr><tr class="even">
                            <td class="center  sorting_1">
                                <label>
                                    <input class="ace" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class=" ">
                                <a href="#">fine.com</a>
                            </td>
                            <td class=" ">$25</td>
                            <td class="hidden-480 ">2,983</td>
                            <td class=" ">Apr 01</td>

                            <td class="hidden-480 ">
                                <span class="label label-sm label-warning">Expiring</span>
                            </td>

                            <td class=" ">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="icon-zoom-in bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="icon-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="icon-trash bigger-130"></i>
                                    </a>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr></tbody></table><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="sample-table-2_info">Showing 1 to 10 of 23 entries</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li class="next"><a href="#"><i class="icon-double-angle-right"></i></a></li></ul></div></div></div></div>
            </div>
        </div>
    </div>
@endsection