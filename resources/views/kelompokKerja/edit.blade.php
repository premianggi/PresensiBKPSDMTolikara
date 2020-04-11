@extends('template')
@section('title','Edit Data Kelompok Kerja')
@section('content')

@include('validation')

{{Form::model($kelompokKerja,['url'=>'kelompokkerja/'.$kelompokKerja->id,'method'=>'PUT'])}}

    @include('kelompokKerja.form')

{{Form::close()}}
@endsection