@extends('template')
@section('title','Edit Data Golongan')
@section('content')

@include('validation')

{{Form::model($golongan,['url'=>'golongan/'.$golongan->kode_golongan,'method'=>'PUT'])}}

@include('golongan.form')

{{Form::close()}}
@endsection