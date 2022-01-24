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
                        <li class="breadcrumb-item"><a href="{{url('vendors')}}">dashbourd</a>
                        </li>
                        <li class="breadcrumb-item active">orders
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
            <div class="card" style="overflow: scroll;">
            <div class="card-header">
                <h4 class="card-title">orders</h4>
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
                        <th>Customer Name</th>
                        <th>product Name</th>
                        <th>total price</th>
                        <th>stage</th>
                        <th>product price</th>
                        <th>product discound</th>
                        <th>product quantity</th>
                        <th>product color</th>
                        <th>product size</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders_orderdetail as $order_orderdetail)
                            <tr>
                                <td>{{$order_orderdetail->Product->name}}</td>
                                <td>{{$order_orderdetail->Order->User->name}}</td>
                                <td>${{$order_orderdetail->product_total_price}}</td>
                                <td>{{$order_orderdetail->Order->getStatus()}}</td>
                                <td>${{$order_orderdetail->product_price}}</td>
                                <td>%{{$order_orderdetail->product_discound}}</td>
                                <td>{{$order_orderdetail->quantity}}</td>
                                <td>{{$order_orderdetail->color}}</td>
                                <td>{{$order_orderdetail->size}}</td>
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