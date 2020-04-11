@extends('template')
@section('title','Riwayat Lembur')
@section('content')

    <div class="row">
      <div class="col-md-5">
        {{ Form::open(['url'=>'ubah-periode-lembur'])}}
        <table class="table table-bordered">
          <tr>
            <td>Filter Laporan</td>
            <td>
              {{ Form::date('periode_lembur',null,['class'=>'form-control'])}}
            </td>
          </tr>
          <tr>
            <td></td>
            <td>
              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-spinner" aria-hidden="true"></i>
                 Filter Laporan</button>
              <a href="lembur/create" class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Input Manual</a>
            </td>
          </tr>
        </table>
        {{ Form::close()}}
      </div>
      <div class="col-md-6">

      </div>
    </div>
    
    
    <hr>
    @include ('alert')

    <table class="table table-bordered" id="example1">
            <thead>
        <tr>
            <th width="100">NIP</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Pulang</th>
            <th>Durasi Lembur</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($riwayatLembur as $row)
        <tr>
            <td>{{ $row->nip}}</td>
            <td>{{ $row->nama_pegawai }}</td>
            <td>{{ $row->tanggal_masuk }}</td>
            <td>{{ $row->tanggal_pulang }}</td>
            <td>{{ $row->durasi_lembur }}</td>
            <td>
                {{ Form::open(['url'=>'hapus-riwayat-lembur/'.$row->id.'/lembur','method'=>'delete'])}}
                <button type="submit" class="btn btn-danger btn-sm" class="fa fa-trash">Hapus</button>
                {{ Form::close()}}
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection