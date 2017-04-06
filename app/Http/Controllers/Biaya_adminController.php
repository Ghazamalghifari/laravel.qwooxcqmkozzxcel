<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Biaya_admin;
use Auth;
use Session;

class Biaya_adminController extends Controller
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
            $biaya_admin = Biaya_admin::select(['id','nama','persentase']);
            return Datatables::of($biaya_admin)->addColumn('action', function($biaya_admins){
                    return view('biaya_admin._action', [
                        'model'     => $biaya_admins,
                        'form_url'  => route('biaya_admin.destroy', $biaya_admins->id),
                        'edit_url'  => route('biaya_admin.edit', $biaya_admins->id) 
                        ]);
                })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name' => 'nama', 'title' => 'Nama','style'=>'background-color: #4CAF50; color: white; width: 40%'])
        ->addColumn(['data' => 'persentase', 'name' => 'persentase', 'title' => 'Persentase','style'=>'background-color: #4CAF50; color: white; width: 40%'])  
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Pilih', 'orderable' => false, 'searchable'=>false,'style'=>'background-color: #4CAF50; color: white; width: 50%']);

        return view('biaya_admin.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('biaya_admin.create');
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
            'persentase'     => 'required'
            ]);

         $biaya_admin = Biaya_admin::create([
            'nama' => $request->nama,
            'persentase' =>$request->persentase]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menambah Data Biaya Admin $biaya_admin->nama"
            ]);
        return redirect()->route('biaya_admin.index');
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
        $biaya_admins = Biaya_admin::find($id);
        return view('biaya_admin.edit')->with(compact('biaya_admins')); 
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
      $id_user = Auth::user()->id;
         $this->validate($request, [
            'nama'   => 'required',
            'persentase'     => 'required'
            ]);
        Biaya_admin::where('id', $id) ->update([
            'nama' => $request->nama,
            'persentase' =>$request->persentase]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Mengubah Kontak $request->nama"
            ]);

        return redirect()->route('biaya_admin.index');
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
        if(!Biaya_admin::destroy($id)) 
        {
            return redirect()->back();
        }
        else{
        Session:: flash("flash_notification", [
            "level"=>"success",
            "message"=>"Biaya Admin Berhasil Di Hapus"
            ]);
        return redirect()->route('biaya_admin.index');
        }
    }
}
