{!! Form::model($model, ['url' => $form_url,'method'=>'delete']) !!}
<a href="{{ $edit_url }}" class="btn btn-sm btn-primary">Edit</a> |
{!! Form::button('Hapus',['class'=>'btn btn-sm btn-danger','data-toggle'=>'modal','data-target'=>'#modal-delete']) !!}
   <!-- Modal Untuk Confirm Delete-->
<div id="modal-delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>       
    </div>
    <div class="modal-body">
      <center><h4>Apakah Anda Yakin Ingin Menghapus Data Ini ?</h4></center>
      <input type="hidden" id="id2" name="id2">
    </div>
    <div class="modal-footer">
        <button type="submit" data-id="" class="btn btn-success" id="yesss" >Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
    </div>
    </div>
  </div>
</div>
<!--modal end Confirm Delete-->
{!! Form::close() !!}
