<?php 
    $page = "itemShow";
?>
@extends('layouts.vendors')

@section('content')
<div class="container">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb" style="margin-top: 25px;margin-left: 10px;">
                        <li class="breadcrumb-item"><a href="{{url('vendor')}}">{{ trans('admin.dashbourd') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ trans('vendor.Edite Item') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">             
    <div class="card">
        <div class="card-header">
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
        <div class="card-content collapse show">
            <div class="card-body">
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>{{ trans('admin.Add sub Categories') }}</h4>
                        <input name="noImage" value="1" type="hidden">
                        <input name="vendorToken" value="{{auth()->user()->remember_token}}" type="hidden">

                        <label for="projectinput1">{{ trans('admin.categories image')}}</label>
                        <br>
                        <div class="row">
                            <!--images-->
                            <div class="col-lg-6">
                                <input name="image[]" type="file" multiple >
                                @error('image')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--sub cat-->
                            <div class="col-lg-6">
                                <label for="projectinput1">{{ trans('vendor.sub categories') }}</label>
                                <select name="sub_CategoriesId" style="width: 300px">
                                    @foreach (App\models\Category::where('translation_lang', '=', LaravelLocalization::getCurrentLocale())->get() as $sub_cate)                                        
                                        @if ($sub_cate->translation_of == 0)
                                            <option value="{{$sub_cate->id}}" @if ($sub_cate->id == $item->sub_CategoriesId) selected @endif>{{$sub_cate->main_cate->name}} => {{$sub_cate->name}}</option>
                                        @else
                                            <option value="{{$sub_cate->translation_of}}" @if ($sub_cate->translation_of == $item->sub_CategoriesId) selected @endif>{{$sub_cate->main_cate->name}} => {{$sub_cate->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <br>
                                @error('sub_CategoriesId')
                                        <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--item Name-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">{{ trans('vendor.Item Name')}}</label>
                                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" autocomplete="off">
                                    @error('name')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--item price-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">{{ trans('vendor.Item price')}}</label>
                                    <input type="number" class="form-control" name="price" min="0" value="{{ $item->price }}" autocomplete="off">
                                    @error('price')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--item discount-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">{{ trans('vendor.Item discount')}}</label>
                                    <input type="number" class="form-control" name="discount" min="0" max="100" value="{{ $item->discount }}" autocomplete="off">
                                    @error('price')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--item describtion-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">{{ trans('vendor.Item describtion')}}</label>
                                    <textarea type="text" class="form-control" name="describtion">{{ $item->describtion }}</textarea>
                                    @error('describtion')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> {{ trans('admin.Save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop