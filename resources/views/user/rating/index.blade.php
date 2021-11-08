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
    <div class="card">
        <div class="card-header">
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
        <form action="{{ route('rating.update', $id) }}" method="POST">
           @csrf
           @method('PUT')
            <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="status" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="status" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="status" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="status" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="status" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>
            <div class="form-group">
                <textarea name="description" class="form-control" id="application"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="btn" class="btn btn-success" value="Submit">
            </div>
        </form>
       </div>
    </div>
@endsection