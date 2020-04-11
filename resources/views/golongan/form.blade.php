<table class="table table-bordered">
    <tr>
        <td width="200">Kode Golongan</td>
        <td>
            @if(isset($golongan))
                {{ Form::text('kode_golongan',null,['class'=>'form-control','placeholder'=>'Kode Golongan','readOnly'=>''])}}
            @else
                {{ Form::text('kode_golongan',null,['class'=>'form-control','placeholder'=>'Kode Golongan'])}} 
            @endif
        </td>
    </tr>
    <tr>
        <td>Nama Golongan</td>
        <td>{{ Form::text('nama_golongan',null,['class'=>'form-control','placeholder'=>'Nama Golongan'])}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/golongan" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>