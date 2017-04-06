<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Jabatan;
use Auth;
use Session;

class JabatanController extends Controller
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
            $jabatan = Jabatan::select(['id','nama','wewenang']);
            return Datatables::of($jabatan)->addColumn('action', function($jabatans){
                    return view('datatable._action', [
                        'model'     => $jabatans,
                        'form_url'  => route('jabatan.destroy', $jabatans->id),
                        'edit_url'  => route('jabatan.edit', $jabatans->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama Jabatan','style'=>'background-color: #4CAF50; color: white; width: 40%']) 
        ->addColumn(['data' => 'wewenang', 'name' => 'wewenang', 'title' => 'Wewenang','style'=>'background-color: #4CAF40; color: white; width: 40%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('jabatan.index')->with(compact('html'));
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
            'wewenang'   => 'max:225'
            ]);

         $jabatan = Jabatan::create([
            'nama' => $request->nama,
            'wewenang' => $request->wewenang]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Jabatan $jabatan->nama"
            ]);
        return redirect()->route('jabatan.index');
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
        $jabatan = Jabatan::find($id);
        return view('jabatan.edit')->with(compact('jabatan')); 
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
            'nama'   => 'required',
            'wewenang'   => 'max:225'
            ]);
        Jabatan::where('id', $id) ->update([
            'nama' => $request->nama,
            'wewenang' => $request->wewenang]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Data Jabatan $request->nama"
            ]);

        return redirect()->route('jabatan.index');
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
        if(!Jabatan::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Jabatan Berhasil Di Hapus"
            ]);
        return redirect()->route('jabatan.index');
        }
    }
}
