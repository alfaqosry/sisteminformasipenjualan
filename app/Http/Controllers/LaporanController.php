<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Laporan;
use App\Models\Penjualan;
use App\Models\Cabangtoko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftartoko = Cabangtoko::join('pegawaitoko', 'cabangtokos.id', '=', 'pegawaitoko.cabangtoko_id')
            ->join('users', 'pegawaitoko.user_id', '=', 'users.id')
            ->select('users.name', 'cabangtokos.nama_cabang', 'cabangtokos.alamat_cabang', 'cabangtokos.id')
            ->get();

        return view('laporan.index', ['daftartoko' => $daftartoko]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penjualan = Penjualan::join(
            'barangs',
            'penjualans.barang_id',
            '=',
            'barangs.id'
        )->join(
            'users',
            'penjualans.kasir_id',
            '=',
            'users.id'
        )->select('barangs.*', 'penjualans.kuantitas', 'penjualans.harga', 'penjualans.sisa_stok', 'users.name', 'penjualans.created_at as tanggal')
            ->where('penjualans.toko_id', $id)
            ->latest()
            ->get();

        $penjualanhariini = Penjualan::join(
            'barangs',
            'penjualans.barang_id',
            '=',
            'barangs.id'
        )->where('penjualans.toko_id', $id)->whereDate('penjualans.created_at', Carbon::today())->select(DB::raw('sum(barangs.harga_barang * penjualans.kuantitas) as total'))->first();
        $totalpendapatan = Penjualan::join(
            'barangs',
            'penjualans.barang_id',
            '=',
            'barangs.id'
        )->where('penjualans.toko_id', $id)->select(DB::raw('sum(barangs.harga_barang * penjualans.kuantitas) as total'))->first();

        return view('laporan.show', [
            'penjualan' => $penjualan,
            'penjualanhariini' => $penjualanhariini,
            'totalpendapatan' => $totalpendapatan
        ]);
    }


    public function get_penjualan($id){
        $penjualan = Penjualan::join(
            'barangs',
            'penjualans.barang_id',
            '=',
            'barangs.id'
        )->join(
            'users',
            'penjualans.kasir_id',
            '=',
            'users.id'
        )->select('barangs.*', 'penjualans.kuantitas', 'penjualans.harga', 'penjualans.sisa_stok', 'users.name', 'penjualans.created_at as tanggal')
            ->where('penjualans.toko_id', $id)
            ->latest()
            ->get();

            return response()->json(['penjualan' =>  $penjualan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
