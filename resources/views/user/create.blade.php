@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1 style=" width: 32vw; margin-left : 32vw;">
		<strong>
			Registro de Usuarios
		</strong>
		</h1>
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
<form action="{{route ('users.store')}}" method="POST" class="d-inline formulario-guardar">
	@csrf
	

	  </div>
						<div style=" width: 50vw; margin-left : 25vw;" class="mb-3">
							<label for="" class="from-label">Nombre</label>
							<div class="col-md-8">
							<input  id="nombre"  name='nombre' type ="text"    class="form-control" required="" pattern="[a-zA-Z áéíóúñ]+" tabindex="2">
							</div>
						</div>

							<div style=" width: 50vw; margin-left : 25vw;" class="mb-3">
								<label for="" class="from-label">Apellido</label>
								<div class="col-md-8">
								<input  id="apellido"  name='apellido' type ="text"    class="form-control" required="" pattern="[a-zA-Z áéíóúñ]+" tabindex="3">
								</div>
							</div>

								<div style=" width: 50vw; margin-left : 25vw;" class="mb-3">
									<label for="">Dni</label>
									<div class="col-md-8">
									<input id="dni" name='dni' type ="text" maxlength="8" pattern="[0-9]+"  class="form-control" tabindex="4" >
									</div>
								</div>

								<div style=" width: 50vw; margin-left : 25vw;" class="mb-3">
										<label for="">Tipo de Usuario</label>
										<div class="col-md-8">
										<select id="tipo_user" name='tipo_user' class="form-control" tabindex="5" >
										  <option value="">
											----Selecciona------
										  </option>
										  <option value="Administrador">
											Administrador
										  </option>
										  <option value="Contabilidad">
											Contabilidad
										  </option>
										</select>
									</div>
								</div>

						<div  style=" width: 50vw; margin-left : 25vw;"class="mb-3">
							  <label for="">Celular</label>
							  <div class="col-md-8">
							  <input id="celular" name='celular' type ="text"   maxlength="9"  pattern="[0-9]+" class="form-control" tabindex="6" >
							  </div>
						</div>

							<div  style=" width: 50vw; margin-left : 25vw;"class="mb-3"> 
								<label for="">Contraseña</label>
								<div class="col-md-8">
								<input id="password" name='password' type ="password"   class="form-control"  tabindex="7" >
							    </div>	
							</div>

								<div style=" width: 50vw; margin-left : 25vw;"class="flex flex-col mb-4">
									<label for="">Foto</label>
									<div class="col-md-8">
									<input class="form-control-file" type="file" name="imagen" >
								 </div>
								</div>
								
								<button  class="btn btn-info" tabindex="9" style=" width: 33vw; margin-left : 25vw;" >Guardar</button>
                                  <p></p>
								<a  href="/users" class="btn btn-secondary "  tabindex="8" style=" width: 33vw; margin-left : 25vw;">Cancelar</a>
								
						    
							
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('guardar') == 'ok')
<script>
    Swal.fire(
      '¡Eliminado!',
      'Los datos fueron guardados',
      'success')
</script>
@endif
<script>
  $('.formulario-guardar').submit(function(e){
    e.preventDefault();
  Swal.fire({
  title: '¿Estas seguro que deseas Guardar?',
  text: "¡Los dastos se guardaran!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Guardar'
}).then((result) => {
  if (result.isConfirmed) {
    /*Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )*/
    this.submit();
  }
})
});
 
</script>

@stop
