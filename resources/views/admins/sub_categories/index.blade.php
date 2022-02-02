@extends('layouts.admin')

@section('title', 'sub categories')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>sub categories</h1>

            <ol class="breadcrumb">
                <li> <a href="{{url('admins/sub_categories')}}"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>sub categories</li>
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
                                @if (auth('admin')->user()->isAbleTo('create-categories'))
                                    <a href="{{url('admins/sub_categories/create')}}"
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
                                    <th>name</th>
                                    <th>main gategory</th>
                                    <th>image</th>
                                    <th>status</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($sub_categories as $sub_category)
                                    <tr>
                                        <td>{{$sub_category->id}}</td>
                                        <td>{{$sub_category->name}}</td>
                                        <td>{{$sub_category->Main_categories->name}}</td>
                                        <td>
                                            <img src="{{url('public/uploads/sub_categories/' . $sub_category->image->image)}}" style="width: 100px;">
                                        </td>
                                        <td>{{$sub_category->getStatus()}}</td>
                                        <td>
                                            {{-- edit --}}
                                            @if (auth('admin')->user()->isAbleTo('update-categories'))
                                                <a href="{{url('admins/sub_categories/edit/' . $sub_category->id)}}" style="color: #fff;
                                                    background-color: #17a2b8;
                                                    border-color: #17a2b8;" rel="tooltip" title="" class="btn btn-info btn-sm "
                                                        data-original-title="edit">
                                                        <i class="fa fa-edit">edit</i>
                                                </a>
                                            @else
                                                <button class="btn btn-info btn-sm"type="submit" value="" disabled>
                                                    <i class="fa fa-edit">edit</i>
                                                </button>
                                            @endif

                                            {{-- delete --}}
                                            @if (auth('admin')->user()->isAbleTo('delete-categories'))
                                                <a href="{{url('admins/sub_categories/delete/' . $sub_category->id)}}" tyle="color:#fff!important;" rel="tooltip" title="" class="btn btn-danger  btn-sm">
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
