@extends('admin.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>
      @if($message = Session::get('success'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>{{ $message }}</strong>
          </div>
      @endif
    <div class="card">
        <div class="card-header">
            <h6>{{ $page_name }} <a href="{{ route('events.index') }}" class="float-right btn btn-info">Manage Event</a></h6>
        </div> 
       <div class="card-body">
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Event Name <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="event_name" type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" value="{{ old('event_name') }}" placeholder="Enter Event Name" autocomplete="event_name" autofocus>
                @error('event_name')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Location <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" placeholder="Enter Location" autocomplete="location" autofocus>
                @error('location')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Start Date <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" autocomplete="start_date" autofocus>
                @error('start_date')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Image<sup class="font-weight-bold text-danger">*</sup></label>
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>
                @error('image')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Status<sup class="font-weight-bold text-danger">*</sup></label>
                <input type="radio" name="status" value="0" id="status"> Published
                <input type="radio" name="status" value="1" id="status"> Un-Published
                @error('status')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
               
            </div>
            <div class="form-group col-md-12 col-md-6 float-left">
                <label>Description <sup class="font-weight-bold text-danger">*</sup></label>
                <textarea name="description" id="application" class="form-control" placeholder="Enter Description"></textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <input type="submit" name="btn" class="btn btn-success" value="Submit">
            </div>
        </form>
       </div>
    </div>
@endsection