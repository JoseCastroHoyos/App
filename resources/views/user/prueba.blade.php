@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<legend class="text-center header">Contact us</legend>

@stop

@section('content')
<form style=" width: 50vw; margin-left : 25vw;">
    Enter name:<input type="text"/> <br><br>
    <input type="submit" value="Submit"/>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop