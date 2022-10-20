<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion de datos permite validar si las cajas de texto estan llenas
        // para realizar el guardado de los datos a la BD
        $campos=[
            'nombre'=>'required|String|max:100',
            'apellido'=>'required|String|max:100',
            'dni'=>'required|String|max:20|unique:users',
            'tipo_user'=>'required|String|max:20',
            'celular'=>'required|String|max:100|unique:users',
            'password'=>'required|String|max:100',
            'imagen'=>'required|imagen|mimes:jpg,png,svg|max:1024',
          
    ];
    $mensaje=[
        'required'=>'Completar :attribute es requerido',
        'dni.unique'=>'Este N° Dni se encuantra registrado',
        'celular.unique'=>'Este N° Celular se encuantra registrado'
    ];
    $this->validate($request,$campos,$mensaje);
    //fin
    $users = new User();
    $users->nombre = $request->get('nombre');
    $users->apellido = $request->get('apellido');
    $users->dni = $request->get('dni');
    $users->tipo_usuario = $request->get('tipo_user');
    $users->celular = $request->get('celular');
    $users->password =Hash::make($request->get('password'));
    if($request->hasFile('imagen')){
        $imagen= $request->file('imagen');
        $nombreimagen = date('YmdHis'). "." .$imagen->getClientOriginalExtension();
        $ruta = public_path('imagenes/');
        $imagen->move($ruta,$nombreimagen);
        $users->imagen= $nombreimagen;
    }
    $users->save();
    $users->codigo_usuario = "GB-".str_pad($users->id,3,0,STR_PAD_LEFT);
    $users->update();
    return redirect('users')->with('guardar', 'ok');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edit')->with('users',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Validacion de datos permite validar si las cajas de texto estan llenas
        // para realizar el guardado de los datos a la BD
        $campos=[
            'nombre'=>'required|String|max:100',
            'apellido'=>'required|String|max:100',
            'dni'=>'required|String|max:20|unique:users,dni,'.$id,
            'tipo_user'=>'required|String|max:20',
            'celular'=>'required|String|max:100|unique:users,celular,'.$id,
          
    ];
    $mensaje=[
        'required'=>'Complete :attribute es requerido',
        'dni.unique'=>'Este N° Dni se encuantra registrado',
        'celular.unique'=>'Este N° Celular se encuantra registrado'
    ];
    $this->validate($request,$campos,$mensaje);
    //fin

        $users = User::find($id);
        $users->codigo_usuario = $request->get('codigo_usu');
        $users->nombre = $request->get('nombre');
        $users->apellido = $request->get('apellido');
        $users->dni = $request->get('dni');
        $users->tipo_usuario = $request->get('tipo_user');
        $users->celular = $request->get('celular');
        //$usuarios->password = $request->get('contraseña');

        if($request->filled('password')){
            $users->password= Hash::make($request->get('password'));
        }


        $users->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/users')->with('eliminar', 'ok');
    }
}
