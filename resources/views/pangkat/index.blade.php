@extends('template')
@section('title','Data Pangkat')
@section('content')

@include('alert')

<!-- {{ link_to('pangkat/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<a href="pangkat/create" class="btn btn-success btn-sm"><i class="fa fa-plus-square"></i>Tambah Data</a>
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Kode Pangkat</th>
                <th>Pangkat</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pangkat as $row)
            <tr>
                <td>{{$row->kode_pangkat}}</td>
                <td>{{$row->nama_pangkat}}</td>
                <td width="50"><a href="/pangkat/{{$row->kode_pangkat}}/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a></td>
                <td width="50">
                    <a href="/pangkat/{{$row->kode_pangkat}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Hapus</a>
                    <!-- {{Form::open(['url'=>'pangkat/'.$row->kode_pangkat,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="detele"><i class="fa fa-trash" onclick="return confirm('Yakin mau dihapus ?')"></i>Hapus</button>
                    {{Form::close()}} -->
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Kode pangkat</th>
                <th>pangkat</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
   </table>
</div>
@endsection