@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row" align="center">
		<a 
			href=""
			type="button"
			class="btn btn-success">
			Nueva Categoría
		</a>
		<a 
			href=""
			type="button"
			class="btn btn-success">
			Nuevo Chocolate
		</a>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">Chocolates</div>
			<div class="panel-body">
				<div class="row">
					@foreach($chocolates as $c)
						<div class="col-sm-3">
							<h3>{{ $c->nombre }}</h3>
							<p>
								categoría: {{ $c->categoria }} <br>
								marca: {{ $c->marca }} <br>
								<div>
									<a href="{{ url('chocolates/'.$c->id.'/edit') }}"
									class="btn btn-success">
									Editar
									</a>
									{!! Form::open(['url'=>'chocolates/'.$c->id,'method'=>'delete']) !!}
										{!!
											Form::submit('Eliminar',
												['class'=>'btn btn-danger'])
										!!}
									{!! Form:close !!}
								</div>
							</p>
						</div>
					@endforeach
					<div class="row col-sm-12">
						<nav aria-label="Page navigation">
							<ul class="pagintation">
								<li>
									<a href="{{ $chocolates->previousPageUrl() }}"
									aria-label="Previous">
									<span aria=hidden="true">
										&laquo;
									</span>
									</a>
								</li>
								<li>
									<a href="{{ $chocolates->nextPageUrl() }}"
									aria-label="Next">
									<span aria-hidden="true">
										&raquo;
									</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
	
@endsection