@extends('template')
@section('title','Pengaturan')
@section('content')

    @include('validation')

    {{Form::model($pengaturan,['url'=>'pengaturan','files'=>true])}}
    
    @include('alert')

    <div class="row">
        <div class="col-md-8">
        <table class="table table-bordered">
    <tr>
        <th width="200">Nama Kantor</th>
        <td>{{ Form::text('nama_kantor',null,['class'=>'form-control','placeholder'=>'Nama Kantor'])}}</td>
    </tr>
    <tr>
        <th>Alamat Kantor</th>
        <td>{{ Form::text('alamat_kantor',null,['class'=>'form-control','placeholder'=>'Alamat Kantor'])}}</td>
    </tr>
    <tr>
        <th>Email & Telepon</th>
        <td>
        <div class="row">
        <div class="col-md-5">
            {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email Kantor'])}}
        </div>
        <div class="col-md-5">
            {{ Form::text('no_telpon',null,['class'=>'form-control','placeholder'=>'No Telepon'])}}
        </div>
        </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
        </td>
    </tr>
</table>
</div>
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    {{--  <td><img src="{{ asset('uploads/'.$pegawai->foto)}}" width="220"></td>  --}}
                    <td><img src="{{asset('uploads/'.$pengaturan->logo)}}" width="200"></td>
                </tr>
                <tr>
                    <td>
                        Ganti Logo : {{Form::file('logo')}}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{Form::close()}}
@endsection