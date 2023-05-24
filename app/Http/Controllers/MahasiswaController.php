<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
   
    // public function index()
    // {
    //     return view('daftar_mahasiswa');
    // }

    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa', compact("mahasiswas"));
    }

    public function detail_mhs()
    {
        return view('detail_mahasiswa');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
