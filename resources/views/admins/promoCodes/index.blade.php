@extends('layouts.admin')

@section('title', 'promo codes')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>promo codes</h1>

            <ol class="breadcrumb">
                <li> <a href="{{url('admins/promocodes')}}"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>promo codes</li>
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
                                @if (auth('admin')->user()->isAbleTo('create-promocodes'))
                                    <a href="{{url('admins/promocodes/create')}}"
                                    class="btn btn-primary"><i class="fa fa-plus"></i>add
                                    </a>
                                @else
                                    <button class="btn btn-primary"disabled><i class="fa fa-plus"></i>Add </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div> {{-- end of box header --}}

                <div class="box-body">

                    <table class="table table-hover">

                        <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>status</th>
                                    <th>code</th>
                                    <th>discound</th>
                                    <th>expire_date</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($promo_codes as $promo_code)
                                    <tr>
                                        <td>{{$promo_code->id}}</td>
                                        <td>{{$promo_code->getStatus()}}</td>
                                        <td>{{$promo_code->code}}</td>
                                        <td>{{$promo_code->discound}} %</td>
                                        <td>{{$promo_code->expire_date}}</td>
                                        <td>
                                            {{-- expiry --}}
                                            @if (auth('admin')->user()->isAbleTo('delete-promocodes'))
                                                <a href="{{url('admins/promocodes/expiry/' . $promo_code->id)}}" tyle="color:#fff!important;" rel="tooltip" title="" class="btn btn-danger  btn-sm">
                                                    <i class="fa fa-1x fa-trash">expiry</i>
                                                </a> 
                                            @else
                                                <button class="btn btn-danger btn-sm"type="submit" value="" disabled>
                                                    <i class="fa fa-trash">expiry</i>
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
