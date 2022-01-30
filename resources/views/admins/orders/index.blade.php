@extends('layouts.admin')

@section('title', 'orders')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>orders</h1>

            <ol class="breadcrumb">
                <li> <a href="{{url('admins/orders')}}"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>orders</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <form action="#" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" value="search" class="form-control"
                                    placeholder="search">
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                    search
                                </button>
                            </div>
                        </div>
                    </form>
                </div> {{-- end of box header --}}

                <div class="box-body">

                    <table class="table table-hover">

                        <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>user</th>
                                    <th>total order price</th>
                                    <th>promo code discount</th>
                                    <th>final price</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$order->User->name}}</td>
                                        <td>${{$order->total}}</td>
                                        <td>%{{$order->getDiscound()}}</td>
                                        <td>${{$order->getTotalAfterPromoCode()}}</td>
                                        <td>{{$order->getStatus()}}</td>
                                        <td>
                                            {{-- edit --}}
                                            @if ($order->status >= 0 && $order->status < 2)
                                                @if (auth('admin')->user()->isAbleTo('update-orders'))
                                                    <a href="{{url('admins/orders/nextStage/' . $order->id)}}" style="color: #fff;
                                                        background-color: #17a2b8;
                                                        border-color: #17a2b8;" rel="tooltip" title="" class="btn btn-info btn-sm "
                                                            data-original-title="edit">
                                                            <i class="fa fa-edit">next stage</i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-info btn-sm"type="submit" value="" disabled>
                                                        <i class="fa fa-edit">next stage</i>
                                                    </button>
                                                @endif
                                            @endif
                                            
                                            {{-- delete --}}
                                            @if ($order->status != -1)
                                                @if (auth('admin')->user()->isAbleTo('delete-orders'))
                                                    <a href="{{url('admins/orders/cancel/' . $order->id)}}" tyle="color:#fff!important;" rel="tooltip" title="" class="btn btn-danger  btn-sm">
                                                        <i class="fa fa-1x fa-trash">cancel</i>
                                                    </a> 
                                                @else
                                                    <button class="btn btn-danger btn-sm"type="submit" value="" disabled>
                                                        <i class="fa fa-trash">cancel</i>
                                                    </button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>

                        </table> {{-- end of table --}}

                </div> {{-- end of box body --}}

            </div> {{-- end of box --}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
