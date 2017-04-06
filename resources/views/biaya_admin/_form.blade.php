<b>Edit Biaya Admin</b><hr>

<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">  
<div class="col-sm-6">
  <label for="nama">Nama </label>
        {!! Form::text('nama', null,['class'=>'form-control','id'=>'nama','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!} 
</div>
</div>

<div class="form-group{{ $errors->has('persentase') ? ' has-error' : '' }}">  
<div class="col-sm-6">
  <label for="persentase">persentase </label>
        {!! Form::number('persentase', null,['class'=>'form-control','id'=>'persentase','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
        {!! $errors->first('persentase', '<p class="help-block">:message</p>') !!} 
</div>
</div>

<div class="col-sm-6">
        </div>
        {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-sm']) !!} 