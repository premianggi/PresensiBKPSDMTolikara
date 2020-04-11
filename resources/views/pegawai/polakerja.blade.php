@extends('template')
@section('title','Pola Kerja Pegawai')
@section('content')

    @include('validation')

    @include('alert')

    @include('pegawai.tab')

    <div class="row">
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <td><img src="{{ asset('uploads/'.$pegawai->foto)}}" width="220"></td>
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
                    <th>Tanggal</th>
                    <th>Pola Kerja</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                </tr>
                @foreach($polaKerjaPegawai as $row)
                <tr>
                    <td>{{ date('l', strtotime($row->tanggal)) }},  {{ date_format(date_create($row->tanggal),"d-m-Y")  }} </td>
                    <td>{{ $row->pola_kerja}} </td>
                    <td>{{ $row->jam_masuk}} </td>
                    <td>{{ $row->jam_pulang}} </td>
                </tr>
                @endforeach
            </table>

            {{  $polaKerjaPegawai->links()}}
        </div>
    </div>

@endsection