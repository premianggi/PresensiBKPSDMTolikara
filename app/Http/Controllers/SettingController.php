<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DB;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    function index()
    {
        $data['pengaturan']= \DB::table('pengaturan')->where('id',1)->first();
        return view('pengaturan',$data);
    }

    function save(request $request)
    {
       
        if($request->hasFile('logo'))
        {
             //upload foto
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $fileName);

            $data=[
                'nama_kantor'       =>$request->nama_kantor,
                'alamat_kantor'     =>$request->alamat_kantor,
                'email'             =>$request->email,
                'no_telpon'         =>$request->no_telpon,
                'logo'              =>$fileName,
            ];
    
        }else
        {
            $data=[
                'nama_kantor'       =>$request->nama_kantor,
                'alamat_kantor'     =>$request->alamat_kantor,
                'email'             =>$request->email,
                'no_telpon'         =>$request->no_telpon,
            ];
    
        }
        
        \DB::table('pengaturan')->where('id',1)->update($data);
        return redirect('pengaturan')->with('message','Berhasil Menyimpan Perubahan');
    }
}
