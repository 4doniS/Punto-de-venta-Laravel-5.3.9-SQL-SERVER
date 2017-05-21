@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h3>Editar Usuario:  {{ $usuario->name}}</h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">			
			@foreach ($errors->all() as $error)
				<strong> {{$error}} </strong>
			@endforeach			
		</div>
		@endif
		{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id]])!!}
		{{Form::token()}}
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="">Nombre</label>

                            <div class="form-group">
                                <input id="" type="text" class="form-control" name="name" value="{{ $usuario->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="">E-Mail</label>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="">Password</label>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="">Confirmar Password</label>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
							<button type="submit" class="btn btn-primary">Guardar</button>
							<button type="reset" class="btn btn-danger">Cancelar</button>
						</div>
			</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection