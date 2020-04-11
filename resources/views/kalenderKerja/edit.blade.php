@extends('template')
@section('title','Edit Data kalenderKerja')
@section('content')

@include('validation')

{{Form::model($kalenderKerja,['url'=>'kalenderKerja/'.$kalenderKerja->id,'method'=>'PUT'])}}

    @include('kalenderKerja.form')

{{Form::close()}}
@endsection