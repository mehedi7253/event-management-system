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
            <h6>{{ $page_name }} <a href="{{ route('packages.index') }}" class="float-right btn btn-info">Manage pacakges</a></h6>
        </div> 
         <div class="card-body">
            <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Package Name <sup class="text-danger font-weight-bold">*</sup></label>
                    <input id="package_name" type="text" class="form-control @error('package_name') is-invalid @enderror" name="package_name" value="{{ old('package_name') }}" placeholder="Enter Package Name" autocomplete="package_name" autofocus>
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
                <div class="form-group col-md-6 col-sm-12 float-left">
                    <label>Status <sup class="text-danger font-weight-bold">*</sup></label><br/>
                    <input type="radio" checked value="0" name="status"> Published
                    <input type="radio" value="1" name="status"> Un-Published
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