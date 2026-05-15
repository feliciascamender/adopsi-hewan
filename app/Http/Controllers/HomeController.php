<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Untuk sementara kita tampilkan teks saja dulu agar tahu kalau sudah jalan
        return view('welcome');
    }
    
    public function animals()
    {
        return "Halaman Daftar Hewan";
    }

    public function show($id)
    {
        return "Detail Hewan ID: " . $id;
    }
}