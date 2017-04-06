<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Gudang;
use Auth;
use Session;

class GudangController extends Controller
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
            $gudang = Gudang::select(['id','kode_gudang','nama_gudang','default_set']);
            return Datatables::of($gudang)->addColumn('action', function($gudangs){
                    return view('datatable._action', [
                        'model'     => $gudangs,
                        'form_url'  => route('gudang.destroy', $gudangs->id),
                        'edit_url'  => route('gudang.edit', $gudangs->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'kode_gudang', 'name' => 'kode_gudang', 'title' => 'Kode Gudang','style'=>'background-color: #4CAF50; color: white; width: 35%']) 
        ->addColumn(['data' => 'nama_gudang', 'name' => 'nama_gudang', 'title' => 'Nama Gudang','style'=>'background-color: #4CAF50; color: white; width: 35%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 35%']);

        return view('gudang.index')->with(compact('html'));
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
            'kode_gudang'   => 'required',
            'nama_gudang'   => 'required'
            ]);

         $gudang = Gudang::create([
            'kode_gudang' => $request->kode_gudang,
            'nama_gudang' => $request->nama_gudang]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Gudang $gudang->nama_gudang"
            ]);
        return redirect()->route('gudang.index');
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
        $gudang = Gudang::find($id);
        return view('gudang.edit')->with(compact('gudang')); 
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
            'kode_gudang'   => 'required',
            'nama_gudang'   => 'required'
            ]);
        Gudang::where('id', $id) ->update([
            'kode_gudang' => $request->kode_gudang,
            'nama_gudang' => $request->nama_gudang]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Gudang $request->nama_gudang"
            ]);

        return redirect()->route('gudang.index');
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
        if(!Gudang::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Gudang Berhasil Di Hapus"
            ]);
        return redirect()->route('gudang.index');
        }
    }
}
