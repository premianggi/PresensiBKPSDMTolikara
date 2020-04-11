<table class="table table-bordered">
        <tr>
            <td width="200">Nama Pegawai</td>
            <td>{{ Form::text('nama_pegawai',null,['list'=>'pegawai','class'=>'form-control','placeholder'=>'Cari Nama Pegawai'])}}</td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <td>
                <div class="row">
                    <div class="col-md-3">
                            {{ Form::date('tanggal_masuk',null,['class'=>'form-control','placeholder'=>'Tanggal M'])}}
                    </div>
                    <div class="col-md-2">
                        {{ Form::text('jam_masuk',null,['class'=>'form-control','placeholder'=>'Ex : 08:00'])}}
                    </div>
                </div>
               </td>
        </tr>
        <tr>
                <td>Tanggal Pulang</td>
                <td>
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::date('tanggal_pulang',null,['class'=>'form-control','placeholder'=>'Tanggal M'])}}
                        </div>
                        <div class="col-md-2">
                            {{ Form::text('jam_pulang',null,['class'=>'form-control','placeholder'=>'Ex : 08:00'])}}
                        </div>
                    </div>
                </td>
            </tr>
        <tr>
        <tr>
                <td>Durasi Lembur</td>
                <td>{{ Form::text('durasi_lembur',null,['class'=>'form-control','placeholder'=>'Dursi Lembur'])}}</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                     Simpan Data</button>
                <a href="/lembur" class="btn btn-info"><i class="fa fa-sign-out" aria-hidden="true"></i>
                     Kembali</a>
            </td>
        </tr>
    </table>

    <datalist id="pegawai">
        @foreach($pegawai as $p)
            <option value="{{ $p->nama_pegawai}}">
        @endforeach
    </datalist>