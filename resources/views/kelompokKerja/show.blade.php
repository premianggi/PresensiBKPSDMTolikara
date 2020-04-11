@extends('template')
@section('title','Anggota Kelompok Kerja')
@section('content')

    @include('validation')
    @include('alert')

    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <td>Nama Kelompok Kerja</td>
                    <td> : {{ $kelompokKerja->kelompok_kerja}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="/kelompokkerja" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            {{ Form::open(['url'=>'tambah-kelompok-kerja'])}}
            {{ Form::hidden('id',$kelompokKerja->id)}}
                <table class="table table-bordered">
                    <tr>
                            <td>{{ Form::text('nama_pegawai',null,['list'=>'pegawai','class'=>'form-control','placeholder'=>'Cari Nama Pegawai'])}}</td>
                        <td><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>Tambah Anggota</button></td>
                    </tr>
                </table>
            {{ Form::close()}}
            <table class="table table-bordered"  id="example1">
                <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Karyawan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($anggota as $row)
                <tr>
                    <td>{{ $row->nip}}</td>
                    <td>{{ $row->nama_pegawai}}</td>
                    <td width="50">
                        {{ Form::open(['url'=>'hapus-anggota-kelompok-kerja/'.$row->id,'method'=>'delete'])}}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i>Hapus</button>
                        {{ Form::close()}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <datalist id="pegawai">
        @foreach($pegawai as $k)
            <option value="{{ $k->nama_pegawai}}">
        @endforeach
    </datalist>
@endsection
