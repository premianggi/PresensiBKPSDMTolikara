<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;

class GolonganController extends Controller
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
        $data['golongan'] = Golongan::all();
        return view('golongan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
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
            'kode_golongan' => 'required|unique:golongan|max:8|min:8',
            'nama_golongan' => 'required',
        ]);

        $golongan = new Golongan();
        $golongan->kode_golongan = $request->kode_golongan;
        $golongan->nama_golongan = $request->nama_golongan;
        $golongan->save();
        return redirect('golongan')->with('message','Berhasil Menyimpan Data Golongan');
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
    public function edit($kode_golongan)
    {
        $data['golongan'] = Golongan::find($kode_golongan);
        return view('golongan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_golongan)
    {
        // $request->validate([
            // 'kode_golongan' => 'required|unique:golongan|max:8|min:8',
        //     'nama_golongan' => 'required|min:5',
        // ]);

        $golongan = Golongan::find($kode_golongan);
        // $golongan->kode_golongan = $request->kode_golongan;
        $golongan->nama_golongan = $request->nama_golongan;
        $golongan->update();
        return redirect('golongan')->with('message','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($kode_golongan)
    // {
    //     $golongan = Golongan::find($kode_golongan);
    //     $golongan->delete();
    //     return redirect('golongan')->with('message','Berhasil Menghapus Data');
    // }
    public function delete($kode_golongan)
    {
        $golongan = Golongan::find($kode_golongan);
        $golongan->delete();
        return redirect('/golongan')->with('message','Berhasil Menghapus Data');
    }
}
