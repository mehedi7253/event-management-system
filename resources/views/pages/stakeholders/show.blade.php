@extends('pages.layouts.app')
@section('content')
    <div class="col-md-12 col-sm-12 mt-4">
        <h1 class="text-center font-weight-bold mt-5">{{ $page_name }}</h1>

        <div class="col-md-12 col-sm-12 float-left mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-capitalize">{{ $stakeholders->name }} </h6>
                </div> 
               <div class="card-body">
                <div class="col-md-5 col-sm-12 float-left">
                    <img src="{{ asset('user/images/'.$stakeholders->image) }}" style="height: 350px; width: 100%">
                </div>
                <div class="col-md-7 col-sm-12 float-left">
                    <table class="table-bordered table">
                        <tr>
                            <th> Name</th>
                            <td class="text-capitalize">{{ $stakeholders->name }}</td>
                        </tr>
                        <tr>
                             <th>Email</th>
                             <td>{{ $stakeholders->email }}</td>
                         </tr>
                         <tr>
                            <th>Phone</th>
                            <td>{{ $stakeholders->phone }}</td>
                        </tr>
                         <tr>
                             <th>Address</th>
                             <td>
                                {{ $stakeholders->address }}
                             </td>
                         </tr>
                         <tr>
                            <th>Gender</th>
                            <td>
                               {{ $stakeholders->gender }}
                            </td>
                        </tr>
                        <tr>
                            <th>Join Date</th>
                            <td>
                               {{ date('d-M-Y', strtotime($stakeholders->created_at))  }}
                            </td>
                        </tr>
                        <tr>
                            <th>Total Hired</th>
                            <td>
                            @php
                                $totalorder = DB::table('assignstackholders')->where('stackholder_id','=', $stakeholders->id)->count();
                                echo $totalorder;
                            @endphp
                            </td>
                        </tr>
                    </table>
                </div>
               </div>
            </div>
        </div>  
    </div>

@endsection



