@extends('template')
@section('title','Tambah Data Kalender Kerja')
@section('content')

 @include('validation')

{{Form::open(['url'=>'kalenderKerja'])}}
    @include('kalenderKerja.form')
{{Form::close()}}
@endsection