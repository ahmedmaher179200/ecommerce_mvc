@extends('layouts.vendors')

@section('title', 'product edit')

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
                        <h4 class="form-section"><i class="ft-user"></i>Add sub Categories</h4>
                        <input name="noImage" value="1" type="hidden">
                        <input name="vendorToken" value="{{auth()->user()->remember_token}}" type="hidden">

                        <label for="projectinput1">categories image</label>
                        <br>
                        <div class="row">
                            <!--item Name-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">Item Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $product->name }}" autocomplete="off">
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
                                    <label for="projectinput1">Item price</label>
                                    <input type="number" class="form-control" name="price" min="0" value="{{ $product->price }}" autocomplete="off">
                                    @error('price')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--item discound-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">products discound</label>
                                    <input type="number" class="form-control" name="discound" min="0" max="100" value="{{$product->discound}}" autocomplete="off">
                                    @error('price')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--item quantity-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">product quantity</label>
                                    <input type="number" class="form-control" name="quantity" min="1"  value="{{$product->quantity}}" autocomplete="off">
                                    @error('quantity')
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
                                    <label for="projectinput1">product describtion</label>
                                    <textarea type="text" class="form-control" name="describe">{{ $product->describe }}</textarea>
                                    @error('describtion')
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <!--sub cat-->
                            <div class="col-lg-6">
                                <label for="projectinput1">sub categories</label>
                                <select name="sub_CategoriesId" style="width: 300px" class="form-control">
                                    @foreach (App\models\Sub_category::active()->where('locale', LaravelLocalization::getCurrentLocale())->get() as $sub_cate)                                        
                                        <option value="{{$sub_cate->parent}}" @if ($sub_cate->parent == $product->sub_categoriesId) selected @endif>{{$sub_cate->Main_categories->name}} => {{$sub_cate->name}}</option>
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

                            <!--images-->
                            <div class="col-lg-12">
                                <label for="projectinput1">categories image</label>
                                <br>
                                <label for="upload-photo" style="width: 100%; text-align: center;">
                                    <img src="{{url('public/admin/theme/app-assets/images/upload.webp')}}" style="width: 25%; margin: 30px 0px;">
                                </label>
                                <input name="images[]" type="file" id="upload-photo" multiple/>
                                @error('images')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                            <br>
                            <br>
                            <br>
                            
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop