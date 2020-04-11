<table>
    <thead>
    <tr>
        <th>NIK</th>
        <th>Nama Karyawan</th>
        <th>Pola Kerja</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
        <th>Absen Masuk</th>
        <th>Absen Pulang</th>
    </tr>
    </thead>
    <tbody>
    @foreach($riwayatKehadiran as $row)
        <tr>
            <td>{{ $row->nip }}</td>
            <td>{{ $row->nama_pegawai }}</td>
            <td>{{ $row->pola_kerja }}</td>
            <td>{{ $row->jam_masuk }}</td>
            <td>{{ $row->jam_pulang }}</td>
            <td>{{ $row->tanggal_masuk }}</td>
            <td>{{ $row->tanggal_pulang }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
