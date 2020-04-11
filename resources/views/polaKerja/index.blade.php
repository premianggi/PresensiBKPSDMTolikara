@extends('template')
@section('title','Data Pola Kerja')
@section('content')

@include('alert')
<a href="polakerja/create" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o"></i>Tambah Data</a>
<!-- {{ link_to('polaKerja/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Pola Kerja</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($polaKerja as $row)
            <tr>
                <td>{{$row->pola_kerja}}</td>
                <td>{{$row->jam_masuk}}</td>
                <td>{{$row->jam_pulang}}</td>
                <td width="50"><a href="/polakerja/{{$row->id}}/edit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a></td>
                <td width="50">
                    <a href="/polakerja/{{$row->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Hapus</a>
                    {{-- {{Form::open(['url'=>'polakerja/'.$row->id,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="detele"><i class="fa fa-trash" onclick="return confirm('Yakin mau dihapus ?')"></i>Hapus</button>
                    {{Form::close()}} --}}
                </td>
            </tr>
        @endforeach
        </tbody>
   </table>
</div>
@endsection