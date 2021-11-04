@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-5">
       <div class="card mt-5">
        <div class="card-header">
            <h3>Your Order List</h3>
        </div>
        <div class="card-body">
          
            <div class="col-md-6 col-sm-12 float-left border-right">
                @if(Auth::check() && Auth::user()->role_id == 2)
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" disabled>
                    </div>
                @else
                  <a href="{{ url('login') }}" class="btn btn-danger text-white" style="margin-top: 30%;margin-bottom: 30%;margin-left: 18%;">Login First Befroe Confirm Order</a>
                @endif
            </div>
          
            <div class="col-md-6 col-sm-12 float-left">
                <div class="table-responsive">
                    <h4>Order Item</h4>
                    <hr/>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Package</th>
                            <td>{{ $package_name }}</td>
                            <td>Price</td>
                        </tr>
                        <tr>
                            <th>Main Menu</th>
                            <td>{{ $main_menu }}</td>
                            <td>{{ $main_menu_price }}</td>
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
                        @if(Auth::check() && Auth::user()->role_id == 2)
                        <tr>
                            <th></th>
                            <td></td>
                            <td>
                                <form action="{{ route('orders.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" hidden>
                                    <input type="text" name="email" value="{{ Auth::user()->email }}" hidden>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" hidden>
                                    <input type="text" name="address" value="{{ Auth::user()->address }}" hidden>
                                    <input type="text" name="invoice_number" value="{{ $invoice_number }}" hidden>
                                    <input type="text" name="amount" value="{{ $total_price }}" hidden>
                                    <input type="submit" name="btn" class="btn btn-info" value="Submit">
                                </form>
                            </td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
       </div>
    </div>
@endsection