
application/x-httpd-php AdminController.php ( PHP script text )

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Produto;
use App\Admin;
use App\Statu;
use App\Vendedore;


class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

    public function index() {
    	$comisparc = Cliente::all();
        $comisparcprod = Produto::all();
        $comisparcstat = Statu::all();
        return view('vendedor', compact('comisparc','comisparcprod','comisparcstat'));
    }

    public function comissaoparceiro()
    {
        $comisparc = Cliente::all();
        $comisparcprod = Produto::all();
        $comisparcstat = Statu::all();
        return view('comissoesparceiros', compact('comisparc','comisparcprod','comisparcstat'));
    }

    public function comissao()
    {
        $comis = Cliente::all();
        $comisprod = Produto::all();
        $comisparc = Admin::all();
        return view('admin', compact('comis','comisprod','comisparc'));
    }

    public function inicial()
    {
        $adms = Admin::where('admin', 'Não')->get();
        return view('vendedores', compact('adms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novovendedores');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adms = new Admin();
        $adms->name = $request->input('nomeVendedores');
        $adms->email = $request->input('emailVendedores');
        $adms->password = $request->input('senhaVendedores');
        $adms->password = \Hash::make($adms->password);
        $adms->age = 30;
        $adms->admin = 'Não';
        $adms->save();
        return redirect('/vendedores');
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
        $adms = Admin::find($id);
        if(isset($adms)) {
            return view('editarvendedores', compact('adms'));
        }
        return redirect('/vendedores');
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
        $adms = Admin::find($id);
        if(isset($adms)) {
            $adms->name = $request->input('nomeVendedores');
            $adms->email = $request->input('emailVendedores');
            $password = $adms->password; 
            $adms->password = $request->input('senhaVendedores');
            if($password == $adms->password) {
                $adms->password = $adms->password;
            }
            else {
                $adms->password = \Hash::make($adms->password);
            }
            $adms->age = 30;
            $adms->admin = 'Não';
            $adms->save();
        }
        return redirect('/vendedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adms = Admin::find($id);
        if (isset($adms)) {
            $adms->delete();
        }
        return redirect('/vendedores');
    }
}

