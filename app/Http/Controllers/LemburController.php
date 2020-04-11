<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class LemburController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        if(session('periode_lembur')!=null)
            {
                $periode = session('periode_lembur');
            }else
            {
                $periode = date('y-m-d');
            }

        $data['riwayatLembur'] = \DB::table('lembur')
                                ->select('lembur.*','pegawai.nama_pegawai')
                                ->join('pegawai','pegawai.nip','=','lembur.nip')
                                ->whereRaw("date(lembur.tanggal_masuk)='$periode'")
                                ->get();
        return view('lembur.index',$data);
    }

    function create()
    {
        $data['pegawai'] = Pegawai::select('nama_pegawai')->get();
        return view('lembur.create',$data);
    }

    function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_pulang' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
            'durasi_lembur'=>'required'
        ]);

        $pegawai = \DB::table('pegawai')->where('nama_pegawai',$request->nama_pegawai)->first();
        if($pegawai!=null)
        {
            // insert data
            $data = [
                'nip'                   =>  $pegawai->nip,
                'tanggal_masuk'         =>  $request->tanggal_masuk.' '.$request->jam_masuk,
                'tanggal_pulang'        =>  $request->tanggal_pulang.' '.$request->jam_pulang,
                'durasi_lembur'         =>  $request->durasi_lembur
            ];

            \DB::table('lembur')->insert($data);
            return Redirect('/lembur')->with('message','Data Riwayat Lembur : '.$request->nama_pegawai .'Berhasil Disimpan');
        }else
        {
            // return Redirect::back()->with('message','Pegawai Dengan Nama : '.$request->nama_pegawai .' Tidak Ditemukan');
            return Redirect('lembur/'.$request->id)->with('message','Data Riwayat Lembur : '.$request->nama .'Tidak Ditemukan');
        }
    }


    function ubahPeriodeLembur(Request $request)
    {
        session(['periode_lembur'=>$request->periode_lembur]);
        return redirect('lembur')->with('message','Laporan Periode Lembur Sudah Diubah');
    }

    function destroy($id,$url)
    {
        $lembur = \DB::table('lembur')->where('id',$id)->first();

        $delete = \DB::table('lembur')->where('id',$id)->delete();


        if($url=='lembur')
        {
            return redirect('lembur')->with('message','Riwayat Lembur Sudah Dihapus');
        }else
        {
            return redirect('pegawai/'.$lembur->nip.'/lembur')->with('message','Riwayat Lembur Sudah Dihapus');
        }
    }
}
