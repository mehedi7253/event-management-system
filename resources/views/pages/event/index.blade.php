@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-4">
        <h1 class="text-center font-weight-bold mt-5">{{ $page_name }}</h1>

        @foreach ($events as $event)
            <div class="col-md-4 col-sm-12 float-left mt-5">
                <div class="card">
                    <img src="{{ asset('event/images/'.$event->image) }}" class="card-img-top" style="height: 200px; width: 100%">
                    <div class="card-body">
                        <h3>{{ $event->event_name }}</h3>
                        <p>Location: {{ $event->location }}</p>
                    </div>
                </div>
            </div>  
        @endforeach

    </div>

@endsection