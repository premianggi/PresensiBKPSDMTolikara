<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
use App\Pegawai;
use App\StatusKehadiran;
use Redirect;

use App\Exports\KehadiranExport;
use App\Imports\KehadiranImport;
use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\KehadiranImport;

class KehadiranController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    function index()
    {
        if(session('periode_kehadiran')==null)
        {
            $periode =session('periode_kehadiran');
        }else
        {
            $periode = date('y-m-d');
        }

        $data['kehadiran'] = Pegawai::select('pegawai.nip','pegawai.nama_pegawai','jabatan.nama_jabatan','golongan.nama_golongan','pangkat.nama_pangkat','kehadiran.id','kehadiran.tanggal_masuk','kehadiran.tanggal_pulang','status_kehadiran.status_kehadiran')
            ->leftjoin('kehadiran', function ($join) {

            if(session('periode_kehadiran')!=null)
            {
                $periode = session('periode_kehadiran');
            }else
            {
                $periode = date('y-m-d');
            }

            $join->on('kehadiran.nip','=','pegawai.nip')
            ->whereRaw("date(kehadiran.tanggal_masuk)='$periode'");
        })
        ->leftJoin('jabatan','pegawai.kode_jabatan','=','jabatan.kode_jabatan')
        ->LeftJoin('golongan','pegawai.kode_golongan','=','golongan.kode_golongan')
        ->LeftJoin('pangkat','pegawai.kode_pangkat','=','pangkat.kode_pangkat')
        ->leftJoin('status_kehadiran','status_kehadiran.kode_status_kehadiran','=','kehadiran.kode_status_kehadiran')
        ->get();
return view('kehadiran.index',$data);
    }
    function create()
    {
        $data['pegawai'] = Pegawai::select('nama_pegawai')->get();
        $data['statusKehadiran'] = StatusKehadiran::pluck('status_kehadiran','kode_status_kehadiran');
        return view('kehadiran.create',$data);
    }

    function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_pulang' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        $pegawai = \DB::table('pegawai')->where('nama_pegawai',$request->nama_pegawai)->first();
        if($pegawai != null)
        {
            //insert data 
            $data = [
                'nip'=> $pegawai->nip,
                'tanggal_masuk'         =>$request->tanggal_masuk.' '.$request->jam_masuk,
                'tanggal_pulang'        =>$request->tanggal_pulang.' '.$request->jam_pulang,
                'kode_status_kehadiran' =>$request->kode_status_kehadiran
            ];
    
            // \DB::table('kehadiran')->create($data);
            \DB::table('kehadiran')->insert($data);
            return Redirect('/kehadiran')->with('message','Data Kehadiran : '.$request->nama_pegawai . 'Berhasil Disimpan');
        }else
        {
            return Redirect('/kehadiran')->with('message','Pegawai Dengan Nama :'.$request->nama_pegawai . 'Tidak Ditemukan');
        }
    }

    function ubahPeriodeKehadiran(Request $request)
    {
        session(['periode_kehadiran'=>$request->periode_kehadiran]);
        return redirect('kehadiran')->with('message','Laporan Periode Kehadiran Sudah Diubah');
    }
    function excel(Request $request)
    {

        return Excel::download(new KehadiranExport($request->tanggal_mulai,$request->tanggal_selesai), 'laporan-kehadiran.xlsx');
    }


    function import(request $request)
    {
        $file       = $request->file('file');
        $fileName   = $file->getClientOriginalName();
         //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$fileName);

        Excel::import(new KehadiranImport, public_path().'/uploads/'.$fileName);

        return redirect('kehadiran')->with('message','Laporan Kehadiran berhasil Di Import');

    }
}
