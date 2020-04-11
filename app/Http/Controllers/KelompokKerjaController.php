<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelompokKerja;
use App\PolaKerja;

class KelompokKerjaController extends Controller
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
        $data['kelompokKerja'] = kelompokKerja::all();
        return view('kelompokKerja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelompokKerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelompok_kerja' => 'required|unique:kelompok_kerja',
        ]);

        $kelompokKerja = new kelompokKerja();
        $kelompokKerja->kelompok_kerja = $request->kelompok_kerja;
        $kelompokKerja->save();
        return redirect('kelompokkerja') ->with('message','Berhasil Menyimpan Data Kelompok Kerja');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $data['pegawai'] = \DB::table('pegawai')->get();
            $data['kelompokKerja'] = kelompokKerja::find($id);
            $data['anggota'] = \DB::table('anggota_kelompok_kerja')
                                ->join('pegawai','pegawai.nip','=','anggota_kelompok_kerja.nip')
                                ->where('anggota_kelompok_kerja.kelompok_kerja_id',$id)
                                ->get();
            return view('kelompokkerja.show',$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kelompokKerja'] = kelompokKerja::find($id);
        return view('kelompokKerja.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'kode_kelompokKerja' => 'required|unique:kelompokKerja|max:8|min:8',
            'kelompok_kerja' => 'required|',
        ]);

        $kelompokKerja = kelompokKerja::find($id);
        // $kelompokKerja->kode_kelompokKerja = $request->kode_kelompokKerja;
        $kelompokKerja->kelompok_kerja = $request->kelompok_kerja;
        $kelompokKerja->update();
        return redirect('kelompokkerja')->with('message','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelompokKerja = kelompokKerja::find($id);
        $kelompokKerja->delete();
        return redirect('kelompokkerja')->with('message','Berhasil Menghapus Data');
    }

    function tambahAnggota(Request $request)
    {
        // return $request->all();
        $pegawai = \DB::table('pegawai')->where('nama_pegawai',$request->nama_pegawai)->first();

        if($pegawai!=null)
        {

            $data = ['nip' =>$pegawai->nip,'kelompok_kerja_id'=>$request->id];
            \DB::table('anggota_kelompok_kerja')->insert($data);
            return Redirect('kelompokkerja/'.$request->id)->with('message','Data Anggota : '.$request->nama .'Berhasil Ditambahkan');

        }else
        {
            return Redirect('kelompokkerja/'.$request->id)->with('message','Data Pegawai : '.$request->nama .'Tidak Ditemukan');
        }
    }

    function hapusAnggota($id)
    {
        $anggota = \DB::table('anggota_kelompok_kerja')
                    ->select('anggota_kelompok_kerja.kelompok_kerja_id','pegawai.nama_pegawai')
                    ->join('pegawai','pegawai.nip','=','anggota_kelompok_kerja.nip')
                    ->where('anggota_kelompok_kerja.id',$id)
                    ->first();

        \DB::table('anggota_kelompok_kerja')
            ->where('id',$id)
            ->delete();

        return redirect('kelompokkerja/'.$anggota->kelompok_kerja_id)->with('message','Anggota Dengan Nama '.$anggota->nama_pegawai.' Sudah Dihapus');
    }
    // function polaKerja ($id)
    // {
    //     $data['kelompokKerja'] = kelompokKerja::find($id);
    //     $data['polaKerja'] = PolaKerja::pluck('pola_kerja','id');
    //     $data['polaKerjaKelompok'] = \DB::table('pola_kerja_kelompok_pegawai')
    //                                             ->select('pola_kerja_kelompok_pegawai','pola_kerja_kelompok_pegawai.id','pola_kerja.pola_kerja')
    //                                             ->join('pola_kerja','pola_kerja.id','=','pola_kerja_kelompok_pegawai.pola_kerja_id')
    //                                             ->get();
    //     dd($data['polaKerjaKelompok']);
    //     return view('kelompokkerja.polakerja', $data);
    function polaKerja($id)
    {   
        $data['kelompokKerja']      = kelompokKerja::find($id);
        $data['polaKerja']          = PolaKerja::pluck('pola_kerja','id');
        $data['polakerjaKelompok']  = \DB::table('pola_kerja_kelompok_pegawai')
                                    ->select('pola_kerja_kelompok_pegawai.tanggal','pola_kerja_kelompok_pegawai.id','pola_kerja.pola_kerja','pola_kerja.jam_masuk','pola_kerja.jam_pulang')
                                    ->join('pola_kerja','pola_kerja.id','=','pola_kerja_kelompok_pegawai.pola_kerja_id')
                                    ->paginate(7);
        return view('kelompokkerja.polakerja',$data);
    }

    // function simpanPolaKerja(Request $request)
    // {
    //     return $request->all();
    //     $period = new \DatePeriod(
    //         new \DateTime($request->dari_tanggal),
    //         new \DateInterval('P1D'),
    //         new \DateTime(date('Y-m-d', strtotime('1 day', strtotime($request->sampai_tanggal))))
    //     );
        
    //     $dataPolaKerja = [];

    //     foreach ($period as $key => $value){
    //         $dataPolaKerja[]=[
    //             'tanggal'               =>$value->format('Y-m-d'),
    //             'pola_kerja_id'         =>$request->pola_kerja_id,
    //             'kelompok_kerja_id'     =>$request->kelompok_kerja_id,
    //             'created_at'             =>date('Y-m-d'),
    //             'updated_at'             =>date('Y-m-d'),
    //         ];
    //     }
    //  dd($dataPolaKerja);
    //    \DB::table('pola_kerja_kelompok_pegawai')->insert($dataPolaKerja);
    //    return redirect('kelompokkerja/'.$request->kelompok_kerja_id.'\polakerja')->with('message','Data Kelompok Berhasil Disimpan');
    // } 
    function simpanPolaKerja(Request $request)
    {

        $period = new \DatePeriod(
            new \DateTime($request->dari_tanggal),
            new \DateInterval('P1D'),
            new \DateTime(date('Y-m-d', strtotime('1 day', strtotime($request->sampai_tanggal))))
       );

       $dataPolaKerja = [];

       // insert pola kerja kelompok pegawai

       foreach ($period as $key => $value) {
        $dataPolaKerja[] = [
                            'tanggal'           =>  $value->format('Y-m-d'),
                            'pola_kerja_id'     =>  $request->pola_kerja,
                            'kelompok_kerja_id' =>  $request->kelompok_kerja_id,
                            'created_at'        =>  date('Y-m-d'),
                            'updated_at'        =>  date('Y-m-d'),
            ];
        }

        \DB::table('pola_kerja_kelompok_pegawai')->insert($dataPolaKerja);

        // insert pola kerja pegawai

        $polaKerjaPegawai = [];

        $pegawai = \DB::table('anggota_kelompok_kerja')
                    ->where('kelompok_kerja_id',$request->kelompok_kerja_id)
                    ->get();
        foreach($pegawai as $k)
        {
            foreach ($period as $key => $value) {
                $polaKerjaPegawai[] = [
                                        'nip'           =>  $k->nip,
                                        'pola_kerja_id' =>  $request->pola_kerja,
                                        'tanggal'       =>  $value->format('Y-m-d')];
            }
            
        }

        \DB::table('pola_kerja_pegawai')->insert($polaKerjaPegawai);

        return redirect('kelompokkerja/'.$request->kelompok_kerja_id.'/polakerja')->with('message','Data Kelompok Kerja Berhasil Disimpan');
    }
    function hapusPolaKerja($id)
    {
        $polaKerja = \DB::table('pola_kerja_kelompok_pegawai')->where('id',$id)->first();

        \DB::table('pola_kerja_kelompok_pegawai')->where('id',$id)->delete();
        
        return redirect('kelompokkerja/'.$polaKerja->kelompok_kerja_id.'/polakerja')->with('message','Data Kelompok Kerja Berhasil Dihapus');
    }
}