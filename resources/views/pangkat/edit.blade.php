@extends('template')
@section('title','Edit Data Pangkat')
@section('content')

@include('validation')

{{Form::model($pangkat,['url'=>'pangkat/'.$pangkat->kode_pangkat,'method'=>'PUT'])}}

@include('pangkat.form')

{{Form::close()}}
@endsection