@extends('layouts.app')
@section('content')
<style>

tr:nth-child(even){background-color: #f2f2f2}

</style>
<div class="container">
  <div class="row">
    <div class="col-md-12"> 
      <h3><b> DATA KELAS KAMAR </b></h3>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-plus"> </i> KELAS KAMAR  </button> <br><br>
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
        <h4 class="modal-title"><center><b>Tambah Kelas Kamar</b></center></h4>
      </div>
      <div class="modal-body">

          
                 {!! Form::open(['url' => route('kelas_kamar.store'),'method' => 'post', 'class'=>'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">  
                  <label for="nama">Nama Kelas </label>
                        {!! Form::text('nama', null,['class'=>'form-control','id'=>'nama','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
                        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!} 
                </div>
            <button type="submit" id="submit_tambah" class="btn btn-success">Submit</button>
                       {!! Form::close() !!} 

           

    </div><!-- end of modal body -->

          <div class ="modal-footer">
          <button type ="button"  class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
  </div>
  </div>

</div>
<!-- end of modal Tambah data  -->
 


@endsection

@section('scripts')
{!! $html->scripts() !!}   
@endsection 