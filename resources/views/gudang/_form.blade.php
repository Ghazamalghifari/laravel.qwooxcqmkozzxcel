<b>Edit Gudang</b><hr>

<div class="form-group{{ $errors->has('kode_gudang') ? ' has-error' : '' }}">  
<div class="col-sm-6">
  <label for="kode_gudang">Kode Gudang </label>
        {!! Form::text('kode_gudang', null,['class'=>'form-control','id'=>'kode_gudang','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
        {!! $errors->first('kode_gudang', '<p class="help-block">:message</p>') !!} 
</div>
</div>

<div class="form-group{{ $errors->has('nama_gudang') ? ' has-error' : '' }}">  
<div class="col-sm-6">
  <label for="nama_gudang">Nama Gudang </label>
        {!! Form::text('nama_gudang', null,['class'=>'form-control','id'=>'nama_gudang','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
        {!! $errors->first('nama_gudang', '<p class="help-block">:message</p>') !!} 
</div>
</div>

<div class="col-sm-6">
        </div>
        {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-sm']) !!} 