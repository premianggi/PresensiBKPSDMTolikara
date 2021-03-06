<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;

class JabatanController extends Controller
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
        $data['jabatan'] = Jabatan::all();
        return view('jabatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
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
        //     'kode_jabatan' => 'required|unique:jabatan|max:8|min:8',
        //     'nama_jabatan' => 'required|min:5',
        // ]);
        $request->validate([
            'kode_jabatan' => 'required|unique:jabatan|max:8|min:8',
            'nama_jabatan' => 'required',
            'tunjangan_jabatan' => 'required',
        ]);

        $jabatan = new Jabatan();
        $jabatan->kode_jabatan = $request->kode_jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->tunjangan_jabatan = $request->tunjangan_jabatan;
        $jabatan->save();
        return redirect('jabatan')->with('message','Berhasil Menyimpan Data Jabatan');
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
    public function edit($kode_jabatan)
    {
        $data['jabatan'] = Jabatan::find($kode_jabatan);
        return view('jabatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_jabatan)
    {
        $request->validate([
            // 'kode_jabatan' => 'required|unique:jabatan|max:8|min:8',
            'nama_jabatan' => 'required|min:5',
            'tunjangan_jabatan' => 'required',
        ]);

        $jabatan = Jabatan::find($kode_jabatan);
        // $jabatan->kode_jabatan = $request->kode_jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->update();
        return redirect('jabatan')->with('message','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($kode_jabatan)
    // {
    //     $jabatan = Jabatan::find($kode_jabatan);
    //     $jabatan->delete();
    //     return redirect('jabatan')->with('message','Berhasil Menghapus Data');
    // }
     public function delete($kode_jabatan)
    {
        $jabatan = Jabatan::find($kode_jabatan);
        $jabatan->delete();
        return redirect('/jabatan')->with('message','Berhasil Menghapus Data');
    }
}
