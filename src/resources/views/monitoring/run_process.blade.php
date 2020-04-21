@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Run Process</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">PID</th>
                            <th scope="col">User</th>
                            <th scope="col">Time</th>
                            <th scope="col" colspan="2">Command</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($processList as $key => $process)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$process['pId']}}</td>
                                <td>{{$process['User']}}</td>
                                <td>{{$process['Time']}}</td>
                                <td colspan="2">{{$process['Command']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
