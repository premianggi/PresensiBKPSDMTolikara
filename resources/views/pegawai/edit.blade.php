@extends('template')
@section('title','Edit Data Pegawai')
@section('content')

@include('validation')

@include('pegawai.tab')

{{Form::model($pegawai,['url'=>'pegawai/'.$pegawai->nip,'method'=>'PUT','files'=>true])}}

    @include('pegawai.form')

{{Form::close()}}
@endsection