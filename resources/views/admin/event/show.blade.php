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
           <div class="col-md-5 col-sm-12 float-left">
               <img src="{{ asset('event/images/'.$event->image) }}" style="height: 200px; width: 100%">
           </div>
           <div class="col-md-7 col-sm-12 float-left">
               <table class="table-bordered table">
                   <tr>
                       <th>Event Name</th>
                       <td>{{ $event->event_name }}</td>
                   </tr>
                   <tr>
                        <th>Location</th>
                        <td>{{ $event->location }}</td>
                    </tr>
                  
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($event->status == '0')
                                <label class="text-success">Published</label>
                                @else
                                <label class="text-danger">Un-Published</label>
                            @endif
                        </td>
                    </tr>
               </table>
           </div>
           <div class="col-md-12 col-sm-12 mt-4">
              <p><?php echo $event->description ?></p>
           </div>
        </div>
    
    </div>
@endsection