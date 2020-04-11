@extends('template')
@section('title','Riwayat Lembur Pegawai')
@section('content')

    @include('validation')

    @include('alert')

    @include('pegawai.tab')

    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <td><img src="{{ asset('uploads/'.$pegawai->foto)}}" width="200"></td>
                </tr>
                <tr>
                    <td>{{ $pegawai->nama_pegawai}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-9">

            @include('pegawai.filter')
                       
            <table class="table table-bordered">
                <tr>
                    
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Pulang</th>
                    <th>Durasi Lembur</th>
                    <th>Hapus</th>
                </tr>
                @foreach($riwayatKehadiran as $row)
                <tr>
                    <td>{{ $row->tanggal_masuk}} </td>
                    <td>{{ $row->tanggal_pulang}} </td>
                    <td>{{ $row->durasi_lembur}} </td>
                    <td>
                        {{ Form::open(['url'=>'hapus-riwayat-lembur/'.$row->id.'/pegawai','method'=>'delete'])}}
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        {{ Form::close()}}
                    </td>
                </tr>
                @endforeach
            </table>

            {{  $riwayatKehadiran->links()}}
        </div>
    </div>

@endsection