<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Jenis_obat;
use Auth;
use Session;

class Jenis_obatController extends Controller
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
            $jenis_obat = Jenis_obat::select(['id','nama']);
            return Datatables::of($jenis_obat)->addColumn('action', function($jenis_obats){
                    return view('datatable._action', [
                        'model'     => $jenis_obats,
                        'form_url'  => route('jenis_obat.destroy', $jenis_obats->id),
                        'edit_url'  => route('jenis_obat.edit', $jenis_obats->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama','style'=>'background-color: #4CAF50; color: white; width: 50%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('jenis_obat.index')->with(compact('html'));
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

         $jenis_obat = Jenis_obat::create([
            'nama' => $request->nama]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Jenis_obat $jenis_obat->nama"
            ]);
        return redirect()->route('jenis_obat.index');
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
        $jenis_obat = Jenis_obat::find($id);
        return view('jenis_obat.edit')->with(compact('jenis_obat')); 
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
        Jenis_obat::where('id', $id) ->update([
            'nama' => $request->nama
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Jenis Obat $request->nama"
            ]);

        return redirect()->route('jenis_obat.index');
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
        if(!Jenis_obat::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Jenis Obat Berhasil Di Hapus"
            ]);
        return redirect()->route('jenis_obat.index');
        }
    }
}
