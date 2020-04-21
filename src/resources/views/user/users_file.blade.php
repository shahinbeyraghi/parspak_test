@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="card">
                <div class="card-header">
                    Users File
                    <a class="btn btn-outline-primary float-right" href="{{route('user-file')}}" role="button">Create File</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($filesList as $key => $file)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$file}}</td>
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
