<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Reserva;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user->rol == 'empleado'){
            return redirect('reservas');
        }
        $cliente_id = Cliente::where('user_id', $user->id)->first()->id;
        $reservas = Reserva::where('cliente_id',$cliente_id);

        $data = ['user' => $user, 'reservas' =>$reservas ];
        return view('home')->with($data);
    }
}
