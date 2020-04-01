<?php

namespace App\Http\Controllers\Cadastros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modulo;
use App\Http\Requests\cadastros\ModuloRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Input;

class ModuloController extends Controller
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
        $modulos = Modulo::paginate(8);
        return view('modulos.index', [
            'modulos' => $modulos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuloRequest $request)
    {
        $request->all();
        $modulo = new Modulo;

        $modulo->nome = mb_strtoupper($request['nome']);
        $modulo->modalidade = mb_strtoupper($request['modalidade']);
        $modulo->oficial = mb_strtoupper($request['oficial']);
        $modulo->horas = mb_strtoupper($request['horas']);
        $modulo->prova_cert = mb_strtoupper($request['prova_cert']);
        $modulo->valor_sugerido = mb_strtoupper($request['valor_sugerido']);
        $modulo->max_alunos = mb_strtoupper($request['max_alunos']);
        $modulo->observacao = mb_strtoupper($request['observacao']);

        $modulo->save();

        return redirect()->route('modulos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modulo = Modulo::find($id);
        if ($modulo) {
            return view ('modulos.show', [
                'modulo' => $modulo
            ]);
        }
        return redirect()->route('modulos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modulo = Modulo::find($id);
        if ($modulo) {

            return view ('modulos.edit', [
                'modulo' => $modulo,
            ]);
        }
        return redirect()->route('modulos.index');
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
        $modulo = Modulo::find($id);

        if ($modulo) {

            $data = $request->only([
                'nome',
                'modalidade',
                'oficial',
                'horas',
                'prova_cert',
                'valor_sugerido',
                'max_alunos',
                'observacao'
            ]);

            $validator = Validator::make([
                'nome' => $data['nome'],
                'modalidade' => $data['modalidade'],
                'oficial' => $data['oficial'],
                'horas' => $data['horas'],
                'prova_cert' => $data['prova_cert'],
                'valor_sugerido' => $data['valor_sugerido'],
                'max_alunos' => $data['max_alunos']
            ], 
            
            [
                'nome' => ['required', 'string', 'max:50'],
                'modalidade' => ['required', 'string', 'max:20'],
                'oficial' => ['required', 'string', 'max:10'],
                'horas' => ['required', 'string', 'max:10'],
                'prova_cert' => ['required', 'string', 'max:10'],
                'valor_sugerido' => ['required', 'string', 'max:20'],
                'max_alunos' => ['required', 'string', 'max:10']
            ]);


            // Alteração dos dados
            $modulo->nome = mb_strtoupper($data['nome']);
            $modulo->modalidade = mb_strtoupper($data['modalidade']);
            $modulo->oficial = mb_strtoupper($data['oficial']);
            $modulo->horas = mb_strtoupper($data['horas']);
            $modulo->prova_cert = mb_strtoupper($data['prova_cert']);
            $modulo->valor_sugerido = mb_strtoupper($data['valor_sugerido']);
            $modulo->max_alunos = mb_strtoupper($data['max_alunos']);
            $modulo->observacao = mb_strtoupper($data['observacao']);
            
            if(count( $validator->errors()) > 0) {
                return redirect()->route('modulos.edit', [
                    'modulo' => $id
                ])->withErrors($validator);
            }

            $modulo -> save();
        }

        return redirect()->route('modulos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulo = Modulo::find($id);
        $modulo->delete();

        return redirect()->route('modulos.index');
    }

    public function search(Request $request) {
        
        return view('modulos.index')
            ->with('modulos', $modulos);
    }
}
