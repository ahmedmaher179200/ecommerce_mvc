@extends('layouts.admin')

@section('title', 'edit')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>user edit</h1>

            <ol class="breadcrumb">
                <li> <a href="#"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li> <a href="#"><i class="fa fa-users"></i>user</a></li>
                <li class="active"><i class="fa fa-edit"></i>edit</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h1 class="box-title"> @lang('site.edit')</h1>
                </div> {{-- end of box header --}}

                <div class="box-body">

                    {{-- @include('admins.partials._errors') --}}
                    <form action="#" method="post" enctype="multipart/form-data">

                        {{ method_field('patch') }}

                        @include('dashboard.users.form')

                <div class="row" style="margin: 0 !important;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                user edit</button>
                        </div>
                    </div>
                </div>

                    </form> {{-- end of form --}}

                </div> {{-- end of box body --}}

            </div> {{-- end of box --}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
