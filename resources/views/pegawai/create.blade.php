@extends('template')
@section('title','Tambah Data Pegawai')
@section('content')

 @include('validation')

{{Form::open(['url'=>'pegawai','files'=>true])}}
    @include('pegawai.form')
{{Form::close()}}
@endsection