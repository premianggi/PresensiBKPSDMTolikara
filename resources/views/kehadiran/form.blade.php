<table class="table table-bordered">
    <tr>
        <th width="200">Nama Pegawai</th>
        <td>{{ Form::text('nama_pegawai',null,['list'=>'pegawai','class'=>'form-control','placeholder'=>'Nama Pegawai'])}}</td>
    </tr>
    <tr>
        <th>Tanggal Masuk</th>
        <td>
        <div class="row">
            <div class="col-md-3">
                {{ Form::date('tanggal_masuk',null,['class'=>'form-control'])}}
            </div>
            <div class="col-md-3">
                {{Form::text('jam_masuk',null,['class'=>'form-control','placeholder'=>'Ex : 08:00'])}}
            </div>
        </div>
        </td>
    </tr>
    <tr>
        <th>Tanggal Pulang</th>
        <td>
        <div class="row">
            <div class="col-md-3">
                {{ Form::date('tanggal_pulang',null,['class'=>'form-control'])}}
            </div>
            <div class="col-md-3">
                {{Form::text('jam_pulang',null,['class'=>'form-control','placeholder'=>'Ex : 08:00'])}}
            </div>
        </div>
        </td>
    </tr>
    <tr>
        <td>Status Kehadiran</td>
        <td>{{ Form::select('kode_status_kehadiran',$statusKehadiran,null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>Simpan Data</button>
            <a href="/kehadiran" class="btn btn-info btn-sm"><i class="fa fa-sign-out" aria-hidden="true"></i>Kembali</a>
        </td>
    </tr>
</table>

<datalist id="pegawai">
    @foreach($pegawai as $p)
        <option value="{{$p->nama_pegawai}}">
    @endforeach
</datalist>