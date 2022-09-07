@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php
                        $data = Redis::hgetall('user:rou');
                        //dump($data);
                    @endphp
                    <div class="card w-25 p-3">
                        {{"Total Active Users: ".count($data);}}
                    </div>
                    <div class="card mt-4">
                       
                    </div>
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Active On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $val)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$val}}</td>
                             </tr> 
                            @empty
                                <tr>
                                   <td colspan="2"> No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
