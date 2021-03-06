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
        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Event Name <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="event_name" type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" value="{{ $event->event_name }}" placeholder="Enter Event Name" autocomplete="event_name" autofocus>
                @error('event_name')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
            <div class="form-group col-sm-12 col-md-6 float-left">
                <label>Location <sup class="font-weight-bold text-danger">*</sup></label>
                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$event->location }}" placeholder="Enter Location" autocomplete="location" autofocus>
                @error('location')
                <span class="invalid-feedback" role="alert">
                     <label style="color: red">{{ $message }}</label>
                 </span>
                @enderror
            </div>
           
            <div class="form-group col-sm-12 col-md-6 float-left mt-5">
                <label>Status<sup class="font-weight-bold text-danger ">*</sup></label>
                @if($event->status == '0')
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
                <img src="{{ asset('event/images/'.$event->image) }}" style="height: 120px; width: 120px"><br/>
            </div>
            
            <div class="form-group col-md-12 col-md-6 float-left">
                <label>Description <sup class="font-weight-bold text-danger">*</sup></label>
                <textarea name="description" id="application" class="form-control" placeholder="Enter Description">{{ $event->description }}</textarea>
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