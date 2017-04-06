<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Satuan;
use Auth;
use Session;

class SatuanController extends Controller
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
            $satuan = Satuan::select(['id','nama','nama_cetak','dari_satuan','qty']);
            return Datatables::of($satuan)->addColumn('action', function($satuans){
                    return view('datatable._action', [
                        'model'     => $satuans,
                        'form_url'  => route('satuan.destroy', $satuans->id),
                        'edit_url'  => route('satuan.edit', $satuans->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama','style'=>'background-color: #4CAF50; color: white; width: 50%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('satuan.index')->with(compact('html'));
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

         $satuan = Satuan::create([
            'nama' => $request->nama]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Satuan $satuan->nama"
            ]);
        return redirect()->route('satuan.index');
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
        $satuan = Satuan::find($id);
        return view('satuan.edit')->with(compact('satuan')); 
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
        Satuan::where('id', $id) ->update([
            'nama' => $request->nama
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Satuan $request->nama"
            ]);

        return redirect()->route('satuan.index');
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
        if(!Satuan::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Satuan Berhasil Di Hapus"
            ]);
        return redirect()->route('satuan.index');
        }
    }
}
