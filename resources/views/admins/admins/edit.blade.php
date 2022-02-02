@extends('layouts.admin')

@section('title', 'admins-edit')


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
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin: 0 !important;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>username</label>
                                <input type="username" class="form-control  @error('username') is-invalid @enderror" name="username"
                                    placeholder="username" value="{{ $admin->username }}" required autocomplete="off">
                                @error('username')
                                    <small class=" text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                placeholder="email" value="{{ $admin->email  }}" required autocomplete="off">
                                @error('email')
                                    <small class=" text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" placeholder="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="">
                                @error('password')
                                    <small class=" text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>role</label>
                                <select name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}" @if ($role->id == $admin->getRoleId()) selected @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <small class=" text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row" style="margin: 0 !important;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                        save</button>
                                </div>
                            </div>
                        </div>

                    </form> {{-- end of form --}}

                </div> {{-- end of box body --}}

            </div> {{-- end of box --}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
