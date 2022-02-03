@extends('layouts.admin')

@section('title', "main categories-add")


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>add</h1>

            <ol class="breadcrumb">
                <li> <a href="#"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li> <a href="#"><i class="fa fa-users"></i>main categories</a></li>
                <li class="active"><i class="fa fa-plus"></i>add</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h1 class="box-title">add</h1>
                </div> {{-- end of box header --}}

                <div class="box-body">

                    {{-- @include('admins.partials._errors') --}}
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            {{-- name --}}
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1">name in {{$properties['native']}}</label>
                                            <input type="text" class="form-control" name="main_cate[{{$localeCode}}][name]" value="{{ old('main_cate.'.$localeCode.'.name') }}" autocomplete="off">
                                            @error('main_cate.' . $localeCode . '.name')
                                                <span style="color: red;">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <input type="text" name="main_cate[{{$localeCode}}][translation_lang]" class="hidden" value="{{$localeCode}}" autocomplete="off">
                                </div>
                            @endforeach

                            {{-- status --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" id="switcherySize" value="1" class="switchery" name="status" data-size="lg" checked/>
                                    <label for="switcherySize" class="font-medium-2 text-bold-600 ml-1">status</label>
                                </div>
                            </div>

                            {{-- iamge --}}
                            <div class="col-md-12">
                                <label for="projectinput1">categories image</label>
                                <br>
                                <label for="upload-photo" style="width: 100%; text-align: center;">
                                    <img src="{{url('public/admin/theme/app-assets/images/upload.webp')}}" style="width: 25%; margin: 30px 0px;">
                                </label>
                                <input name="image" type="file" id="upload-photo"/>
                                @error('image')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i>Save
                        </button>
                    </form>

                </div> {{-- end of box body --}}

            </div> {{-- end of box --}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
