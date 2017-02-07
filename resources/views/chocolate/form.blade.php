{!! Form::open(['url'=>$url,'method'=>$method]) !!}
	<div class="form-group">
		{!! Form::label('nombre','Nombre') !!}
		{!! Form::text('nombre',$chocolate->nombre,
						['class'=>'form-control',
						'placeholder'=>'Escribe un nombre']) 
		!!}
		@if($errors->has('nombre'))
			<span class="help-block">
				{{ $errors->first('nombre') }}
			</span>
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('categoria','Categoria') !!}
		<select name="categoria_id" 
				id="categoria"
				class="form-control">
				@foreach($categoria as $c)
					<option value="{{$c->id}}"
					@if($chocolate->categoria_id == $c->id)
						{{'selected'}}
					@endif >
						{{$c->nombre}}
					</option>
				@endforeach		
		</select>
		@if($errors->has('categoria_id'))
			<span class="help-block">
				{{ $errors->first('categoria_id') }}
			</span>
		@endif
	</div>
	<div class="form-group">
		{!! Form::label('marca','Marca') !!}
		{!! Form::text('marca',$chocolate->marca,
						['class'=>'form-control',
						'placeholder'=>'Escribe una marca']) 
		!!}
		@if($errors->has('marca'))
			<span class="help-block">
				{{ $errors->first('marca') }}
			</span>
		@endif
	</div>
	<div class="form-group">
		{!! Form::submit($accion,
			['class'=>'btn btn-primary pull-right'])
		 !!}
	</div>
{!! Form::close() !!}