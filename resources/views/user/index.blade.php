@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>USUARIOS REGISTRADOS</h1>
@stop

@section('content')
<a href="users/create" class="btn btn-primary"  >Registrar Nuevo Usuario</a>
<hr>
</hr>
<table id="users" class="table table-striped table-bordered shadow-lg mt-a" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Tipo de Usuario</th>
            <th scope="col">Dni</th>
            <th scope="col">Celular</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
            <tbody>
                @foreach ($users as $usu)
                <tr>
                    <td> {{$usu->codigo_usuario}}</td>
                    <td> {{$usu->nombre}}</td>
                    <td> {{$usu->apellido}}</td>
                    <td>{{ $usu->tipo_usuario}}</td>
                    <td> {{$usu->dni}}</td>
                    <td>{{ $usu->celular}}</td>
                    <td>{{ $usu->imagen}}</td>
                    <td>
                        <a href="/users/{{$usu->id}}/edit" class="btn btn-info">Editar</a>
                        <form action="{{route ('users.destroy',$usu->id)}}" class="d-inline formulario-eliminar" method="POST">
                        @method('DELETE')
                        @csrf
                        <hr>
                        <button class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
        
                    </tr>        
                
                @endforeach
            </tbody>      
       
   
</table>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
    $('#users').DataTable({
        "lengthMenu":[[5, 10, 50, -1],[5, 10, 50, "All"]]
    });
});
</script>

@if(session('eliminar') == 'ok')
<script>
    Swal.fire(
      '¡Eliminado!',
      'Los datos fueron eliminados',
      'success')
</script>
@endif
<script>
  $('.formulario-eliminar').submit(function(e){
    e.preventDefault();
  Swal.fire({
  title: '¿Estas seguro que deseas eliminar?',
  text: "¡Los dastos se eliminaran!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminar'
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