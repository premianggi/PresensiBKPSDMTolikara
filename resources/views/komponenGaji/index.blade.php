@extends('template')
@section('title','Data Komponen Gaji')
@section('content')

    @include ('alert')
    
    <a href="komponengaji/create" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Tambah Data</a>
    <hr>
    <table class="table table-bordered" id="example1">
            <thead>
        <tr>
            <th width="200">Kode Komponen</th>
            <th>Nama Komponen Gaji</th>
            <th>Jenis</th>
            <th>Nilai</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($komponenGaji as $row)
        <tr>
            <td>{{ $row->kode_komponen}}</td>
            <td>{{ $row->nama_komponen }}</td>
            <td>{{ $row->jenis }}</td>
            <td>@format_uang($row->nilai)</td>
            <td width="50"><a href="/komponengaji/{{ $row->kode_komponen}}/edit" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a></td>
            <td width="50">
                {{ Form::open(['url'=>'komponengaji/'.$row->kode_komponen,'method'=>'delete'])}}
                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i>Hapus</button>
                {{ Form::close()}}
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection