<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Cito;
use Auth;
use Session;

class CitoController extends Controller
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
            $cito = Cito::select(['id','nama']);
            return Datatables::of($cito)->addColumn('action', function($citos){
                    return view('datatable._action', [
                        'model'     => $citos,
                        'form_url'  => route('cito.destroy', $citos->id),
                        'edit_url'  => route('cito.edit', $citos->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama','style'=>'background-color: #4CAF50; color: white; width: 50%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('cito.index')->with(compact('html'));
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

         $cito = Cito::create([
            'nama' => $request->nama]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Cito $cito->nama"
            ]);
        return redirect()->route('cito.index');
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
        $cito = Cito::find($id);
        return view('cito.edit')->with(compact('cito')); 
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
        Cito::where('id', $id) ->update([
            'nama' => $request->nama
            ]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Cito $request->nama"
            ]);

        return redirect()->route('cito.index');
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
        if(!Cito::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Cito Berhasil Di Hapus"
            ]);
        return redirect()->route('cito.index');
        }
    }
}
