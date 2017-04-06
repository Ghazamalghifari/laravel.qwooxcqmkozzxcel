@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

<!--Form with header-->
<div class="card">
    <div class="card-block">
   

						{!! Form::model($kelas_kamar, ['url' => route('kelas_kamar.update', $kelas_kamar->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('kelas_kamar._form')
						{!! Form::close() !!}
</div>
<!--/Form with header-->
 
			</div>
		</div>
	</div>
	</div>
@endsection