@extends('layouts.admin')

@section('title', 'dashbourd')

@section('content')

    <div class="content-wrapper" style="min-height: 0">

        <section class="content-header">

            <h1>dashboard</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i>dashboard</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- categories --}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{count(App\Models\Admin::get())}}</h3>

                            <p>admins</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div> 
                            @if (auth()->user()->hasPermission('read-admins'))
                                <a href="{{url('admins/admins')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                            @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{count(App\Models\Role::get())}}</h3>

                            <p>Roles</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div> 
                            @if (auth()->user()->hasPermission('read-roles'))
                                <a href="{{url('admins/roles')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                            @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{count(App\Models\User::get())}}</h3>

                            <p>users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if (auth()->user()->hasPermission('read-users'))
                            <a href="{{url('admins/users')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{count(App\Models\Product::get())}}</h3>

                            <p>products</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if (auth()->user()->hasPermission('read-products'))
                            <a href="{{url('admins/products')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{count(App\Models\Order::get())}}</h3>

                            <p>users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if (auth()->user()->hasPermission('read-orders'))
                            <a href="{{url('admins/orders')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-black">
                        <div class="inner">
                            <h3>{{count(App\Models\Promo_code::get())}}</h3>

                            <p>users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if (auth()->user()->hasPermission('read-promocodes'))
                            <a href="{{url('admins/promocodes')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{count(App\Models\Main_category::get())}}</h3>

                            <p>Main category</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if (auth()->user()->hasPermission('read-categories'))
                            <a href="{{url('admins/main_categories')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{count(App\Models\Sub_category::get())}}</h3>

                            <p>Sub category</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        @if (auth()->user()->hasPermission('read-categories'))
                            <a href="{{url('admins/sub_categories')}}" class="small-box-footer">read<i class="fa fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>

            </div><!-- end of row -->
        </section><!-- end of content -->
        {{-- @include('admins.includes._char') --}}

    </div><!-- end of content wrapper -->


@endsection


@push('script')


@endpush
