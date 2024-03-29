@extends('layouts.admin')

@section('title', 'vendors')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>vendors</h1>

            <ol class="breadcrumb">
                <li> <a href="{{url('admins/vendors')}}"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>vendors</li>
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
                                    <th>fullName</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>gender</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($vendors as $vendor)
                                    <tr>
                                        <td>{{$vendor->id}}</td>
                                        <td>{{$vendor->fullName}}</td>
                                        <td>{{$vendor->email}}</td>
                                        <td>{{$vendor->phone}}</td>
                                        <td>{{$vendor->getGender()}}</td>
                                        <td>{{$vendor->getStatus()}}</td>
                                        <td>
                                            {{-- unblock --}}
                                            @if ($vendor->status == 0)
                                                @if (auth('admin')->user()->isAbleTo('update-vendors'))
                                                    <a href="{{url('admins/vendors/block/' . $vendor->id)}}" style="color: #fff;
                                                        background-color: #17a2b8;
                                                        border-color: #17a2b8;" rel="tooltip" title="" class="btn btn-info btn-sm "
                                                            data-original-title="edit">
                                                            <i class="fa fa-edit">un block</i>
                                                    </a>
                                                @else
                                                    <button class="btn btn-info btn-sm"type="submit" value="" disabled>
                                                        <i class="fa fa-edit">un block</i>
                                                    </button>
                                                @endif
                                            @endif
                    
                                            {{-- block --}}
                                            @if ($vendor->status != 0)
                                                @if (auth('admin')->user()->isAbleTo('delete-vendors'))
                                                    <a href="{{url('admins/vendors/block/' . $vendor->id)}}" tyle="color:#fff!important;" rel="tooltip" title="" class="btn btn-danger  btn-sm">
                                                        <i class="fa fa-1x fa-trash">block</i>
                                                    </a> 
                                                @else
                                                    <button class="btn btn-danger btn-sm"type="submit" value="" disabled>
                                                        <i class="fa fa-trash">block</i>
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
