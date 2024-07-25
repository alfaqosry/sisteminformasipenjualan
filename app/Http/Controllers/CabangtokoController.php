<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabangtoko;
use App\Models\Pegawaitoko;
use Illuminate\Http\Request;

class CabangtokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cabang = Cabangtoko::with('pegawais')->get();


        $cabang = Cabangtoko::join('pegawaitoko', 'cabangtokos.id', '=' , 'pegawaitoko.cabangtoko_id')
                             ->join('users', 'pegawaitoko.user_id', '=', 'users.id')
                             ->select('users.name', 'cabangtokos.nama_cabang','cabangtokos.alamat_cabang')
                             ->get();
        return view('cabangtoko.index',[
            'cabang' => $cabang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('cabangtoko.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'alamat_cabang' => 'required'
        ]);

       

        $cabangtoko = Cabangtoko::create(["nama_cabang" => $request->nama_cabang, "alamat_cabang" => $request->alamat_cabang]);
        $pegawai = Pegawaitoko::create(["user_id" => $request->manajer, "cabangtoko_id" => $cabangtoko->id, "jabatan" => "Manager"]); 
        return redirect()->route('cabang.index')->with('sukses', 'Cabang Toko berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabangtoko $cabangtoko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabangtoko $cabangtoko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabangtoko $cabangtoko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabangtoko $cabangtoko)
    {
        //
    }
}
