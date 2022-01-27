{{ csrf_field() }}

<div class="row" style="margin: 0 !important;">
<div class="col-md-12">
    <div class="form-group">
        <label>name</label>
        <input type="name" class="form-control  @error('name') is-invalid @enderror" name="name"
            value="name">
        @error('name')
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
            value="email">
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
        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="">
        @error('password')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>password_confirmation</label>
        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" value="">
        @error('password_confirmation')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>phone</label>
        <input type="tel" required
            class="form-control  @error('phone') is-invalid @enderror" name="phone" value="phone">
        @error('phone')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>address</label>
        <input type="text" required class="form-control  @error('address') is-invalid @enderror" name="address"
            value="address">
        @error('address')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>
</div>

{{-- <input type="hidden" name="user_type" value="App\User"> --}}

<div class="col-md-3">
    <div class="form-group">
        <label>image</label>
        <input type="file" name="image" class="form-control image @error('image') is-invalid @enderror">
        @error('image')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>
</div>

<div class="form-group col-md-3">
    <img src="#" style="width: 115px;height: 80px;position: relative;
                    top: 14px;" class="img-thumbnail image-preview">
</div>
</div>
