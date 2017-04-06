@extends('layouts.app')
@section('content')
<style>

tr:nth-child(even){background-color: #f2f2f2}

</style>
<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <h3><b> DATA PERUJUK </b></h3>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"> </i> PERUJUK  </button> <br><br>
      <div class="table-responsive">
       {!! $html->table(['class'=>'table table-bordered table-sm']) !!}  
      </div>
    </div>
  </div>
</div>


<!-- Modal --> 
  <div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Tambah Perujuk</h4>
        </div>
        <div class="modal-body">

        
               {!! Form::open(['url' => route('perujuk.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}

              <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">  
                <label for="nama">Nama </label>
                      {!! Form::text('nama', null,['class'=>'form-control','id'=>'nama','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                      {!! $errors->first('nama', '<p class="help-block">:message</p>') !!} 
              </div>

              <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">  
                <label for="alamat">Alamat </label>
                      {!! Form::text('alamat', null,['class'=>'form-control','id'=>'alamat','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                      {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!} 
              </div>

              <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">  
                <label for="no_telp">No Telp </label>
                      {!! Form::text('no_telp', null,['class'=>'form-control','id'=>'no_telp','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                      {!! $errors->first('no_telp', '<p class="help-block">:message</p>') !!} 
              </div>
                                
          <button id="submit_tmbh" class="btn btn-info"><i class="fa fa-plus"></i> Tambah</button> 
                     {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
{!! $html->scripts() !!}   
@endsection 