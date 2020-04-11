<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\polaKerja;
class PolaKerjaController extends Controller
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
        $data['polaKerja'] = polaKerja::all();
        return view('polaKerja.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polaKerja.create');
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
            'pola_kerja' => 'required || unique:pola_kerja|',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        $polaKerja = new polaKerja();
        $polaKerja->pola_kerja  = $request->pola_kerja;
        $polaKerja->jam_masuk   = $request->jam_masuk;
        $polaKerja->jam_pulang  = $request->jam_pulang;
        $polaKerja->save();
        return redirect('polakerja')->with('message','Berhasil Menyimpan Data Pola Kerja');
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
        $data['polaKerja'] = polaKerja::find($id);
        return view('polaKerja.edit', $data);
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
            // 'kode_polaKerja' => 'required|unique:polaKerja|max:8|min:8',
            'pola_kerja' => 'required|min:5',
        ]);

        $polaKerja = polaKerja::find($id);
        // $polaKerja->kode_polaKerja = $request->kode_polaKerja;
        $polaKerja->pola_kerja = $request->pola_kerja;
        $polaKerja->jam_masuk   = $request->jam_masuk;
        $polaKerja->jam_pulang  = $request->jam_pulang;
        $polaKerja->update();
        return redirect('polakerja')->with('message','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $polaKerja = polaKerja::find($id);
        $polaKerja->delete();
        return redirect('polakerja')->with('message','Berhasil Menghapus Data');
    }
}
