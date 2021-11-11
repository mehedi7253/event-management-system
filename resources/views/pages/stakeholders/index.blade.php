@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-4">
        <h1 class="text-center font-weight-bold mt-5">{{ $page_name }}</h1>

        @foreach ($stakeholders as $stake)
            <div class="col-md-4 col-sm-12 float-left mt-5">
                <div class="card">
                    <img src="{{ asset('user/images/'.$stake->image) }}" class="card-img-top" style="height: 200px; width: 100%">
                    <div class="card-body">
                        <h3 class="text-center">{{ $stake->name }}</h3>
                        <p> Phone: {{ $stake->phone }}</p>
                        <p> Email: {{ $stake->email }}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-info float-right" href="{{ route('stake-holders.show',$stake->id) }}">View Profile</a>
                    </div>
                </div>
            </div>  
        @endforeach

    </div>

@endsection