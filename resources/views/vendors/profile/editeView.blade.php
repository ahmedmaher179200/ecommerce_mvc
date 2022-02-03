@extends('layouts.vendors')

@section('title', 'edit profile')

@section('content')
<div class="container">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb" style="margin-top: 25px;margin-left: 10px;">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}">dashbourd</a>
                        </li>
                        <li class="breadcrumb-item active">Edite profile
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card" style="padding-bottom: 20px;">
                    <div class="container">
                        <div class="card-header">
                            <h4 class="card-title">Edite profile</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <form class="form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="vendorToken" value="{{auth('vendor')->user()->remember_token}}">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i>Admin</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="image" type="file" style="margin-bottom: 20px;">
                                        @error('image')
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">username</label>
                                            <input type="text" class="form-control" name="username" value="{{$vendor->fullName}}" autocomplete="off">
                                            @error('username')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">email</label>
                                            <input type="email" class="form-control" name="email" value="{{$vendor->email}}" autocomplete="off">
                                            @error('email')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{$vendor->phone}}" autocomplete="off">
                                            @error('phone')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3">password</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" autocomplete="off">
                                            @error('password')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
        
                            <input type="text" value="1" class="hidden" name="noPass">
                            
                            <button type="submit" class="btn btn-primary" style="">
                                <i class="la la-check-square-o"></i>Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop