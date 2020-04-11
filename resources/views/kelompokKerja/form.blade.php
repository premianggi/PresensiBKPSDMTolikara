<table class="table table-bordered">
    <tr>
        <th width="200">Kelompok Kerja</th>
        <td>{{ Form::text('kelompok_kerja',null,['class'=>'form-control','placeholder'=>'Kelompok Kerja'])}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/kelompokkerja" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>