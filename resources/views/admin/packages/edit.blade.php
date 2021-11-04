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
            <h6>{{ $page_name }} <a href="{{ route('packages.create') }}" class="float-right btn btn-info">Add New pacakges</a></h6>
        </div> 
       <div class="card-body">
        <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Package Name <sup class="text-danger font-weight-bold">*</sup></label>
                <input id="package_name" type="text" class="form-control @error('package_name') is-invalid @enderror" name="package_name" value="{{ $package->package_name }}" placeholder="Enter Package Name" autocomplete="package_name" autofocus>
                @error('package_name')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
          
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label>Package Image <sup class="text-danger font-weight-bold">*</sup></label>
                <input id="image" type="file"  class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="col-md-6 col-sm-12 float-left">
                <img src="{{ asset('package/images/'.$package->image) }}" style="height: 120px; width: 120px"><br/>
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label>Status <sup class="text-danger font-weight-bold">*</sup></label><br/>
                @if($package->status == '0')
                    <input type="radio" name="status" checked  value="0" >
                    <label for="male">Publish</label>

                    <input type="radio" name="status" value="1">
                    <label for="female" class="m-l-20">Un-Publish</label>
                @else
                    <input type="radio" name="status" value="0" >
                    <label for="male">Publish</label>

                    <input type="radio" name="status" checked value="1" >
                    <label for="female" class="m-l-20">Un-Publish</label>
                @endif

                @error('status')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
           
            <div class="form-group col-md-6 col-sm-12 float-left mt-4">
                <input type="submit" name="submit" class="btn btn-success btn-block" value="Submit">
            </div>
        </form>
       </div>
    </div>
@endsection