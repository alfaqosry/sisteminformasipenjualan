<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dashboard;
use App\Models\Penjualan;
use App\Models\Cabangtoko;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totaltoko = Cabangtoko::count();
        $totalpegawai = User::count();
        $totalpenjualan = Penjualan::count();

        $penjualans = Penjualan::select('id', 'created_at')
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

    $penjualancount = [];
    $penjualanArr = [];

    foreach ($penjualans as $key => $value) {
        $penjualancount[(int)$key] = count($value);
    }

    $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    for ($i = 1; $i <= 12; $i++) {
        if (!empty($penjualancount[$i])) {
            $penjualanArr[$month[$i - 1]] = $penjualancount[$i];
            
        } else {
            $penjualanArr[$month[$i - 1]] = 0;
         
        }
       
    }

  

    // return response()->json(array_values($penjualanArr));

       
        return view(
            'dashboard.index',
            [
                'totaltoko' => $totaltoko,
                'totalpegawai' => $totalpegawai,
                'totalpenjualan' => $totalpenjualan,
                'penjualanArr' => $penjualanArr
            ]
        );
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
