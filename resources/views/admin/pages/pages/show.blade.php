@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.categories.index'),
        'menu'      => [
            __('admin.categories.index') => route('admin.categories.index'),
        ],
    ])
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!--begin::List Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">View Details</h3>
                    <div class="card-toolbar">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="navi-link">
                                            <span class="navi-icon">
                                                <i class="flaticon2-pen text-primary"></i>
                                            </span>
                                            <span class="navi-text">Edit</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a class="navi-link" onclick="$('.deleteForm').submit()" style="cursor: pointer;">
                                            <span class="navi-icon">
                                                <i class="flaticon-delete text-danger"></i>
                                            </span>
                                            <span class="navi-text">Delete</span>
                                        </a>
                                        <form method="post" class="deleteForm" action="{{ route('admin.categories.destroy', $category->id) }}" style="display: inline;" title="Delete">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
                                        </form>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    @if($category->getFirstMedia('logo'))
                    <div style="margin-bottom: 50px">
                        
                        <?php 
                            $image = $category->getFirstMedia('logo'); 
                        ?>
                        <img src="{{ url('/uploads/media/'. $image->id .'/'.$image->file_name) }}" style="width: 300px" class="align-self-end" alt="" />
                    </div>
                    @endif
                    <!--begin::Item-->

                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('Name') }}</a>
                            <span class="text-muted">{{ $category->translate('en')->name }}</span>
                        </div>
                    </div>                    

                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('Description') }}</a>
                            <span class="text-muted">{{ $category->translate('en')->description }}</span>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('Status') }}</a>
                            <span class="text-muted">{{ $category->active ? 'Active' : 'Inactive' }}</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-10">
                        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                            <a class="text-dark text-hover-primary mb-1 font-size-lg">{{ __('Parent Category') }}</a>
                            <span class="text-muted">{{ $category->parent ? $category->parent->name : '' }}</span>
                        </div>
                    </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 3-->
        </div>
    </div>
@endsection