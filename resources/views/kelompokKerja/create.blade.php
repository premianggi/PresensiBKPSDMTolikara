@extends('template')
@section('title','Tambah Data Kelompok Kerja')
@section('content')

 @include('validation')

{{Form::open(['url'=>'kelompokkerja'])}}
    @include('kelompokkerja.form')
{{Form::close()}}
@endsection