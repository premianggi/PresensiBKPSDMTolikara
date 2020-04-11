@extends('template')
@section('title','Pola Kerja Kelompok Pegawai')
@section('content')

    @include('validation')

    @include('alert')

   

    <div class="row">
        <div class="col-md-5">
            {{ Form::open(['url'=>'simpan-pola-kerja-kelompok-pegawai'])}}
            {{ Form::hidden('kelompok_kerja_id',$kelompokKerja->id)}}
            <table class="table table-bordered">
                <tr>
                    <td>Nama Kelompok</td>
                <td>  : {{ $kelompokKerja->kelompok_kerja}}</td>
                </tr>

                <tr>
                    <td>Dari Tanggal</td>
                    <td>{{ Form::date('dari_tanggal',null,['class'=>'form-control','placeholder'=>'Dari tanggal'])}}</td>
                </tr>
                <tr>
                    <td>Sampai Tanggal</td>
                    <td>{{ Form::date('sampai_tanggal',null,['class'=>'form-control','placeholder'=>'Sampai tanggal'])}}</td>
                </tr>
                <tr>
                        <td>Pola Kerja</td>
                        <td>{{ Form::select('pola_kerja',$polaKerja,null,['class'=>'form-control'])}}</td>
                </tr>
                <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan</button>
                            <a href="/kelompokkerja" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
                            </td>
                        </tr>
            </table>
            {{ Form::close()}}
        </div>
        <div class="col-md-7">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal</th>
                    <th>Pola Kerja</th>
                    <th>Masuk</th>
                    <th>Pulang</th>
                    <th>Delete</th>
                </tr>
                @foreach($polakerjaKelompok as $row)
                <tr>
                    <td>{{ date('l', strtotime($row->tanggal)) }},  {{ date_format(date_create($row->tanggal),"d-m-Y")  }}</td>
                    <td>{{ $row->pola_kerja }}</td>
                    <td>{{ $row->jam_masuk }}</td>
                    <td>{{ $row->jam_pulang }}</td>
                    <td>
                        {{ Form::open(['url'=>'hapus-pola-kerja-kelompok-pegawai/'.$row->id,'method'=>'delete'])}}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>Hapus</button>
                        {{ Form::close()}}
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $polakerjaKelompok->links()}}
        </div>
    </div>
@endsection