@extends('template')
@section('title','Data Pegawai')
@section('content')

@include('alert')
<a href="pegawai/create" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i>Tambah Data</a>
<!-- {{ link_to('pegawai/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Pangkat</th>
                <th>Tanggal Masuk</th>
                <!-- <th></th>
                <th></th> -->
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pegawai as $row)
            <tr>
                <td>{{$row->nip}}</td>
                <td>{{$row->nama_pegawai}}</td>
                <td>{{$row->nama_jabatan}}</td>
                <td>{{$row->nama_golongan}}</td>
                <td>{{$row->nama_pangkat}}</td>
                <td>{{$row->tanggal_masuk}}</td>
                <!-- <td width="20"><a href="/pegawai/{{$row->nip}}/kehadiran" class="btn btn-info btn-sm"></i>Kehadiran</a></td>
                <td width="20"><a href="/pegawai/{{$row->nip}}/polakerja" class="btn btn-info btn-sm"></i>Pola Kerja</a></td> -->
                <td width="20"><a href="/pegawai/{{$row->nip}}/edit" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Detail</a></td>
                <td width="20">
                    {{Form::open(['url'=>'pegawai/'.$row->nip,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</button>
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No Induk Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Pangkat</th>
                <th>Tanggal Masuk</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection