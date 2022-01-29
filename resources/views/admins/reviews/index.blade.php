@extends('layouts.admin')

@section('title', 'hhhhh')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>reviews</h1>

            <ol class="breadcrumb">
                <li> <a href="{{url('admins/reviews')}}"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>reviews</li>
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
                                    <th>product</th>
                                    <th>comment</th>
                                    <th>rating</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$review->User->name}}</td>
                                        <td>{{$review->Product->name}}</td>
                                        <td>{{$review->content}}</td>
                                        <td>{{$review->rating}}</td>
                                        <td>
                                            {{-- delete --}}
                                            @if (auth('admin')->user()->isAbleTo('delete-reviews'))
                                                <a href="{{url('admins/reviews/delete/' . $review->id)}}" tyle="color:#fff!important;" rel="tooltip" title="" class="btn btn-danger  btn-sm">
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
