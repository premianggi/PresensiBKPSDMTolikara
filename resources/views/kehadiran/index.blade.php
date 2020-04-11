@extends('template')
@section('title','Riwayat Kehadiran')
@section('content')

@include('alert')

<div class="row">
    <div class="col-md-7">
    {{Form::open(['url'=>'ubah-periode-kehadiran'])}}
        <table class="table table-bordered">
            <tr>
                <td>Filter Laporan</td>
                <td>
                    {{Form::date('periode_kehadiran',null,['class'=>'form-control'])}}
                </td>
            </tr>
            <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-filter -square-o"></i>Filter Laporan</button>
                <a href="kehadiran/create" class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o"></i>Input Manual</a>
                   <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Cetak Data</button>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#import">Import</button>
            </td>
        </tr>
        </table>
        {{Form::close()}}
    </div>
    <div class="col-md-6">

    </div>
</div>
<!-- {{ link_to('jabatan/create','Tambah Data',['class'=>'btn btn-danger btn-sm'])}} -->
<hr>
<div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Pegawai</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Pangkat</th>
                <th>Waktu Masuk</th>
                <th>Waktu Pulang</th>
                <th>Status</th>
                <!-- <th></th>
                <th></th> -->
            </tr>
        </thead>
        <tbody>
        @foreach ($kehadiran as $row)
            <tr>
                <td>{{$row->nip}}</td>
                <td>{{$row->nama_pegawai}}</td>
                <td>{{$row->nama_jabatan}}</td>
                <td>{{$row->nama_golongan}}</td>
                <td>{{$row->nama_pangkat}}</td>
                <td>{{$row->tanggal_masuk}}</td>
                <td>{{$row->tanggal_pulang}}</td>
                <td>{{$row->status_kehadiran}}</td>
                <!-- <td width="50"><a href="/jabatan/{{$row->kode_jabatan}}/edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a></td>
                <td width="50">
                    {{Form::open(['url'=>'jabatan/'.$row->kode_jabatan,'method'=>'delete'])}}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</button>
                    {{Form::close()}}
                </td> -->
            </tr>
        @endforeach
        </tbody> 
   </table>
   
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mencetak laporan Kehadiran</h4>
      </div>
      <div class="modal-body">
        {{ Form::open(['url'=>'export-laporan-kehadiran-excel'])}}
        <table class="table table-bordered">
          <tr>
            <td>Dari Tanggal</td>
          <td>{{  Form::date('tanggal_mulai',null,['class'=>'form-control','placeholder'=>'Dari Mulai'])}}</td>
          </tr>
          <tr>
            <td>Sampai Tanggal</td>
            <td>{{  Form::date('tanggal_selesai',null,['class'=>'form-control','placeholder'=>'Tanggal Selesai'])}}</td>
          </tr>
          <tr>
            <td></td>
            <td>
              <button type="submit" class="btn btn-info btn-sm">Cetak Data</button>
            </td>
          </tr>
        </table>
        {{ Form::close()}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<div id="import" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Data Kehadiran</h4>
        </div>
        <div class="modal-body">
          {{ Form::open(['url'=>'upload-excel-kehadiran','files'=>true])}}
          <table class="table table-bordered">
            <tr><td>Pilih File</td><td>{{ Form::file('file')}}</td></tr>
            <tr><td></td><td><button type="submit">Upload File Excel</button></td></tr>
          </table>
          {{ Form::close()}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection