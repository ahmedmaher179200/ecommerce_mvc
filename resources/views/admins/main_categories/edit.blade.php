@extends('layouts.admin')

@section('title', 'main categories-edit')


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>main categories edit</h1>

            <ol class="breadcrumb">
                <li> <a href="#"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li> <a href="#"><i class="fa fa-users"></i>main categories</a></li>
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
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i>Add Mian_Categories</h4>
                            {{-- image --}}
                            <label for="projectinput1">categories image</label>
                            <br>
                            <input name="image" type="file">
                            @error('image')
                                <span style="color: red;">{{$message}}</span>
                            @enderror
                            <br>
                            <br>

                            {{-- name --}}
                            @foreach($Main_category_childs as $child)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">name in {{$child->locale}}</label>
                                            <input type="text" class="form-control" name="main_cate[{{$child->locale}}][name]" value="{{ $child->name }}" autocomplete="off">
                                            @error('main_cate.' . $child->locale . '.name')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="text" name="main_cate[{{$child->locale}}][translation_lang]" class="hidden" value="{{$child->locale}}" autocomplete="off">
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" id="switcherySize" value="1" class="switchery" name="status" data-size="lg" @if ($main_category->status == 1) checked @endif/>
                                    <label for="switcherySize" class="font-medium-2 text-bold-600 ml-1">status</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="la lfa-check-square-o"></i>Save
                        </button>
                    </form>

                </div> {{-- end of box body --}}

            </div> {{-- end of box --}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
