<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
}
