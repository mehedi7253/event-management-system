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
            <h6>{{ $page_name }} <a href="{{ route('categorys.index') }}" class="float-right btn btn-info">Manage Category</a></h6>
        </div> 
       <div class="card-body">
           <form action="{{ route('categorys.store') }}" method="POST">
            @csrf
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Select Package <sup class="font-weight-bold text-danger">*</sup></label>
                <select class="form-control" name="package_id">
                    <option>-------Select One--------</option>
                    @foreach ($package as $packages)
                        <option value="{{ $packages->id }}">{{ $packages->package_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Category Name <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" placeholder="Enter Category Name" autocomplete="category_name" autofocus>
                @error('category_name')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label>Price <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="price" type="number" min="1" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Enter Category Price" autocomplete="price" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-md-6 col-sm-12 float-left">
                <label></label>
                <input type="submit" name="submit" class="btn btn-success btn-block mt-2" value="Submit">
            </div>
           </form>
       </div>
    </div>
@endsection