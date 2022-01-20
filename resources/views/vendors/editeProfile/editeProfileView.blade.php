<?php 
    $page = "editeProfileView";
?>
@extends('layouts.vendors')

@section('content')
<div class="container">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb" style="margin-top: 25px;margin-left: 10px;">
                        <li class="breadcrumb-item"><a href="{{url('admin')}}">{{ trans('admin.dashbourd') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('admin.Edite profile') }}
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
                            <h4 class="card-title">{{ trans('admin.Edite profile') }}</h4>
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
                                <h4 class="form-section"><i class="ft-user"></i>{{ trans('admin.Admin') }}</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="image" type="file" style="margin-bottom: 20px;">
                                        @error('image')
                                            <span style="color: red;">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">{{ trans('admin.username') }}</label>
                                            <input type="text" class="form-control" name="username" value="{{$vendor->username}}" autocomplete="off">
                                            @error('username')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">{{ trans('admin.name') }}</label>
                                            <input type="text" class="form-control" name="name" value="{{$vendor->name}}" autocomplete="off">
                                            @error('name')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">{{ trans('admin.email') }}</label>
                                            <input type="email" class="form-control" name="email" value="{{$vendor->email}}" autocomplete="off">
                                            @error('email')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3">{{ trans('admin.password') }}</label>
                                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" autocomplete="off">
                                            @error('password')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">{{ trans('admin.location') }}</label>
                                            <input type="text" class="form-control" name="location" value="{{$vendor->location}}" autocomplete="off">
                                            @error('location')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">{{ trans('admin.describtion') }}</label>
                                            <textarea class="form-control" name="describtion" style="height: 150px;">{{$vendor->describtion}}</textarea>
                                            @error('describtion')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
        
                            <input type="text" value="1" class="hidden" name="noPass">
                            
                            <button type="submit" class="btn btn-primary" style="">
                                <i class="la la-check-square-o"></i> {{ trans('admin.Save') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop