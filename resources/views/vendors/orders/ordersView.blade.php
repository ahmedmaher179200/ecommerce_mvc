<?php 
    $page = "orderShow";
?>
@extends('layouts.vendors')

@section('content')
<div class="container">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb" style="margin-top: 25px;margin-left: 10px;">
                        <li class="breadcrumb-item"><a href="{{url('vendor')}}">{{ trans('admin.dashbourd') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('vendor.orders') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @include('vendors.alerts.success')
    @include('vendors.alerts.error')
    <section id="configuration">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ trans('vendor.orders') }}</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>{{ trans('vendor.Item Name') }}</th>
                        <th>{{ trans('vendor.Customer Name') }}</th>
                        <th>{{ trans('vendor.stage') }}</th>
                        <th>{{ trans('admin.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->user->username}}</td>
                                <td>{{$order->item->name}}</td>
                                <td>{{App\CustomClass\myfunctions::RequestStage($order->stage)}}</td>
                                <td>
                                    <a href="{{url('/vendor/orders/changeStage/' . $order->id)}}" class="btn btn-success btn-min-width box-shadow-2 mr-1 mb-1" style="min-width: 6.5rem; margin-right: 8px !important;">{{App\CustomClass\myfunctions::changeStage($order->stage)}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>

<script src="{{url('public/admin/theme/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<script src="{{url('public/admin/theme/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{url('public/admin/theme/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"
@stop