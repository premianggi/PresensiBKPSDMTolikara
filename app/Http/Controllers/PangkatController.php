<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pangkat;
class PangkatController extends Controller
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
        $data['pangkat'] = Pangkat::all();
        return view('pangkat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pangkat.create');
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
            'kode_pangkat' => 'required|unique:pangkat|max:8|min:8',
            'nama_pangkat' => 'required',
        ]);

        $pangkat = new Pangkat();
        $pangkat->kode_pangkat = $request->kode_pangkat;
        $pangkat->nama_pangkat = $request->nama_pangkat;
        $pangkat->save();
        return redirect('pangkat')->with('message','Berhasil Menyimpan Data Pangkat');
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
    public function edit($kode_pangkat)
    {
        $data['pangkat'] = Pangkat::find($kode_pangkat);
        return view('pangkat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_pangkat)
    {
        // $request->validate([
        //     // 'kode_pangkat' => 'required|unique:pangkat|max:8|min:8',
        //     'nama_pangkat' => 'required|min:5',
        // ]);

        $pangkat = Pangkat::find($kode_pangkat);
        // $pangkat->kode_pangkat = $request->kode_pangkat;
        $pangkat->nama_pangkat = $request->nama_pangkat;
        $pangkat->update();
        return redirect('pangkat')->with('message','Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($kode_pangkat)
    {
        $pangkat = Pangkat::find($kode_pangkat);
        $pangkat->delete();
        return redirect('/pangkat')->with('message','Berhasil Menghapus Data');
    }
    // public function delete($kode_pangkat)
    // {
    //     $pangkat=\App\Pangkat::find($kode_pangkat);
    //     $pangkat->delete($pangkat);
    //     return redirect('/pangkat')->with('message','Berhasil Menghapus Data');
    // }
}
