@extends('layouts.app')
@section('content')
<style>

tr:nth-child(even){background-color: #f2f2f2}

</style>
<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <h3><b> DATA KATEGORI </b></h3>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"> </i> KATEGORI  </button> <br><br>
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
          <h4 class="modal-title">Tambah Kategori Item </h4>
        </div>
        <div class="modal-body">

        
               {!! Form::open(['url' => route('kategori.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}

              <div class="form-group{{ $errors->has('nama_kategori') ? ' has-error' : '' }}">  
                <label for="nama_kategori">Nama Kategori </label>
                      {!! Form::text('nama_kategori', null,['class'=>'form-control','id'=>'nama_kategori','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                      {!! $errors->first('nama_kategori', '<p class="help-block">:message</p>') !!} 
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