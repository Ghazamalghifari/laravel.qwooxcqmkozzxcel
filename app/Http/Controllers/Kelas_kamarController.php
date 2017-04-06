<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Kelas_kamar;
use Auth;
use Session;

class Kelas_kamarController extends Controller
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
            $kelas_kamar = Kelas_kamar::select(['id','nama']);
            return Datatables::of($kelas_kamar)->addColumn('action', function($kelas_kamars){
                    return view('datatable._action', [
                        'model'     => $kelas_kamars,
                        'form_url'  => route('kelas_kamar.destroy', $kelas_kamars->id),
                        'edit_url'  => route('kelas_kamar.edit', $kelas_kamars->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama','style'=>'background-color: #4CAF50; color: white; width: 50%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('kelas_kamar.index')->with(compact('html'));
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
            'nama'   => 'required',
            ]);

         $kelas_kamar = Kelas_kamar::create([
            'nama' => $request->nama]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Kelas kamar $kelas_kamar->nama"
            ]);
        return redirect()->route('kelas_kamar.index');
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
        $kelas_kamar = Kelas_kamar::find($id);
        return view('kelas_kamar.edit')->with(compact('kelas_kamar')); 
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
            'nama'   => 'required'
            ]);
        Kelas_kamar::where('id', $id) ->update([
            'nama' => $request->nama
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Kelas Kamar $request->nama"
            ]);

        return redirect()->route('poli.index');
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
        if(!Kelas_kamar::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Kelas Kamar Berhasil Di Hapus"
            ]);
        return redirect()->route('kelas_kamar.index');
        }
    }
}
