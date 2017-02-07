@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="panel-body">
				@include('chocolate.form',
				['url'=>'/chocolates',
				'method' => 'POST',
				'chocolates'=>$chocolates,
				'accion'=>'Guardar'
				])
			</div>
		</div>
	</div>
@endsection