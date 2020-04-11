@extends('template')
@section('title','Laporan Gaji Pegawai')
@section('content')

    @include('validation')

    @include('alert')

    <div class="row">
        <div class="col-md-4">
            <h4>Filter Laporan</h4>
            {{ Form::open(['url'=>'ubah-periode-gaji'])}}
            <table class="table table-bordered">
                <tr>
                    <td width="150">Periode Laporan</td>
                    <td>
                        {{ Form::select('periode',$periodeGaji,null,['class'=>'form-control'])}}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-danger"><i class="fa fa-refresh fa-sm"></i>Refresh</button></td>
                </tr>
            </table>
            {{ Form::close()}}
            
            <h4>Input Periode Gaji</h4>
            <hr>
            {{ Form::open(['url'=>'gaji'])}}
            <table class="table table-bordered">
                    <tr>
                        <td width="150">Periode Gaji</td>
                    <td>{{ Form::text('periode',null,['class'=>'form-control','placeholder'=>'Ex : 201904'])}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>Buat</button></td>
                    </tr>
                </table>
            {{ Form::close()}}
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Periode Gaji</th>
                    <th>Detail</th>
                    <th>Cetak</th>
                </tr>
                @foreach($riwayatGaji as $row)
                <tr>
                    <td>{{ $row->nip}}</td>
                    <td>{{ $row->nama_pegawai}}</td>
                    <td>{{ $row->periode}}</td>
                    <td><a href="/gaji/{{ $row->id }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail</a></td>
                    <td><a href="/gaji/{{ $row->id}}/pdf" class="btn btn-default btn-sm"><i class="fa fa-print"></i>Cetak</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection