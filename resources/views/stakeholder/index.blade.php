@extends('template.app')
    @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Index</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active" aria-current="page">Index Page</li>
        </ol>
    </div>

     <div class="card">
         <div class="card-header">
             Card Header 
        </div> 
         <div class="card-body">
            Card Body
         </div>
         <div class="card-footer">
            Card Footer
         </div>
     </div>

@endsection