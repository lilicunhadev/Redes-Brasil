<?php

namespace App\Http\Controllers\Cadastros;

use Input;
use App\Parametro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\cadastros\ParametroRequest;


class ParametroController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros = Parametro::paginate(8);
        return view('parametros.index', [
            'parametros' => $parametros,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParametroRequest $request)
    {
        $request->all();
        $parametro = new Parametro;

        $parametro->parametro = mb_strtoupper($request['parametro']);
        $parametro->descricao = mb_strtoupper($request['descricao']);
        $parametro->status = mb_strtoupper($request['status']);

        $parametro->save();

        return redirect()->route('parametros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parametro = Parametro::find($id);
        if ($parametro) {
            return view ('parametros.show', [
                'parametro' => $parametro
            ]);
        }
        return redirect()->route('parametros.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parametro = Parametro::find($id);
        if ($parametro) {

            return view ('parametros.edit', [
                'parametro' => $parametro,
            ]);
        }
        return redirect()->route('parametros.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parametro = Parametro::find($id);

        if ($parametro) {

            $data = $request->only([
                'parametro',
                'descricao',
                'status'
            ]);

            $validator = Validator::make([
                'parametro' => $data['parametro'],
                'descricao' => $data['descricao'],
                'status' => $data['status']
            ], 
            
            [
                'parametro' => ['required', 'string', 'max:50'],
                'descricao' => ['required', 'string', 'max:200'],
                'status' => ['required', 'string', 'max:10']
            ]);


            // Alteração dos dados
            $parametro->parametro = mb_strtoupper($data['parametro']);
            $parametro->descricao = mb_strtoupper($data['descricao']);
            $parametro->status = mb_strtoupper($data['status']);
            
            if(count( $validator->errors()) > 0) {
                return redirect()->route('parametros.edit', [
                    'parametro' => $id
                ])->withErrors($validator);
            }

            $parametro -> save();
        }

        return redirect()->route('parametros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parametro = Parametro::find($id);
        $parametro->delete();

        return redirect()->route('parametros.index');
    }
}
