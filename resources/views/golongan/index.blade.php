@extends('template')
@section('title','Data Golongan')
@section('content')

@include('alert')

<!-- {{ link_to('golongan/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<a href="golongan/create" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i>Tambah Data</a>
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Kode Golongan</th>
                <th>Golongan</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($golongan as $row)
            <tr>
                <td>{{$row->kode_golongan}}</td>
                <td>{{$row->nama_golongan}}</td>
                <td width="50"><a href="/golongan/{{$row->kode_golongan}}/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a></td>
                <td width="50">
                 <a href="/golongan/{{$row->kode_golongan}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Hapus</a>
                    <!-- {{Form::open(['url'=>'golongan/'.$row->kode_golongan,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin mau dihapus ?')"></i>Hapus</button>
                    {{Form::close()}} -->
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Kode golongan</th>
                <th>golongan</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection