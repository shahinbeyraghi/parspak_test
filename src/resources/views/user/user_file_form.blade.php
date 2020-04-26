
@extends('user.modal')

@section('form')
    @csrf
    <input name="file_name" class="form-control" required id="file_name" aria-describedby="emailHelp" placeholder="File Name">
@endsection