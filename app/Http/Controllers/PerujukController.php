<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Perujuk;
use Auth;
use Session;

class PerujukController extends Controller
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
            $perujuk = Perujuk::select(['id','nama','alamat','no_telp']);
            return Datatables::of($perujuk)->addColumn('action', function($perujuks){
                    return view('datatable._action', [
                        'model'     => $perujuks,
                        'form_url'  => route('perujuk.destroy', $perujuks->id),
                        'edit_url'  => route('perujuk.edit', $perujuks->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama','style'=>'background-color: #4CAF50; color: white; width: 25%']) 
        ->addColumn(['data' => 'alamat', 'name' => 'alamat', 'title' => 'Alamat','style'=>'background-color: #4CAF50; color: white; width: 25%']) 
        ->addColumn(['data' => 'no_telp', 'name' => 'no_telp', 'title' => 'No Telp','style'=>'background-color: #4CAF50; color: white; width: 25%']) 
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('perujuk.index')->with(compact('html'));
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
            'alamat'   => 'required',
            'no_telp'   => 'required',
            ]);

         $perujuk = Perujuk::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Perujuk $perujuk->nama"
            ]);
        return redirect()->route('perujuk.index');
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
