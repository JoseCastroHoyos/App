@extends('adminlte::page')

@section('title', 'Editar Usuario')


@section('content_header')
    <h1>EDITAR USUARIOS</h1>
    <!--Mensaje de alerta de validacion de campos vacios -->
	@if(count($errors)>0)
	<div class="alert alert-danger" role="alert"> 
	<ul>
	@foreach($errors->all() as $error)
	<li> {{ $error }} </li>
	@endforeach
	</ul>
	</div>
	@endif
 <!--Fin -->
@stop

@section('content')
<form action="/users/{{$users->id}}" method="POST">
    @csrf
    @method('PUT')
    <div  class="mb-3">
        <label for="" class="from-label">Codigo de Usuario</label>
        <input  id="codigo_usu"  name='codigo_usu' type readonly ="text"    class="form-control" required=""  value="{{ $users->codigo_usuario }}">
        </div>
    <div  class="mb-3">
        <label for="" class="from-label">Nombre</label>
        <input  id="nombre"  name='nombre' type ="text"    class="form-control" required="" pattern="[a-zA-Z áéíóúñ]+" value="{{ $users->nombre }}">
        </div>
        <div  class="mb-3">
          <label for="" class="from-label">Apellido</label>
          <input  id="apellido"  name='apellido' type ="text"    class="form-control" required="" pattern="[a-zA-Z áéíóúñ]+" value="{{ $users->apellido }}">
          </div>
          <div  class="mb-3">
            <label for="" class="from-label">Dni</label>
            <input  id="dni"  name='dni' type ="text"    class="form-control" maxlength="8" pattern="[0-9]+" value="{{ $users->dni }}">
            </div>
        
        <div  class="mb-3">
        <label for="">Area</label>
        <select id="tipo_user" name='tipo_user' class="form-control" value="{{ $users->tipo_usuario }}"  >
            <option value="Administrador"{{$users->tipo_usuario=="Administrador" ? 'selected' : ''}}>Administrador</option>
            <option value="Contabilidad"{{$users->tipo_usuario=="Contabilidad" ? 'selected' : ''}}>Contabilidad</option>
          </select>
        </div>

        <div  class="mb-3">
            <label for="">Celular</label>
                <input id="celular"  name='celular' type ="text" maxlength="9" pattern="[0-9]+"  class="form-control" value="{{ $users->celular }}">
                </div>

        <div  class="mb-3">
        <label for="">Contraseña</label>
        <input id="password" name='password' type ="password"  class="form-control" value="">
        </div>
        
        <a href="/users" class="btn btn-secondary" tabindex="9">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="10">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop