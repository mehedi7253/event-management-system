@extends('stakeholder.layouts.app')
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
            <h6>{{ $page_name }}</h6>
        </div> 
       <div class="card-body" style="margin: 5px; padding: 5px; height: 700px; overflow: auto;">
        
        @foreach ($msgs as $msg)
            @if($msg->sender_id == Auth::user()->id)
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <img src="{{ asset('user/images/'.Auth::user()->image) }}" style="height: 50px; width: 50px; border-radius: 50%;">
                    </div>
                    <textarea class="font-weight-bold form-control" disabled style="height: 56px; border-radius: 16px; margin-left: 8px; margin-top: 10px"> {{ $msg->message }}</textarea>
                </div>
                <p class="text-dark float-right" style="font-size: 9px">{{ $msg->created_at }}</p>
             @elseif($msg->sender_id == '1')
                <div class="form-group input-group">
                    <textarea class="font-weight-bold form-control" disabled style="height: 56px; border-radius: 16px; margin-left: 8px; margin-top: 10px">{{ $msg->message }}</textarea>
                    <div class="input-group-prepend">
                        <img src="{{ asset('user/images/admin.jpg') }}" style="height: 50px; width: 50px; border-radius: 50%;">
                    </div>
                </div>
                <p class="text-dark float-left" style="font-size: 9px">{{ $msg->created_at }}</p>
            @endif
        @endforeach
       
       <div class="card-footer">
        <form action="{{ route('stack-chat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group input-group">
                <input type="text" name="message" placeholder="Write Message...." class="form-control">
                <div class="input-group-prepend">
                    <button type="submit" name="btn" class="btn btn-skype"><i class="fas fa-paper-plane fa-2x" style="color: #0a2d6c"></i></button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection