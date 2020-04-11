<table class="table table-bordered">
    <tr>
        <th width="200">Kode Pangkat</th>
        <td>
        @if(isset($pangkat))
            {{ Form::text('kode_pangkat',null,['class'=>'form-control','placeholder'=>'Kode Pangkat','readOnly'=>''])}}
        @else
            {{ Form::text('kode_pangkat',null,['class'=>'form-control','placeholder'=>'Kode Pangkat'])}} 
        @endif
        </td>
    </tr>
    <tr>
        <th>Nama Pangkat</th>
        <td>{{ Form::text('nama_pangkat',null,['class'=>'form-control','placeholder'=>'Nama Pangkat'])}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/pangkat" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>