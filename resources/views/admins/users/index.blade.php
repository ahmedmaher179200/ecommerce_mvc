@extends('layouts.admin')

@section('title', 'hhhhh')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>asd</h1>

            <ol class="breadcrumb">
                <li> <a href="#"><i class="fa fa-dashboard"></i>dashboard</a>
                </li>
                <li class="active"><i class="fa fa-users"></i>asd</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h1 class="box-title">good1<small>20</small></h1>

                    <form action="#" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" value="search" class="form-control"
                                    placeholder="search">
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                    search</button>
                                    <a href="#"
                                    class="btn btn-primary"><i class="fa fa-plus"></i>add
                                </a>
                                    {{-- <button class="btn btn-primary"disabled><i class="fa fa-plus"></i>Add </button> --}}


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
                                    <th>phone</th>
                                    <th>address</th>
                                    <th>action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ahmed</td>
                                    <td>012123123</td>
                                    <td>eygpt</td>
                                    <td>
                                        @include('dashboard.buttons.edit')
                                
                                        {{-- <button class="btn btn-info btn-sm"type="submit" value="" disabled>
                                            <i class="fa fa-edit">edit</i>
                                        </button> --}}

                                        @include('dashboard.buttons.delete')
                                        {{-- <button class="btn btn-danger btn-sm"type="submit" value="" disabled>
                                            <i class="fa fa-trash">delete</i>
                                        </button> --}}

                                    </td>
                                </tr>

                            </tbody>

                        </table> {{-- end of table --}}

                </div> {{-- end of box body --}}

            </div> {{-- end of box --}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
