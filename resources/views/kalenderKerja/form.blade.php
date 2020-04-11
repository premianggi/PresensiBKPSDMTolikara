<table class="table table-bordered">
    <tr>
        <td width="200">Tanggal</td>
        <td>{{ Form::date('tanggal',null,['class'=>'form-control','placeholder'=>'Kode kalenderKerja'])}}</td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>{{ Form::textarea('keterangan',null,['class'=>'form-control','placeholder'=>'Nama kalenderKerja','rows'=>3])}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/kalenderKerja" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>