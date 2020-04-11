@extends('template')
@section('title','Data Kalender Kerja')
@section('content')

@include('alert')
<a href="kalenderKerja/create" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o"></i>Tambah Data</a>
<!-- {{ link_to('kalenderKerja/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kalenderKerja as $row)
            <tr>
                <td>{{$row->tanggal}}</td>
                <td>{{$row->keterangan}}</td>
                <td width="50"><a href="/kalenderKerja/{{$row->id}}/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Ubah</a></td>
                <td width="50">
                    {{Form::open(['url'=>'kalenderKerja/'.$row->id,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin mau dihapus ?')"></i>Hapus</button>
                    {{Form::close()}}
                </td>
            </tr>
            @endforeach
        </tbody>
       
        <tfoot>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection