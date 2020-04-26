
@extends('user.directory_modal')

@section('form')
    @csrf
    <input name="directory_name" class="form-control" required id="file_name" aria-describedby="emailHelp" placeholder="File Name">
@endsection