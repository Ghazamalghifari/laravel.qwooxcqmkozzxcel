@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

<!--Form with header-->
<div class="card">
    <div class="card-block">
   

						{!! Form::model($gudang, ['url' => route('gudang.update', $gudang->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('gudang._form')
						{!! Form::close() !!}
</div>
<!--/Form with header-->
 
			</div>
		</div>
	</div>
	</div>
@endsection
	