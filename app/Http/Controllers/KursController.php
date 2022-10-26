<?php

namespace App\Http\Controllers;

use App\Models\Kurs;
use App\Models\KursDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurs = Kurs::where('jenis_kurs', 'Lembar')
        ->get();

        // $kurs = KursDetail::leftjoin('tb_currency','tb_det_currency.nama_currency','tb_currency.nama_currency')
        // ->orderBy('nama_currency','ASC')
        // ->get();
        // return $kurs;
        
        $coins = Kurs::where('jenis_kurs', 'Coins')->get();
        $detail = KursDetail::join('tb_currency','tb_det_currency.id_currency','tb_currency.id_currency')
        ->orderBy('nama_currency')
        ->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('welcome', compact('kurs','today','tanggal','coins','detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
