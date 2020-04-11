@extends('template')
@section('title','Tambah Data Kehadiran')
@section('content')

 @include('validation')

{{Form::open(['url'=>'kehadiran'])}}
    @include('kehadiran.form')
{{Form::close()}}
@endsection