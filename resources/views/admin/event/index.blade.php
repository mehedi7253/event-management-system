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
            <h6>{{ $page_name }} <a href="{{ route('events.create') }}" class="float-right btn btn-info">Add New Event</a></h6>
        </div> 
       <div class="card-body">
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Event Name</th>
                  <th>Location</th>
                  <th>Start Date</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($event as $i=>$events)
                   <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $events->event_name }}</td>
                      <td>{{ $events->location }}</td>
                      <td>
                          <img src="{{ asset('event/images/'.$events->image) }}" class="img-thumbnail" style="height: 50px; width: 50px">   
                      </td>
                      <td>
                        <form action="{{ route('events.destroy', $events->id) }}" method="post">
                          <a href="{{ route('events.show', $events->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a> |
                          <a href="{{ route('events.edit', $events->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a> |
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete !!');"><i class="fa fa-trash"></i></button>
                      </form>
                      </td>
                   </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
       </div>
    </div>
@endsection