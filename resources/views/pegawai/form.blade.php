<table class="table table-bordered">
    <tr>
        <th width="200">No Induk Pegawai</th>
        <td>
        @if(isset($pegawai))
            {{ Form::text('nip',null,['class'=>'form-control','placeholder'=>'No Induk Pegawai','readOnly'=>''])}}
        @else
            {{ Form::text('nip',null,['class'=>'form-control','placeholder'=>'No Induk Pegawai'])}} 
        @endif
        </td>
    </tr>
    <tr>
        <th>Nama Pegawai</th>
        <td>{{ Form::text('nama_pegawai',null,['class'=>'form-control','placeholder'=>'Nama Pegawai'])}}</td>
    </tr>
    <tr>
        <th>Tanggal Lahir</th>
        <td><div class="row">
        <div class="col-md-3">
        {{ Form::date('tanggal_lahir',null,['class'=>'form-control','placeholder'=>'Tanggal Lahir'])}}
        </div>
        </div></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{ Form::textarea('alamat',null,['class'=>'form-control','placeholder'=>'Alamat Lengkap','rows'=>3])}}</td>
    </tr>
    <tr>
        <th>Status Kawin</th>
        <td>{{ Form::select('kode_status_kawin',$status_kawin,null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
        <th>Jenis Kelamin</th>
        <td>{{ Form::select('jenis_kelamin',['L'=>'Pria','W'=>'Wanita'],null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td>{{ Form::select('kode_jabatan',$jabatan,null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
        <th>Golongan</th>
        <td>{{ Form::select('kode_golongan',$golongan,null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
        <th>Pangkat</th>
        <td>{{ Form::select('kode_pangkat',$pangkat,null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
        <th>Tanggal Masuk</th>
        <td>
            <div class="row">
                <div class="col-md-3">
                    {{ Form::date('tanggal_masuk',null,['class'=>'form-control','placeholder'=>'Tanggal Masuk'])}}
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <th>Gaji Pokok</th>
        <td>{{ Form::text('gaji_pokok',null,['class'=>'form-control','placeholder'=>'Gaji Pokok']) }}</td>
    </tr>
    <tr>
        <th>Upload Foto</th>
        <td>
            {{Form::file('foto')}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/pegawai" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>

{{--  <script type="text/javascript">
		
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>  --}}