<table class="table table-bordered">
        <tr>
            <th width="200">Kode Komponen</th>
            <td>
                @if(isset($komponenGaji))
                    {{ Form::text('kode_komponen',null,['class'=>'form-control','placeholder'=>'Kode Komponen','readOnly'=>''])}}
                @else
                    {{ Form::text('kode_komponen',null,['class'=>'form-control','placeholder'=>'Kode Komponen Gaji'])}} 
                @endif
            </td>
        </tr>
        <tr>
            <th>Nama Komponen</th>
            <td>{{ Form::text('nama_komponen',null,['class'=>'form-control','placeholder'=>'Nama Komponen'])}}</td>
        </tr>
        <tr>
                <th>Jenis</th>
                <td>{{ Form::select('jenis',['tunjangan'=>'tunjangan','potongan'=>'potongan'],null,['class'=>'form-control'])}}</td>
            </tr>
            <tr>
                <th>Nilai</th>
                <td>{{ Form::text('nilai',null,['class'=>'form-control','placeholder'=>'Nilai'])}}</td>
            </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                     Simpan Data</button>
                <a href="/komponengaji" class="btn btn-info"><i class="fa fa-sign-out" aria-hidden="true"></i>
                     Kembali</a>
            </td>
        </tr>
    </table>