@extends('user.layouts.app')
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
    <div class="card mb-5">
        <div class="card-header">
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
        <form action="{{ route('user.profile.update', $user_data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label> Name</label>
                <input type="text" name="name" value="{{ $user_data->name }}" class="form-control">
                @error('name')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" disabled title="Can't Update Your Email" value="{{ $user_data->email }}" class="form-control">
           
            </div>
            <div class="form-group">
                <label>Gender</label>
                @if($user_data->gender == 'Male')
                    <input type="radio" checked name="gender" value="Male">Male
                    <input type="radio"  name="gender" value="Fe-Male">Fe-Male
                @elseif($user_data->gender == 'Fe-Male')
                    <input type="radio"  name="gender" value="Male">Male
                    <input type="radio" checked name="gender" value="Fe-Male">Fe-Male
                @endif
                @error('gender')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="phone" value="{{ $user_data->phone }}" class="form-control">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group">
                <img src="{{ asset('user/images/'.$user_data->image) }}" style="height: 120px; width: 120px"><br/>
            </div>
            <div class="form-group">
                <label>Profile Picture</label>
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>
                @error('image')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address">{{ $user_data->address }}</textarea>
                @error('address')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label></label>
                <input type="submit" name="btn" value="Update Now" class="btn btn-success">
            </div>
        </form>
       </div>
    </div>
@endsection