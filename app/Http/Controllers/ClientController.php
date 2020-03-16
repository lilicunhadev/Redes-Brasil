<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\State;
use App\City;
use Input;

class ClientController extends Controller
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
        $clients = Client::paginate(8);

        return view('clients.index', [
            'clients' => $clients,
        ]);
    }

    public function search(Request $request)
    {


        //"select nome from cidades where uf = AM"
        if ($request->input('busca', 'nome'))
        {
            $busca = $request->input('busca', 'nome');

            //$clients = Client::where($busca, 'like', '%' . $busca . '%')
            $clients = Client::where($request->busca, 'like',  '%' . $request->nome .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        /*
            Clients::where($request->busca, 'like',  '%' . $request->nome .'%')
                ->orWhere($request->busca, $request->nome)
        */

        else if ($request->input('busca', 'tipo_pessoa'))
        {
            $busca = $request->input('busca', 'tipo_pessoa');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        else if ($request->input('busca', 'cidade'))
        {
            $busca = $request->input('busca', 'cidade');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        else if ($request->input('busca', 'uf'))
        {
            $busca = $request->input('busca', 'uf');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        else if ($request->input('busca', 'telefone'))
        {
            $busca = $request->input('busca', 'telefone');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        else if ($request->input('busca', 'cpf_cnpj'))
        {
            $busca = $request->input('busca', 'cpf_cnpj');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        else if ($request->input('busca', 'tipo_cliente'))
        {
            $busca = $request->input('busca', 'tipo_cliente');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }

        else if ($request->input('busca', 'onde_nos_encontrou'))
        {
            $busca = $request->input('busca', 'onde_nos_encontrou');
            $clients = Client::where($request->busca, 'like',  '%' . $request->uf .'%')
                ->orderBy($busca)
                ->paginate(8);
        }
            
        return view('clients.index')
            ->with('clients', $clients);
    }


    /*    
    	if ($request->nome)
    	{
	        $nome = $request->nome;
	        $clients = Client::where('nome', 'like', '%'.$nome.'%')
	            ->orderBy('nome')
	            ->paginate(8);

	        return view('clients.index')
            ->with('clients', $clients);
		}

		if ($request->uf)
    	{
	        $uf = $request->uf;
	        $clients = Client::where('uf', 'like', '%'.$uf.'%')
	            ->orderBy('uf')
	            ->paginate(8);

	        return view('clients.index')
            ->with('clients', $clients);
		}

        return redirect()->route('clients.index');
    */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states=State::all();
        $cities=City::all();
        return view('clients.create',compact('states', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nome',
            'tipo_pessoa',
            'pais',
            'cep',
            'endereco',
            'bairro',
            'cidade',
            'uf',
            'telefone',
            'celular',
            'email',
            'empresa',
            'cpf_cnpj',
            'tipo_cliente',
            'onde_nos_encontrou'
        ]);

        $validator = Validator::make($data, [
            'nome' => ['required', 'string', 'max:100'],
            'tipo_pessoa' => ['required', 'string', 'max:100'],
            'pais' => ['required', 'string', 'max:50'],
            'cep' => ['required', 'string', 'max:20'],
            'endereco' => ['required', 'string', 'max:200'],
            'bairro' => ['required', 'string', 'max:100'],
            'cidade' => ['required', 'string', 'max:100'],
            'uf' => ['required', 'string', 'max:5'],
            'telefone' => ['required', 'string', 'max:20'],
            'celular' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'empresa' => ['required', 'string', 'max:100'],
            'cpf_cnpj' => ['required', 'string', 'max:100'],
            'tipo_cliente' => ['required', 'string', 'max:100'],
            'onde_nos_encontrou' => ['required', 'string', 'max:100']
        ]);

        if ($validator->fails()) {
            return redirect()->route('clients.create')
            ->withErrors($validator)
            ->withInput();
        }

        $client = new Client;

        $client->nome = mb_strtoupper($data['nome']);
        $client->tipo_pessoa = mb_strtoupper($data['tipo_pessoa']);
        $client->pais = mb_strtoupper($data['pais']);
        $client->cep = mb_strtoupper($data['cep']);
        $client->endereco = mb_strtoupper($data['endereco']);
        $client->bairro = mb_strtoupper($data['bairro']);
        $client->cidade = mb_strtoupper($data['cidade']);
        $client->uf = mb_strtoupper($data['uf']);
        $client->telefone = mb_strtoupper($data['telefone']);
        $client->celular = mb_strtoupper($data['celular']);
        $client->email = $data['email'];
        $client->empresa = mb_strtoupper($data['empresa']);
        $client->cpf_cnpj = mb_strtoupper($data['cpf_cnpj']);
        $client->tipo_cliente = mb_strtoupper($data['tipo_cliente']);
        $client->onde_nos_encontrou = mb_strtoupper($data['onde_nos_encontrou']);

        $client->save();

        return redirect()->route('clients.index');
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
        $client = Client::find($id);

        if ($client) {
            return view ('clients.edit', [
                'client' => $client
            ]);
        }
        return redirect()->route('clients.index');
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
        $client = Client::find($id);

        if ($client) {

            $data = $request->only([
                'nome',
                'tipo_pessoa',
                'pais',
                'cep',
                'endereco',
                'bairro',
                'cidade',
                'uf',
                'telefone',
                'celular',
                'email',
                'empresa',
                'cpf_cnpj',
                'tipo_cliente',
                'onde_nos_encontrou'
            ]);

            $validator = Validator::make([
                'nome' => $data['nome'],
                'tipo_pessoa' => $data['tipo_pessoa'],
                'pais' => $data['pais'],
                'cep' => $data['cep'],
                'endereco' => $data['endereco'],
                'bairro' => $data['bairro'],
                'cidade' => $data['cidade'],
                'uf' => $data['uf'],
                'telefone' => $data['telefone'],
                'celular' => $data['celular'],
                'email' => $data['email'],
                'empresa' => $data['empresa'],
                'cpf_cnpj' => $data['cpf_cnpj'],
                'tipo_cliente' => $data['tipo_cliente'],
                'onde_nos_encontrou' => $data['onde_nos_encontrou']

            ], [
                'nome' => ['required', 'string', 'max:100'],
                'tipo_pessoa' => ['required', 'string', 'max:100'],
                'pais' => ['required', 'string', 'max:50'],
                'cep' => ['required', 'string', 'max:20'],
                'endereco' => ['required', 'string', 'max:200'],
                'bairro' => ['required', 'string', 'max:100'],
                'cidade' => ['required', 'string', 'max:100'],
                'uf' => ['required', 'string', 'max:5'],
                'telefone' => ['required', 'string', 'max:20'],
                'celular' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'email', 'max:100'],
                'empresa' => ['required', 'string', 'max:100'],
                'cpf_cnpj' => ['required', 'string', 'max:100'],
                'tipo_cliente' => ['required', 'string', 'max:100'],
                'onde_nos_encontrou' => ['required', 'string', 'max:100']
            ]);


            // Alteração dos dados
            $client->nome = mb_strtoupper($data['nome']);
            $client->tipo_pessoa = mb_strtoupper($data['tipo_pessoa']);
            $client->pais = mb_strtoupper($data['pais']);
            $client->cep = mb_strtoupper($data['cep']);
            $client->endereco = mb_strtoupper($data['endereco']);
            $client->bairro = mb_strtoupper($data['bairro']);
            $client->cidade = mb_strtoupper($data['cidade']);
            $client->uf = mb_strtoupper($data['uf']);
            $client->telefone = mb_strtoupper($data['telefone']);
            $client->celular = mb_strtoupper($data['celular']);
            $client->email = $data['email'];
            $client->empresa = mb_strtoupper($data['empresa']);
            $client->cpf_cnpj = mb_strtoupper($data['cpf_cnpj']);
            $client->tipo_cliente = mb_strtoupper($data['tipo_cliente']);
            $client->onde_nos_encontrou = mb_strtoupper($data['onde_nos_encontrou']);

            if(count( $validator->errors()) > 0) {
                return redirect()->route('clients.edit', [
                    'client' => $id
                ])->withErrors($validator);
            }

            $client -> save();
        }

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('clients.index');
    }
}
