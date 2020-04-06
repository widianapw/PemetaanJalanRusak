<?php

namespace App\Http\Controllers;

use App\DigitasiJalan;
use App\DetailDigitasi;
use Illuminate\Http\Request;

class DigitasiJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DigitasiJalan::orderBy('id','desc')->get();
        return view('admin.digitasi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.digitasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jalan = new DigitasiJalan;
        $jalan->nama = $request->nama;
        $jalan->kecamatan = $request->kecamatan;
        $jalan->kota = $request->kota;
        $jalan->save();

        foreach($request->koordinat as $k){
            $detail = new DetailDigitasi;
            $detail->id_digitasi = $jalan->id;
            $detail->latitude = $k['lat'];
            $detail->longitude = $k['lng'];
            $detail->save();
        }
        

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DigitasiJalan  $digitasiJalan
     * @return \Illuminate\Http\Response
     */
    public function show(DigitasiJalan $digitasiJalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DigitasiJalan  $digitasiJalan
     * @return \Illuminate\Http\Response
     */
    public function edit(DigitasiJalan $digitasiJalan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DigitasiJalan  $digitasiJalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DigitasiJalan $digitasiJalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DigitasiJalan  $digitasiJalan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailDigitasi::where('id_digitasi',$id)->delete();
        DigitasiJalan::find($id)->delete();
        return redirect('/admin/digitasiJalan');
    }
}
