<html>
    <head></head>
    <style type="text/css">
    body
    {
        font-family: 'Open Sans';
        
    }
    </style>
    <body>
        <table>
            <tr>
                <td width="190">
                    {{ $pengaturan->nama_kantor }}
                    <br> {{ $pengaturan->alamat_kantor}}
                    <br>Telpon : {{ $pengaturan->no_telpon }}
                </td>
                <td width="170">
                    <h3>SLIP GAJI PEGAWAI</h3>
                </td>
                <td>
                    Tanggal : 01 - 04 - 2019<br>
                    No Referensi      : -
                    <br>
                    Kode Karyawan : Premi Yigibalom
                </td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td>Nama</td>
                <td width="200"> : {{ $pegawai->nama_pegawai}}</td>
                <td>Alamat</td>
                <td> :-</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td> : {{ $pegawai->nama_jabatan}}</td>
                <td>Telpon</td>
                <td> : +628969993552</td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <th width="40">Nomor</th>
                <th width="400">Keterangan</th>
                <th width="100">Jumlah</th>
            </tr>
            <tr>
                    <td>1</td>
                    <td>Gaji Pokok</td>
                    <td>{{ $pegawai->gaji_pokok }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tunjangan Jabatan</td>
                    <td>{{ $pegawai->tunjangan_jabatan }}</td>
                </tr>
                <?php
                 $upahLembur = $hitungLembur[0]->durasi_lembur*20000;
                ?>
                <tr>
                        <td>3</td>
                        <td>Upah Lembur</td>
                    <td>{{ $upahLembur}}</td>
                       </tr>  

                <?php
                $pendapatan_tambahan = 0;
                $no=4;
                ?>
                @if(isset($gajiDetail))
                    @foreach($gajiDetail as $gd)
                        <tr>
                        <td>{{ $no++ }}</td>
                            <td>{{ $gd->nama_komponen }}</td>
                            <td>{{ $gd->nilai}}</td>
                        </tr>
                        <?php
                        if($gd->jenis=='tunjangan')
                        {
                            $pendapatan_tambahan = $pendapatan_tambahan + $gd->nilai;
                        }                        
                        else
                        {
                            $pendapatan_tambahan = $pendapatan_tambahan - $gd->nilai;
                        } 
                        ?>
                    @endforeach
                @endif

                <?php
               
                $total = $pegawai->gaji_pokok + $pegawai->tunjangan_jabatan + $pendapatan_tambahan;
                ?>
              
            <tr>
                <td></td>
                <td>Total Pendapatan</td>
                <td>{{ $total}}</td>
            </tr>
        </table>
        <hr>
    </body>
</html>