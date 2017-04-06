<b>Edit Poli</b><hr>

<div class="form-group{!! $errors->has('kelas') ? 'has-error' : '' !!}"> 
  <label for="kelas_kamar">Kelas Kamar</label>
        {!! Form::select('kelas', []+App\Kelas_kamar::pluck('nama','id')->all(), null, ['class'=>'form-control', 'placeholder' => 'Pilih Kelas Kamar','autocomplete'=>'off', 'required'=>'']) !!}
        {!! $errors->first('kelas', '<p class="help-block">:message</p>') !!}  
</div>

<div class="form-group{{ $errors->has('kode_bed') ? ' has-error' : '' }}">  
  <label for="kode_bed">Kode Kamar </label>
    {!! Form::text('kode_bed', null,['class'=>'form-control','id'=>'kode_bed','autocomplete'=>'off',' style'=>'height: 20px;', 'required'=>'']) !!} 
    {!! $errors->first('kode_bed', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group{{ $errors->has('nama_kamar') ? ' has-error' : '' }}">  
  <label for="nama_kamar">Nama Kamar </label>
    {!! Form::text('nama_kamar', null,['class'=>'form-control','id'=>'nama_kamar','autocomplete'=>'off',' style'=>'height: 20px;', 'required'=>'']) !!} 
    {!! $errors->first('nama_kamar', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group{{ $errors->has('tarif') ? ' has-error' : '' }}">  
  <label for="tarif">Harga 1 </label>
    {!! Form::text('tarif', null,['class'=>'form-control','id'=>'tarif','autocomplete'=>'off',' style'=>'height: 20px;', 'required'=>'']) !!} 
    {!! $errors->first('tarif', '<p class="help-block">:message</p>') !!} 
</div> 

<div class="form-group{{ $errors->has('tarif_2') ? ' has-error' : '' }}">  
  <label for="tarif_2">Harga 2 </label>
    {!! Form::text('tarif_2', null,['class'=>'form-control','id'=>'tarif_2','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
    {!! $errors->first('tarif_2', '<p class="help-block">:message</p>') !!} 
</div>  

<div class="form-group{{ $errors->has('tarif_3') ? ' has-error' : '' }}">  
  <label for="tarif_3">Harga 3 </label>
    {!! Form::text('tarif_3', null,['class'=>'form-control','id'=>'tarif_3','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
    {!! $errors->first('tarif_3', '<p class="help-block">:message</p>') !!} 
</div>  

<div class="form-group{{ $errors->has('tarif_4') ? ' has-error' : '' }}">  
  <label for="tarif_4">Harga 4 </label>
    {!! Form::text('tarif_4', null,['class'=>'form-control','id'=>'tarif_4','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
    {!! $errors->first('tarif_4', '<p class="help-block">:message</p>') !!} 
</div>  

<div class="form-group{{ $errors->has('tarif_5') ? ' has-error' : '' }}">  
  <label for="tarif_5">Harga 5 </label>
    {!! Form::text('tarif_5', null,['class'=>'form-control','id'=>'tarif_5','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
    {!! $errors->first('tarif_5', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group{{ $errors->has('tarif_6') ? ' has-error' : '' }}">  
  <label for="tarif_6">Harga 6 </label>
    {!! Form::text('tarif_6', null,['class'=>'form-control','id'=>'tarif_6','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
    {!! $errors->first('tarif_6', '<p class="help-block">:message</p>') !!} 
</div>

<div class="form-group{{ $errors->has('tarif_7') ? ' has-error' : '' }}">  
  <label for="tarif_7">Harga 7 </label>
    {!! Form::text('tarif_7', null,['class'=>'form-control','id'=>'tarif_7','autocomplete'=>'off',' style'=>'height: 20px;']) !!} 
    {!! $errors->first('tarif_7', '<p class="help-block">:message</p>') !!} 
</div>
 
<div class="form-group{{ $errors->has('fasilitas') ? ' has-error' : '' }}">  
  <label for="fasilitas">Fasilitas </label>
    {!! Form::text('fasilitas', null,['class'=>'form-control','id'=>'fasilitas','autocomplete'=>'off',' style'=>'height: 20px;', 'required'=>'']) !!} 
    {!! $errors->first('fasilitas', '<p class="help-block">:message</p>') !!} 
</div> 

<div class="form-group{{ $errors->has('jumlah_bed') ? ' has-error' : '' }}">  
  <label for="jumlah_bed">Jumlah Bed </label>
    {!! Form::number('jumlah_bed', null,['class'=>'form-control','id'=>'jumlah_bed','autocomplete'=>'off',' style'=>'height: 20px;', 'required'=>'']) !!} 
    {!! $errors->first('jumlah_bed', '<p class="help-block">:message</p>') !!} 
</div>  

<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
