<b>Edit Kategori Item</b><hr>

<div class="form-group{{ $errors->has('nama_kategori') ? ' has-error' : '' }}">  
<div class="col-sm-6">
  <label for="nama_kategori">Nama Kategori</label>
        {!! Form::text('nama_kategori', null,['class'=>'form-control','id'=>'nama_kategori','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
        {!! $errors->first('nama_kategori', '<p class="help-block">:message</p>') !!} 
</div>
</div>
  
        {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-sm']) !!} 