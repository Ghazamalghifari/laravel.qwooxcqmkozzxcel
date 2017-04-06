@extends('layouts.app')
@section('content')
<style>

tr:nth-child(even){background-color: #f2f2f2}

</style>
<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <h3><b> DATA JABATAN </b></h3>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"> </i> JABATAN  </button> <br><br>
      <div class="table-responsive">
       {!! $html->table(['class'=>'table table-bordered table-sm']) !!}  
      </div>
    </div>
  </div>
</div>


<!-- Modal tambah data -->
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Jabatan</h4>
      </div>
    <div class="modal-body">

        
               {!! Form::open(['url' => route('jabatan.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}

              <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">  
                <label for="nama">Nama Jabatan </label>
                      {!! Form::text('nama', null,['class'=>'form-control','id'=>'nama','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                      {!! $errors->first('nama', '<p class="help-block">:message</p>') !!} 
              </div>
                              
              <div class="form-group{{ $errors->has('wewenang') ? ' has-error' : '' }}">  
                <label for="wewenang">Wewenang </label>
                      {!! Form::text('wewenang', null,['class'=>'form-control','id'=>'wewenang','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                      {!! $errors->first('wewenang', '<p class="help-block">:message</p>') !!} 
              </div>   
          <button type="submit" id="submit_tambah" class="btn btn-success">Submit</button>
                     {!! Form::close() !!} 

          
  </div><!-- end of modal body -->

          <div class ="modal-footer">
          <button type ="button"  class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
  </div>
  </div>

</div><!-- end of modal buat data  -->


 


@endsection

@section('scripts')
{!! $html->scripts() !!}   
@endsection 