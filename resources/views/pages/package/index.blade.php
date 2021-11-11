@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-4">
        <h1 class="text-center font-weight-bold mt-5">{{ $page_name }}</h1>

        @foreach ($package as $packages)
            <div class="col-md-4 col-sm-12 float-left mt-5">
                <div class="card">
                    <img src="{{ asset('package/images/'.$packages->image) }}" class="card-img-top" style="height: 200px; width: 100%">
                    <div class="card-body">
                        <h3 class="text-capitalize text-center">{{ $packages->package_name }}<sup class="text-success"> Available</sup></h3>
                        <p class="text-center font-weight-bold">
                            @php
                                $ratings = DB::select(DB::raw("SELECT ROUND(AVG(status),1) as averageRating FROM ratings WHERE package_id = $packages->id"))
                            @endphp
                            Avarage
                            @foreach ($ratings as $rating)
                                 {{ $rating->averageRating }} 
                            @endforeach Rating
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pages.package.show', ['name'=>$packages->package_name])}}" class="btn btn-info float-right">View More</a>
                    </div>
                </div>
            </div>  
        @endforeach

    </div>

@endsection