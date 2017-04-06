<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Kamar;
use Auth;
use Session;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            # code...
      $kamar = Kamar::with(['kelas']);
            return Datatables::of($kamar)->addColumn('action', function($kamars){
                    return view('datatable._action', [
                        'model'     => $kamars,
                        'form_url'  => route('kamar.destroy', $kamars->id),
                        'edit_url'  => route('kamar.edit', $kamars->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kelas.nama', 'name' => 'kelas.nama', 'title' => 'Kelas','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'kode_bed', 'name' => 'kode_bed', 'title' => 'Kode Kamar','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'nama_kamar', 'name' => 'nama_kamar', 'title' => 'Nama Kamar','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif', 'name' => 'tarif', 'title' => 'Harga 1','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif_2', 'name' => 'tarif_2', 'title' => 'Harga 2','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif_3', 'name' => 'tarif_3', 'title' => 'Harga 3','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif_4', 'name' => 'tarif_4', 'title' => 'Harga 4','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif_5', 'name' => 'tarif_5', 'title' => 'Harga 5','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif_6', 'name' => 'tarif_6', 'title' => 'Harga 6','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'tarif_7', 'name' => 'tarif_7', 'title' => 'Harga 7','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'fasilitas', 'name' => 'fasilitas', 'title' => 'Fasilitas','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'jumlah_bed', 'name' => 'jumlah_bed', 'title' => 'Jumlah Bed','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'sisa_bed', 'name' => 'sisa_bed', 'title' => 'Sisa Bed','style'=>'background-color: #4CAF50; color: white;']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white;']);

        return view('kamar.index')->with(compact('html'));
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
         $this->validate($request, [
            'kelas'   => 'required',
            'kode_bed'   => 'required',
            'nama_kamar'   => 'required',
            'tarif'   => 'required',
            'tarif_2'   => 'max:100',
            'tarif_3'   => 'max:100',
            'tarif_4'   => 'max:100',
            'tarif_5'   => 'max:100',
            'tarif_6'   => 'max:100',
            'tarif_7'   => 'max:100',
            'fasilitas'   => 'required',
            'jumlah_bed'   => 'required'
            ]);

         $kamar = Kamar::create([
            'kelas' => $request->kelas,
            'kode_bed' => $request->kode_bed,
            'nama_kamar' => $request->nama_kamar,
            'tarif' => $request->tarif, 
            'tarif_2' => $request->tarif_2,
            'tarif_3' => $request->tarif_3,
            'tarif_4' => $request->tarif_4,
            'tarif_5' => $request->tarif_5,
            'tarif_6' => $request->tarif_6,
            'tarif_7' => $request->tarif_7,
            'fasilitas' => $request->fasilitas,
            'jumlah_bed' => $request->jumlah_bed,
            'sisa_bed' => $request->jumlah_bed]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Kamar"
            ]);
        return redirect()->route('kamar.index');
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
        $kamar = Kamar::find($id);
        return view('kamar.edit')->with(compact('kamar')); 
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
         $this->validate($request, [
            'kelas'   => 'required',
            'kode_bed'   => 'required',
            'nama_kamar'   => 'required',
            'tarif'   => 'required',
            'tarif_2'   => 'max:100',
            'tarif_3'   => 'max:100',
            'tarif_4'   => 'max:100',
            'tarif_5'   => 'max:100',
            'tarif_6'   => 'max:100',
            'tarif_7'   => 'max:100',
            'fasilitas'   => 'required',
            'jumlah_bed'   => 'required'
            ]);
        Kamar::where('id', $id) ->update([
            'kelas' => $request->kelas,
            'kode_bed' => $request->kode_bed,
            'nama_kamar' => $request->nama_kamar,
            'tarif' => $request->tarif, 
            'tarif_2' => $request->tarif_2,
            'tarif_3' => $request->tarif_3,
            'tarif_4' => $request->tarif_4,
            'tarif_5' => $request->tarif_5,
            'tarif_6' => $request->tarif_6,
            'tarif_7' => $request->tarif_7,
            'fasilitas' => $request->fasilitas,
            'jumlah_bed' => $request->jumlah_bed,
            'sisa_bed' => $request->jumlah_bed]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Kamar $request->nama_kamar"
            ]);

        return redirect()->route('kamar.index');
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
        if(!Kamar::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Kamar Berhasil Di Hapus"
            ]);
        return redirect()->route('kamar.index');
        }
    }
}
