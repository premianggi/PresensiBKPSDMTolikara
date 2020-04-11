@extends('template')
@section('title','Tambah Data Pangkat')
@section('content')

 @include('validation')

{{Form::open(['url'=>'pangkat'])}}
    @include('pangkat.form')
{{Form::close()}}
@endsection