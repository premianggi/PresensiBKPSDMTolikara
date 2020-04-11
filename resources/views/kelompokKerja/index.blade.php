@extends('template')
@section('title','Data kelompokKerja')
@section('content')

@include('alert')
<a href="kelompokkerja/create" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o"></i>Tambah Data</a>
<!-- {{ link_to('kelompokKerja/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Kelompok Kerja</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kelompokKerja as $row)
            <tr>
                <td>{{$row->kelompok_kerja}}</td>
                <td width="50"><a href="/kelompokkerja/{{ $row->id}}/polakerja" class="btn btn-success btn-sm"><i class="fa fa-calendar" aria-hidden="true"></i>Pola Kerja</a></td>
                <td width="50"><a href="/kelompokkerja/{{ $row->id}}" class="btn btn-success btn-sm"><i class="fa fa-users" aria-hidden="true"></i>
                Anggota</a></td>
                <td width="50"><a href="/kelompokkerja/{{$row->id}}/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a></td>
                <td width="50">
                    {{Form::open(['url'=>'kelompokkerja/'.$row->id,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin mau dihapus ?')"></i>Hapus</button>
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Kelompok Kerja</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection