<b>Edit Kelas Kamar</b><hr>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">  
<div class="col-sm-6">
  <label for="nama">Nama </label>
        {!! Form::text('nama', null,['class'=>'form-control','id'=>'nama','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!} 
</div>
</div>
  
        {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-sm']) !!} 