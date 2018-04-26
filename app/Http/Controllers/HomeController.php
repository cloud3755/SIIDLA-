<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

use App\Numeros_parte;
use \App\Inventario;
use App\Roles;
use App\Sucursal;
use App\User;
use App\Ubicacion;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function showRegistrationForm()
    {
        $sucursales = new Sucursal();
        $sucursales =  $sucursales->all();
        $roles = Roles::find([2,3]);
        return view('auth.register', \compact('sucursales','roles'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$this->middleware('rol:1,2');
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_sucursal' => $data['id_sucursal'],
            'id_rol' => $data['id_rol'],
            'supervisor' => Auth::User()->id
        ]);
    }

    public function register1(Request $request)
    {
        //dd(Auth::User()->id);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        /*
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());*/
        \Session::flash('Guardado','Se Agrego el usuario correctamente');
        return redirect()->route("register");  
    }
protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
