<?php

namespace App\Http\Controllers\Cadastros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Curso;
use App\Http\Requests\cadastros\CursoRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\State;
use App\City;
use App\Modulo;
use App\Instrutor;
use Input;

class CursoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function buscarMunicipios() {
        $estado_id = \Request::input('estado_id');
        $cidades = State::findOrFail($estado_id)->cities->sortBy('title');
        $result = json_encode(['cidades'=>$cidades]);

        return response()->json($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::paginate(8);
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();
        $cities=City::all();
        $modulos=Modulo::all();
        $instrutores=Instrutor::all();
        return view('cursos.create',compact('states', 'cities', 'modulos', 'instrutores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $request->all();
        $curso = new Curso;

        $curso->ano = mb_strtoupper($request['ano']);
        $curso->mes = mb_strtoupper($request['mes']);
        $curso->dia = mb_strtoupper($request['dia']);
        $curso->agenda_treinamento = mb_strtoupper($request['agenda_treinamento']);
        $curso->nome = mb_strtoupper($request['nome']);
        $curso->qtde_dias = mb_strtoupper($request['qtde_dias']);
        $curso->cidade = mb_strtoupper($request['cidade']);
        $curso->uf = mb_strtoupper($request['uf']);
        $curso->local = mb_strtoupper($request['local']);
        $curso->instrutor = mb_strtoupper($request['instrutor']);
        $curso->modulo = mb_strtoupper($request['modulo']);
        $curso->modalidade = mb_strtoupper($request['modalidade']);
        $curso->max_alunos = mb_strtoupper($request['max_alunos']);
        $curso->inscritos = mb_strtoupper($request['inscritos']);
        $curso->confirmados = mb_strtoupper($request['confirmados']);
        $curso->pago = mb_strtoupper($request['pago']);
        $curso->refaca = mb_strtoupper($request['refaca']);
        $curso->cortesia = mb_strtoupper($request['cortesia']);
        $curso->finalizado = mb_strtoupper($request['finalizado']);
        $curso->observacao = mb_strtoupper($request['observacao']);
        $curso->campanhas_ativas = mb_strtoupper($request['campanhas_ativas']);
        $curso->inicio = mb_strtoupper($request['inicio']);

        $curso->save();

        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
        if ($curso) {
            return view ('cursos.show', [
                'curso' => $curso
            ]);
        }
        return redirect()->route('cursos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);

        if ($curso) {
            $states=State::all();
            $cities=$curso->state->cities;

            return view ('cursos.edit', [
                'curso' => $curso,
                'states' => $states,
                'cities' => $cities
            ]);
        }
        return redirect()->route('cursos.index');
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
        $curso = Curso::find($id);

        if ($curso) {

            $data = $request->only([
                'ano',
                'mes',
                'dia',
                'agenda_treinamento',
                'nome',
                'qtde_dias',
                'cidade',
                'uf',
                'local',
                'instrutor',
                'modulo',
                'modalidade',
                'max_alunos',
                'inscritos',
                'confirmados',
                'pago',
                'refaca',
                'cortesia',
                'finalizado',
                'observacao',
                'campanhas_ativas',
                'inicio'
            ]);

            $validator = Validator::make([
                'ano' => $data['ano'],
                'mes' => $data['mes'],
                'dia' => $data['dia'],
                'agenda_treinamento' => $data['agenda_treinamento'],
                'nome' => $data['nome'],
                'qtde_dias' => $data['qtde_dias'],
                'cidade' => $data['cidade'],
                'uf' => $data['uf'],
                'local' => $data['local'],
                'instrutor' => $data['instrutor'],
                'modulo' => $data['modulo'],
                'modalidade' => $data['modalidade'],
                'max_alunos' => $data['max_alunos'],
                'inscritos' => $data['inscritos'],
                'confirmados' => $data['confirmados'],
                'pago' => $data['pago'],
                'refaca' => $data['refaca'],
                'cortesia' => $data['cortesia'],
                'finalizado' => $data['finalizado'],
                'observacao' => $data['observacao'],
                'campanhas_ativas' => $data['campanhas_ativas'],
                'inicio' => $data['inicio']
            ], 
            
            [
                'ano' => ['required', 'string', 'max:6'],
                'mes' => ['required', 'string', 'max:4'],
                'dia' => ['required', 'string', 'max:4'],
                'agenda_treinamento' => ['required', 'string', 'max:50'],
                'nome' => ['required', 'string', 'max:50'],
                'qtde_dias' => ['required', 'string', 'max:5'],
                'cidade' => ['required', 'string', 'max:50'],
                'uf' => ['required', 'string', 'max:5'],
                'local' => ['required', 'string', 'max:50'],
                'instrutor' => ['required', 'string', 'max:50'],
                'modulo' => ['required', 'string', 'max:50'],
                'modalidade' => ['required', 'string', 'max:20'],
                'max_alunos' => ['required', 'string', 'max:5'],
                'inscritos' => ['required', 'string', 'max:5'],
                'confirmados' => ['required', 'string', 'max:5'],
                'pago' => ['required', 'string', 'max:5'],
                'refaca' => ['required', 'string', 'max:5'],
                'cortesia' => ['required', 'string', 'max:5'],
                'finalizado' => ['required', 'string', 'max:10'],
                //'observacao' => ['required', 'string', 'max:50'],
                'campanhas_ativas' => ['required', 'string', 'max:50'],
                'inicio' => ['required', 'string', 'max:20'],
            ]);


            // Alteração dos dados
            $curso->ano = mb_strtoupper($request['ano']);
            $curso->mes = mb_strtoupper($request['mes']);
            $curso->dia = mb_strtoupper($request['dia']);
            $curso->agenda_treinamento = mb_strtoupper($request['agenda_treinamento']);
            $curso->nome = mb_strtoupper($request['nome']);
            $curso->qtde_dias = mb_strtoupper($request['qtde_dias']);
            $curso->cidade = mb_strtoupper($request['cidade']);
            $curso->uf = mb_strtoupper($request['uf']);
            $curso->local = mb_strtoupper($request['local']);
            $curso->instrutor = mb_strtoupper($request['instrutor']);
            $curso->modulo = mb_strtoupper($request['modulo']);
            $curso->modalidade = mb_strtoupper($request['modalidade']);
            $curso->max_alunos = mb_strtoupper($request['max_alunos']);
            $curso->inscritos = mb_strtoupper($request['inscritos']);
            $curso->confirmados = mb_strtoupper($request['confirmados']);
            $curso->pago = mb_strtoupper($request['pago']);
            $curso->refaca = mb_strtoupper($request['refaca']);
            $curso->cortesia = mb_strtoupper($request['cortesia']);
            $curso->finalizado = mb_strtoupper($request['finalizado']);
            $curso->observacao = mb_strtoupper($request['observacao']);
            $curso->campanhas_ativas = mb_strtoupper($request['campanhas_ativas']);
            $curso->inicio = mb_strtoupper($request['inicio']);
            
            if(count( $validator->errors()) > 0) {
                return redirect()->route('cursos.edit', [
                    'curso' => $id
                ])->withErrors($validator);
            }

            $curso -> save();
        }

        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
