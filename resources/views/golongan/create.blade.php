@extends('template')
@section('title','Tambah Data Golongan')
@section('content')

@include('validation')

{{Form::open(['url'=>'golongan'])}}
    @include('golongan.form')
{{Form::close()}}
@endsection