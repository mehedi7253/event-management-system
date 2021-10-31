@extends('stakeholder.layouts.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Index</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">{{ $page_name }}</li>
        </ol>
    </div>

     <div class="card">
         <div class="card-header">
             <h3>{{ $page_name }}</h3>
        </div> 
         <div class="card-body">
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                  <thead class="thead-light">
                      <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Invoice </th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($order_list as $i=>$order)
                          <tr>
                              <td>{{ ++$i }}</td>
                              <td>{{ $order->name }}</td>
                              <td>{{ $order->phone }}</td>
                              <td>{{ $order->email }}</td>
                              <td>{{ $order->invoice_number }}</td>
                              <td>
                                  @if($order->process == '0')
                                      <label class="text-danger">Pending</label>
                                    @elseif($order->process == '2')
                                      <label class="text-info">Assigned</label>
                                    @elseif($order->process == '3')
                                      <label class="text-success">Complete</label>
                                    @else
                                     <label class="text-danger">Failed</label>
                                  @endif
                              </td>
                              <td>
                                <a href="{{ route('new-orders.show', $order->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
         </div>

     </div>

@endsection