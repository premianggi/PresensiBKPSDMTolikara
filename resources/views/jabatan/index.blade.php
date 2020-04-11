@extends('template')
@section('title','Data Jabatan')
@section('content')

@include('alert')
<a href="jabatan/create" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i>Tambah Data</a>
<!-- {{ link_to('jabatan/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Kode Jabatan</th>
                <th>Jabatan</th>
                <th>Tunjangan Jabatan</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($jabatan as $row)
            <tr>
                <td>{{$row->kode_jabatan}}</td>
                <td>{{$row->nama_jabatan}}</td>
                <td>@format_uang($row->tunjangan_jabatan)</td>
                <td width="50"><a href="/jabatan/{{$row->kode_jabatan}}/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a></td>
                <td width="50">
                     <a href="/jabatan/{{$row->kode_jabatan}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Hapus</a>
                
                    <!-- {{Form::open(['url'=>'jabatan/'.$row->kode_jabatan,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</button>
                    {{Form::close()}} -->
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Kode Jabatan</th>
                <th>Jabatan</th>
                <th>Tunjangan Jabatan</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection