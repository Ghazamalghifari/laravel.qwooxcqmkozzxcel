@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">

<!--Form with header-->
<div class="card">
    <div class="card-block">
   

						{!! Form::model($biaya_admins, ['url' => route('biaya_admin.update', $biaya_admins->id), 'method' => 'put', 'files'=>'true','class'=>'form-horizontal']) !!}
						@include('biaya_admin._form')
						{!! Form::close() !!}
</div>
<!--/Form with header-->
 
			</div>
		</div>
	</div>
	</div>
@endsection
	