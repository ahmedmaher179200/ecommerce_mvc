@extends('layouts.admin')

@section('title', 'products')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>products</h1>

            <ol class="breadcrumb">
                <li> <a href="{{url('admins/products')}}"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>products</li>
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
                                    <th>name</th>
                                    <th>image</th>
                                    <th>vendor</th>
                                    <th>final price</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$product->name}}</td>
                                        <td>
                                            <img src="{{url('public/uploads/products/' . $product->images[0]->image)}}" style="width: 100px;">
                                        </td>
                                        <td>{{$product->Vendor->fullName}}</td>
                                        <td>{{$product->getPriceAfterDiscound()}}</td>
                                        <td>{{$product->getStatus()}}</td>
                                        <td>
                                            {{-- change status --}}
                                            @if (auth('admin')->user()->isAbleTo('update-products'))
                                                <a href="{{url('admins/products/changeStatus/' . $product->id)}}" style="color: #fff;
                                                    background-color: #17a2b8;
                                                    border-color: #17a2b8;" rel="tooltip" title="" class="btn btn-info btn-sm "
                                                        data-original-title="changeStatus">
                                                        <i class="fa fa-edit">{{$product->getChangStatus()}}</i>
                                                </a>
                                            @else
                                                <button class="btn btn-info btn-sm"type="submit" value="" disabled>
                                                    <i class="fa fa-edit">active</i>
                                                </button>
                                            @endif

                                            @if (auth('admin')->user()->isAbleTo('delete-products'))
                                                <a href="{{url('admins/products/delete/' . $product->id)}}" tyle="color:#fff!important;" rel="tooltip" title="" class="btn btn-danger  btn-sm">
                                                    <i class="fa fa-1x fa-trash">delete</i>
                                                </a> 
                                            @else
                                                <button class="btn btn-danger btn-sm"type="submit" value="" disabled>
                                                    <i class="fa fa-trash">delete</i>
                                                </button>
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
