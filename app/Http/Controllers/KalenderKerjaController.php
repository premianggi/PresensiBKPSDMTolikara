<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KalenderKerja;

class KalenderKerjaController extends Controller
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
        $data['kalenderKerja'] = KalenderKerja::all();
        return view('kalenderKerja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kalenderKerja.create');
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
        //     'kode_kalenderKerja' => 'required|unique:kalenderKerja|max:8|min:8',
        //     'nama_kalenderKerja' => 'required|min:5',
        // ]);
        $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

        $kalenderKerja = new KalenderKerja();
        $kalenderKerja->tanggal = $request->tanggal;
        $kalenderKerja->keterangan = $request->keterangan;
        $kalenderKerja->save();
        return redirect('kalenderKerja')->with('message','Berhasil Menyimpan Data Kalender Kerja');
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
    public function edit($id)
    {
        $data['kalenderKerja'] = KalenderKerja::find($id);
        return view('kalenderKerja.edit', $data);
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
            // 'kode_kalenderKerja' => 'required|unique:kalenderKerja|max:8|min:8',
            'keterangan' => 'required|min:5',
        ]);

        $kalenderKerja = KalenderKerja::find($id);
        // $kalenderKerja->kode_kalenderKerja = $request->kode_kalenderKerja;
        $kalenderKerja->keterangan = $request->keterangan;
        $kalenderKerja->update();
        return redirect('kalenderKerja')->with('message','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kalenderKerja = KalenderKerja::find($id);
        $kalenderKerja->delete();
        return redirect('kalenderKerja')->with('message','Berhasil Menghapus Data');
    }
}
