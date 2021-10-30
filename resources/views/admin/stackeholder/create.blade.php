@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>
    <h6>
      @if($message = Session::get('success'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif
    </h6>
    <div class="card">
        <div class="card-header">
            <h6>{{ $page_name }} <a href="{{ route('admin-stackholder.index') }}" class="float-right btn btn-info">Manage Stackeholders</a></h6>
        </div> 
       <div class="card-body">
        <form method="POST" action="{{ route('admin-stackholder.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter Email Address" autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label for="phone">{{ __('Phone') }}</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" autocomplete="phone">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left mt-4">
                <label for="gender">{{ __('Gender') }} :</label>
                <input id="gender" type="radio"  name="gender" value="Male" > Male
                <input id="gender" type="radio"  name="gender" value="Fe-Male" > Fe-Male
            </div>
            <div class="form-group col-md-12 col-sm-12 float-left">
                <label for="address">{{ __('Address') }}</label>
                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter Address"></textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" value="1234" autocomplete="new-password" hidden>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Confirm Password" autocomplete="new-password" value="1234" hidden>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary col-6 btn-block">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>
       </div>
    </div>
@endsection