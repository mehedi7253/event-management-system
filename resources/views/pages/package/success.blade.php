@extends('pages.layouts.app')
@section('content')
    <div class="col-md-8 mx-auto mt-5" style="top: 220px">
        <div class="card">
            <div class="card-body">
                <p class="text-center"><i class="far fa-check-circle fa-5x" style="color: green"></i></p>
                <h2 class="text-center text-success">Your Order Placed Successful</h2>

                <a href="{{ route('user.index') }}" class="btn btn-success text-center col-5 mt-5" style="margin-left: 30%">View Order Status</a>
            </div>
        </div>
    </div>

@endsection