@extends('template')
@section('title','Tambah Data Pola Kerja')
@section('content')

 @include('validation')

{{Form::open(['url'=>'polakerja'])}}
    @include('polaKerja.form')
{{Form::close()}}
@endsection