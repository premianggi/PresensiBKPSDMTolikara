<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Golongan;
use App\Pangkat;
use App\Jabatan;
use App\StatusKawin;


class PegawaiController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pegawai'] = Pegawai::join('jabatan','jabatan.kode_jabatan','=','pegawai.kode_jabatan')
                                    ->join('golongan','golongan.kode_golongan','=','pegawai.kode_golongan')
                                    ->join('pangkat','pangkat.kode_pangkat','=','pegawai.kode_pangkat')
                                    ->join('status_kawin','status_kawin.kode_status_kawin','=','pegawai.kode_status_kawin')
                                   // ->join('status_kawin','status_kawin.kode_status_kawin','=','pegawai','kode_status_kawin')
                                    ->get();
        return view('pegawai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status_kawin'] = StatusKawin::pluck('keterangan','kode_status_kawin');  
        $data['jabatan'] = Jabatan::pluck('nama_jabatan','kode_jabatan');
        $data['golongan'] = Golongan::pluck('nama_golongan','kode_golongan');
        $data['pangkat'] = Pangkat::pluck('nama_pangkat','kode_pangkat');      
        return view('pegawai.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nip' => 'required|unique:pegawai|max:8|min:8',
        //     'nama_pegawai' => 'required|min:5',
        // ]);
        $request->validate([
            'nip' => 'required|unique:pegawai|max:18|min:18',
            'nama_pegawai' => 'required|min:5',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
        ]);

        if($request->hasFile('foto'))
        {
             //upload foto
            $file = $request-->file('foto');
            $fileName = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $fileName);
        }else
        {
            $fileName = null;
        }
        $pegawai = new Pegawai();
        $pegawai->nip                = $request->nip;
        $pegawai->nama_pegawai       = $request->nama_pegawai;
        $pegawai->tanggal_lahir      = $request->tanggal_lahir;
        $pegawai->alamat             = $request->alamat;
        $pegawai->tanggal_masuk      = $request->tanggal_masuk;
        $pegawai->kode_status_kawin  = $request->kode_status_kawin;
        $pegawai->jenis_kelamin      = $request->jenis_kelamin;
        $pegawai->kode_jabatan       = $request->kode_jabatan;
        $pegawai->kode_golongan      = $request->kode_golongan;
        $pegawai->kode_pangkat       = $request->kode_pangkat;
        $pegawai->gaji_pokok         = $request->gaji_pokok;
        $pegawai->foto               =$fileName; 
        $pegawai->save();
        return redirect('pegawai')->with('message','Berhasil Menyimpan Data Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $data['pegawai'] = Pegawai::find($nip);
        $data['jabatan'] = Jabatan::pluck('nama_jabatan','kode_jabatan');
        $data['golongan'] = Golongan::pluck('nama_golongan','kode_golongan');
        $data['pangkat'] = Pangkat::pluck('nama_pangkat','kode_pangkat');    
        $data['status_kawin'] = StatusKawin::pluck('keterangan','kode_status_kawin');    
        return view('pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $request->validate([
            // 'nip' => 'required|unique:pegawai|max:18|min:18',
            'nama_pegawai' => 'required|min:5',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
        ]);

       
        $pegawai = Pegawai::find ($nip);
        // $pegawai->nip                = $request->nip;
        $pegawai->nama_pegawai       = $request->nama_pegawai;
        $pegawai->tanggal_lahir      = $request->tanggal_lahir;
        $pegawai->alamat             = $request->alamat;
        $pegawai->tanggal_masuk      = $request->tanggal_masuk;
        $pegawai->kode_status_kawin  = $request->kode_status_kawin;
        $pegawai->jenis_kelamin      = $request->jenis_kelamin;
        $pegawai->kode_jabatan       = $request->kode_jabatan;
        $pegawai->kode_golongan      = $request->kode_golongan;
        $pegawai->kode_pangkat       = $request->kode_pangkat;
        $pegawai->gaji_pokok         = $request->gaji_pokok;

        if($request->hasFile('foto'))
        {
             //upload foto
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $fileName);

            $pegawai->foto=$fileName;
        }
 
        $pegawai->update();
        return redirect('pegawai')->with('message','Berhasil Menyimpan Perubahan Data Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $pegawai = Pegawai::find($nip);
        $pegawai->delete();
        return redirect('pegawai')->with('message','Berhasil Menghapus Data');
    }

    function polaKerja($nip)
    {
        $data['pegawai']          =    \DB::table('pegawai')->where('nip',$nip)->first();
        $data['polaKerjaPegawai'] =    \DB::table('pola_kerja_pegawai')
                                        ->join('pola_kerja','pola_kerja.id','=','pola_kerja_pegawai.pola_kerja_id')
                                        ->where('pola_kerja_pegawai.nip',$nip)
                                        ->orderBy('pola_kerja_pegawai.tanggal','ASC')
                                        ->paginate(4);
        return view('pegawai.polakerja',$data);
    }

    function kehadiran($nip)
    {
        $data['riwayatKehadiran']   =   \DB::table('view_riwayat_kehadiran')
                                        ->where('nip',$nip)
                                        ->orderBy('tanggal_masuk','ASC')
                                        ->paginate(7);
        $data['pegawai']           =  \DB::table('pegawai')->where('nip',$nip)->first();
        return view('pegawai.kehadiran',$data);
    }

    function lembur($nip)
    {
        $data['riwayatKehadiran']   =   \DB::table('lembur')
                                        ->where('nip',$nip)
                                        ->orderBy('tanggal_masuk','ASC')
                                        ->paginate(7);
        $data['pegawai']           =  \DB::table('pegawai')->where('nip',$nip)->first();
        return view('pegawai.lembur',$data);
    }

}
