<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use App\Bancario;


class BancariosController extends Controller
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

	public function index(){
		return view('novodadosbancarios');
	}

	public function show(Request $request) {
		$beneficio = $request->input('numeroBeneficios');
        $bancarios = Bancario::where('beneficio', $beneficio)->get();        
        //dd($bancarios);
        return view('verdadosbancarios', compact('bancarios'));
    }
}
