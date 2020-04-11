<table class="table table-bordered">
    <tr>
        <th width="200">Nama Pola Kerja</th>
        <td>{{ Form::text('pola_kerja',null,['class'=>'form-control','placeholder'=>'Pola Kerja Pegawai'])}}</td>
    </tr>
    <tr>
        <th width="200">Jam Masuk & Pulang</th>
        <td>
        <div class="row">
            <div class="col-md-3">
                {{ Form::text('jam_masuk',null,['class'=>'form-control','placeholder'=>'Contoh:08:00'])}}
            </div>
            <div class="col-md-3">
                {{ Form::text('jam_pulang',null,['class'=>'form-control','placeholder'=>'Contoh:15:00'])}}
            </div>
        </div>
        </td>
    </tr>
    <tr>
        <th></th>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/polakerja" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>