<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;
Use App\Golongan;
use App\Kehadiran;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['pegawai']        = Pegawai::count();
        // $data['Kehadiran']      = Kehadiran::count();
        $data['kehadiran'] = \DB::table('kehadiran')->where('tanggal_masuk')->count();
        // $kehadiran = Kehadiran::count();
     // $results = DB::select('select * from kehadiran where tanggal_masuk = CURRENT_DATE');
        // $data['jmlHadir']       = \DB::table('kehadiran')->where('tanggal_masuk', '>=', 'CURRENT_DATE')->where('kode_status_kehadiran','H')->count();
        // $data['jmlSakit']       = \DB::table('kehadiran')->where('tanggal_masuk', '>=', 'CURRENT_DATE')->where('kode_status_kehadiran','S')->count();
        // $data['jmlIzin']       = \DB::table('kehadiran')->where('tanggal_masuk', '>=', 'CURRENT_DATE')->where('kode_status_kehadiran','I')->count();

        // $data['jmlCuti']       = \DB::table('kehadiran')->where('tanggal_masuk', '>=', 'CURRENT_DATE')->where('kode_status_kehadiran','C')->count();
        // $data['jmlTerlambat']       = \DB::table('kehadiran')->where('tanggal_masuk', '>=', 'CURRENT_DATE')->where('kode_status_kehadiran','T')->count();


        $data['jmlHadir']    = \DB::table('kehadiran')->where('tanggal_masuk', '>=', Carbon::now()->format('Y-m-d'))->where('kode_status_kehadiran','H')->count();
        $data['jmlTdkHadir']    = \DB::table('kehadiran')->where('tanggal_masuk', '>=', Carbon::now()->format('Y-m-d'))->where('kode_status_kehadiran','A')->count();
        $data['jmlSakit']    = \DB::table('kehadiran')->where('tanggal_masuk', '>=', Carbon::now()->format('Y-m-d'))->where('kode_status_kehadiran','S')->count();
        $data['jmlIzin']    = \DB::table('kehadiran')->where('tanggal_masuk', '>=', Carbon::now()->format('Y-m-d'))->where('kode_status_kehadiran','I')->count();
        $data['jmlCuti']    = \DB::table('kehadiran')->where('tanggal_masuk', '>=', Carbon::now()->format('Y-m-d'))->where('kode_status_kehadiran','C')->count();
        // $data['jmlHadir']       = \DB::table('kehadiran')->where('kode_status_kehadiran','H')->count();
        // $data['jmlTdkHadir']       = \DB::table('kehadiran')->where('kode_status_kehadiran','A')->count();
        // $data['jmlSakit']       = \DB::table('kehadiran')->where('kode_status_kehadiran','S')->count();
        // $data['jmlIzin']        = \DB::table('kehadiran')->where('kode_status_kehadiran','I')->count();
        // $data['jmlCuti']        = \DB::table('kehadiran')->where('kode_status_kehadiran','C')->count();
        // $data['jmlTerlambat']   = \DB::table('kehadiran')->where('kode_status_kehadiran','T')->count();

        
        return view('home',$data);
    }
    // public function googleLineChart()
    // {
    //     $kehadiran = DB::table('kehadiran')
    //                 ->select(
    //                     DB::raw("date (created_at) as date"),
    //                     DB::raw("count(kode_status_kehadiran) as total_hadir"),
    //                     DB::raw("count(kode_status_kehadiran) as total_tidakHadir")) 
    //                 ->orderBy("created_at")
    //                 ->groupBy(DB::raw("date(created_at)"))
    //                 ->get();


    //     $result[] = ['Date','Hadir','Tidak Hadir'];
    //     foreach ($kehadiran as $key => $value) {
    //         $result[++$key] = [$value->date, (int)$value->total_hadir, (int)$value->total_tidakHadir];
    //     }


    //     return view('google-line-chart')
    //             ->with('kehadiran',json_encode($result));
    // }


    // public function getChart()
    // {
    //     $start = Cargon::now()->subweek()->addDay()->format('y,m,d'). '00:00:01';
    //     Mengambil tanggal hari ini
    //     $end = Cargon::now()->format('y-m-d'). '23:59:00';
    //      $kehadiran = Kehadiran::select(DB::raw('date(created_at) as kehadiran'), DB::raw('count(*) as total_kehadiran'))

    //      ->whereBetween('created_at', [$start, $end])
    //      ->groupBy('created_at')
    //      ->get()->pluck('total_kehadiran', 'kehadiran')->all();

    //      for ($i = Cargon::now()->subWeek()->addDay(); $i <= Cargon::now(); $i->addDay()){
    //          if(array_key_exists($i->format('Y-m-d'), $order)){
    //              $data[$i->format('Y-m-d')] = $order[$i->format('Y-m-d')];
    //          }else{
    //              $date[$i->format('Y-m-d')];
    //          }
    //      }
    //      return response()->json($data);
    // }
}
