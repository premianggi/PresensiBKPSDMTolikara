<table class="table table-bordered">
    <tr>
        <td width="200">Kode Jabatan</td>
        <td>
        @if(isset($jabatan))
            {{ Form::text('kode_jabatan',null,['class'=>'form-control','placeholder'=>'Kode Jabatan','readOnly'=>''])}}
        @else
            {{ Form::text('kode_jabatan',null,['class'=>'form-control','placeholder'=>'Kode Jabatan'])}} 
        @endif
        </td>
    </tr>
    <tr>
        <td>Nama Jabatan</td>
        <td>{{ Form::text('nama_jabatan',null,['class'=>'form-control','placeholder'=>'Nama Jabatan'])}}</td>
    </tr>
    <tr>
        <td>Tunjangan Jabatan</td>
        <td>{{ Form::text('tunjangan_jabatan',null,['class'=>'form-control','placeholder'=>'Tunjangan Jabatan'])}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/jabatan" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>