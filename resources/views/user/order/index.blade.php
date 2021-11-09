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
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead class="thead-light">
                  <tr>
                      <th>#</th>
                      <th>Invoice </th>
                      <th>Bokking Date</th>
                      <th>Location</th>
                      <th>Status</th>
                      <th>Review</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $i=>$order)
                      <tr>
                          <td>{{ ++$i }}</td>
                          <td>{{ $order->invoice_number }}</td>
                          <td>{{ $order->booking_date }}</td>
                          <td>{{ $order->event_location }}</td>
                          <td>
                              @if($order->process == '0')
                                  <label class="text-danger">Pending</label>
                                @elseif($order->process == '1')
                                  <label class="text-info">Rechived</label>
                                @elseif($order->process == '2')
                                  <label class="text-info">Assigned</label>
                                @elseif($order->process == '3')
                                  <label class="text-success">Complete</label>
                                @else
                                 <label class="text-danger">Failed</label>
                              @endif
                          </td>
                          <td>
                            @php
                              $package = DB::select(DB::raw("SELECT * FROM orders, carts WHERE orders.invoice_number = carts.invoice_number AND orders.id = $order->id GROUP BY orders.invoice_number")) 
                            @endphp
                              @if($order->process == '3')
                                @if($order->rating_status == '0')
                                  @foreach ($package as $packages)
                                    <a class="btn btn-info" href="{{ route('rating.edit',$packages->package_id)  }}">Review Now</a>
                                  @endforeach
                                @else
                                  <label class="text-success">Rating Done</label>
                                @endif
                              @else
                                <label class="text-danger">Event Not Complete</label>
                              @endif
                         
                          </td>
                          <td>
                              <a href="{{ route('user-orders.show', $order->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
       </div>
    </div>
@endsection