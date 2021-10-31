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
            <h6>{{ $page_name }} </h6>
        </div> 
       <div class="card-body">
           <div class="col-md-12 col-sm-12 float-left">
             <p class="font-weight-bold">Coustomer Details</p>
             {{ $orders->name }} <br/>
             {{ $orders->email }} <br/>
             {{ $orders->phone }} <br/>
             {{ $orders->address }} <br/>
           </div>
         
           <div class="col-md-6 col-sm-12 float-left">
            <p class="font-weight-bold"> Order Date: {{ $orders->created_at }}</p>
           </div>
           <div class="col-md-6 col-sm-12 float-left text-right">
                @if($orders->process == '0')
                    <label class="text-danger">Pending</label>
                @elseif($orders->process == '2')
                    @foreach ($stake_holder as $stake_holders)
                     <a href="{{ route('admin-stackholder.show', $stake_holders->id) }}" class="text-decoration-none">{{ $stake_holders->name }}</a>
                    @endforeach
                @elseif($orders->process == '3')
                    <label class="text-success">Complete</label>
                @endif
           </div>

           <div class="col-md-12 col-sm-12">
               <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Package</th>
                        <td>{{ $package_name }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Main Menu</th>
                        <td>{{ $main_menu }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Sub Menu</th>
                        <td>
                            @foreach ($order_item as $order_items)
                                {{ $order_items->name }}<br/>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($order_item as $order_items)
                                {{ number_format($order_items->price,2) }}<br/>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td></td>
                        <td>
                            {{ number_format($total_price,2) }}
                        </td>
                    </tr>
                </table>
               </div>
           </div>
       </div>
    </div>
@endsection