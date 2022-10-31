<div class="mb-7">
    <div class="row align-items-center">
@if(isset($search))
        <div class="col-lg-6 col-xl-6">
            <div class="row align-items-center">
                <div class="col-md-6 my-2 my-md-0">
                    <div class="input-icon">
                        <form method="get" id="search-form">
                            <input type="text" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}" name="search" class="form-control" placeholder="Search...">
                            <span><i class="flaticon2-search-1 text-muted"></i></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endif
{{-- @elseif(isset($hasExport))
<div class="col-lg-8 col-xl-8"></div>
 @endif --}}
@if(isset($hasExport))
<div class="col-md-4">
    <div style="text-align: left">

        <!-- Start button group-->
                <div class="btn-group  m-rb-5">
                    <button type="button" class="btn btn-success">تصدير البيانات  </button>
                    <button type="button" style="padding: 14px 10px;" data-toggle="dropdown" class="btn dropdown-toggle btn-success">
                        <span class="caret"></span>
                        <span class="sr-only">success</span>
                    </button>
                    <div role="menu" class="dropdown-menu">
                      <a style="padding:5px 10px"  class="dropdown-item" href="{{ route(Route::currentRouteName()) }}?exportEx=xlsx{{ isset($_GET['salon_id']) ?'&salon_id='.$_GET['salon_id'] : '' }}{{ isset($_GET['user_id']) ?'&user_id'.$_GET['user_id'] :'' }}{{ isset($_GET['service_id']) ?'&service_id'.$_GET['service_id'] :'' }}{{ isset($_GET['categories_id']) ?'&categories_id'.$_GET['categories_id'] :'' }}{{  isset($_GET['from']) ?'&from='.$_GET['from'] : ''}}{{  isset($_GET['to']) ?'&to='.$_GET['to'] : ''}}" target="_blank">
                                {{-- <i class="far fa-file-excel"></i> --}}
                                 <i class="flaticon2-crisp-icons"></i>
                                <span style="    margin-right: 9px;">Excel</span>
                            </a>


                            <a style="padding:5px 10px" class="dropdown-item" href="{{ route(Route::currentRouteName()) }}?exportEx=csv{{ isset($_GET['salon_id']) ?'&salon_id='.$_GET['salon_id'] : '' }}{{ isset($_GET['user_id']) ?'&user_id'.$_GET['user_id'] :'' }}{{ isset($_GET['service_id']) ?'&service_id'.$_GET['service_id'] :'' }}{{ isset($_GET['categories_id']) ?'&categories_id'.$_GET['categories_id'] :'' }}{{  isset($_GET['from']) ?'&from='.$_GET['from'] : ''}}{{  isset($_GET['to']) ?'&to='.$_GET['to'] : ''}}" target="_blank">
                                {{-- <i class="fa fa-file-text-o"></i> --}}
                                <i class="flaticon2-crisp-icons"></i>
                                <span style="    margin-right: 9px;">CSV</span>
                            </a>


                            <a style="padding:5px 10px" class="dropdown-item" href="{{ route(Route::currentRouteName()) }}?export{{ isset($_GET['salon_id']) ?'&salon_id='.$_GET['salon_id'] : '' }}{{ isset($_GET['user_id']) ?'&user_id'.$_GET['user_id'] :'' }}{{ isset($_GET['service_id']) ?'&service_id'.$_GET['service_id'] :'' }}{{ isset($_GET['categories_id']) ?'&categories_id'.$_GET['categories_id'] :'' }}{{  isset($_GET['from']) ?'&from='.$_GET['from'] : ''}}{{  isset($_GET['to']) ?'&to='.$_GET['to'] : ''}}" target="_blank">
                                {{-- <i class="fa fa-file-pdf-o"></i> --}}
                                <i class="flaticon2-print"></i>
                                <span style="    margin-right: 9px;">PDF</span>
                            </a>


                    </div>
                </div>
            <!-- End button group-->


    </div>
</div>

@endif

@if(isset($hasExportAll))
<div class="col-lg-6 col-xl-6">
    <div style="text-align: left">
        <!-- Start button group-->
    <div class="btn-group  m-rb-5">
        <button type="button" class="btn btn-inverse">تصدير البيانات  </button>
        <button type="button" style="padding: 14px 10px;" data-toggle="dropdown" class="btn dropdown-toggle btn-inverse">
            <span class="caret"></span>
            <span class="sr-only">success</span>
        </button>
        <ul role="menu" class="dropdown-menu">
            <li style="border-bottom: 1px solid;">
                <a style="padding:5px 10px" href="{{ route(Route::currentRouteName()) }}?exportEx=xlsx{{ isset($_GET['status']) ?'&status='.$_GET['status'] : '' }}{{  isset($_GET['order_from']) ?'&order_from='.$_GET['order_from'] : ''}}{{  isset($_GET['order_to']) ?'&order_to='.$_GET['order_to'] : ''}}" target="_blank">
                    <i class="fa fa-file-excel-o"></i><span style="    margin-right: 9px;">Excel</span>
                </a>
            </li>
            <li style="border-bottom: 1px solid;">
                <a style="padding:5px 10px" href="{{ route(Route::currentRouteName()) }}?exportEx=csv{{ isset($_GET['status']) ?'&status='.$_GET['status'] : '' }}{{  isset($_GET['order_from']) ?'&order_from='.$_GET['order_from'] : ''}}{{  isset($_GET['order_to']) ?'&order_to='.$_GET['order_to'] : ''}}" target="_blank">
                    <i class="fa fa-file-text-o"></i><span style="    margin-right: 9px;">CSV</span>
                </a>
            </li>
             <li style="">
                <a style="padding:5px 10px" href="{{ route(Route::currentRouteName()) }}?export{{ isset($_GET['status']) ?'&status='.$_GET['status'] : '' }}{{  isset($_GET['order_from']) ?'&order_from='.$_GET['order_from'] : ''}}{{  isset($_GET['order_to']) ?'&order_to='.$_GET['order_to'] : ''}}" target="_blank">
                    <i class="fa fa-file-pdf-o"></i><span style="    margin-right: 9px;">PDF</span>
                </a>
            </li>

        </ul>
    </div>
<!-- End button group-->


    </div>
</div>
@endif
    </div>
</div>