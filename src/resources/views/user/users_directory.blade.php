@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if($errors->first('directory_name'))
                <p class="alert alert-danger">{{ $errors->first('directory_name') }}</p>
            @endif
            <div class="card">
                <div class="card-header">
                    Users Directory
                    <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
                        Create Directory
                    </button>
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
                        @foreach($directoriesList as $key => $directory)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$directory}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.user_directory_form')
@endsection
