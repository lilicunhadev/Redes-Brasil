<?php

namespace App\Http\Controllers\Cadastros;

use Input;
use App\Instrutor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\UploadAssinatura;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\cadastros\InstrutorRequest;

class InstrutorController extends Controller
{
    use UploadAssinatura;

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
        $instrutores = Instrutor::paginate(8);
        return view('instrutores.index', [
            'instrutores' => $instrutores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instrutores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstrutorRequest $request)
    {
        $request->all();

        $instrutor = new Instrutor;

        $instrutor->nome = mb_strtoupper($request['nome']);
        $instrutor->mikrotik = mb_strtoupper($request['mikrotik']);
        $instrutor->ubiquiti = mb_strtoupper($request['ubiquiti']);
        $instrutor->juniper = mb_strtoupper($request['juniper']);
        $instrutor->vyos = mb_strtoupper($request['vyos']);
        $instrutor->cisco = mb_strtoupper($request['cisco']);
        $instrutor->linux = mb_strtoupper($request['linux']);
        $instrutor->fibra_optica = mb_strtoupper($request['fibra_optica']);
        $instrutor->ead = mb_strtoupper($request['ead']);
        $instrutor->endereco = mb_strtoupper($request['endereco']);
        $instrutor->cpf = mb_strtoupper($request['cpf']);
        $instrutor->rg = mb_strtoupper($request['rg']);
        $instrutor->passaporte = mb_strtoupper($request['passaporte']);
        $instrutor->aeroporto_preferencia = mb_strtoupper($request['aeroporto_preferencia']);
        $instrutor->observacao = mb_strtoupper($request['observacao']);

        if ($request->has('assinatura'))
        {
            $image = $request->file('assinatura');
            $name = Str::slug($request->input('nome')).'_'.time();
            $folder = '/uploads/images/';
            $filepath = $folder.$name.'.'.$image->getClientOriginalExtension();
            $this->uploadAssinatura($image, $folder, 'public', $name);
            $instrutor->assinatura = $filepath;
        }

        $instrutor->save();
        return redirect()->route('instrutores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instrutor = Instrutor::find($id);

        if ($instrutor) {
            return view ('instrutores.show', [
                'instrutor' => $instrutor
            ]);
        }
        return redirect()->route('instrutores.s');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instrutor = Instrutor::find($id);

        if ($instrutor) {
            return view ('instrutores.edit', [
                'instrutor' => $instrutor
            ]);
        }
        return redirect()->route('instrutores.index');
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
        $instrutor = Instrutor::find($id);

        if ($instrutor) {

            $data = $request->only([
                'nome',
                'mikrotik',
                'ubiquiti',
                'juniper',
                'vyos',
                'cisco',
                'linux',
                'fibra_optica',
                'ead',
                'endereco',
                'cpf',
                'rg',
                'passaporte',
                'aeroporto_preferencia',
                'observacao'
            ]);

            $validator = Validator::make([
                'nome' => $data['nome'],
                'mikrotik' => $data['mikrotik'],
                'ubiquiti' => $data['ubiquiti'],
                'juniper' => $data['juniper'],
                'vyos' => $data['vyos'],
                'cisco' => $data['cisco'],
                'linux' => $data['linux'],
                'fibra_optica' => $data['fibra_optica'],
                'ead' => $data['ead'],
                'endereco' => $data['endereco'],
                'cpf' => $data['cpf'],
                'rg' => $data['rg'],
                'passaporte' => $data['passaporte'],
                'aeroporto_preferencia' => $data['aeroporto_preferencia'],
                'observacao' => $data['observacao']
            ], [
                'nome' => ['required', 'string', 'max:50'],
                'mikrotik' => ['string', 'max:5'],
                'ubiquiti' => ['string', 'max:5'],
                'juniper' => ['string', 'max:5'],
                'vyos' => ['string', 'max:5'],
                'cisco' => ['string', 'max:5'],
                'linux' => ['string', 'max:5'],
                'fibra_optica' => ['string', 'max:5'],
                'ead' => ['string', 'max:5'],
                'endereco' => ['string', 'max:200'],
                'cpf' => ['string', 'max:20'],
                'rg' => ['string', 'max:20'],
                'passaporte' => ['string', 'max:20'],
                'aeroporto_preferencia' => ['string', 'max:50'],
                'observacao' => ['max:100']
            ]);

            // Alteração dos dados
            $instrutor->nome = mb_strtoupper($data['nome']);
            $instrutor->mikrotik = mb_strtoupper($data['mikrotik']);
            $instrutor->ubiquiti = mb_strtoupper($data['ubiquiti']);
            $instrutor->juniper = mb_strtoupper($data['juniper']);
            $instrutor->vyos = mb_strtoupper($data['vyos']);
            $instrutor->cisco = mb_strtoupper($data['cisco']);
            $instrutor->linux = mb_strtoupper($data['linux']);
            $instrutor->fibra_optica = mb_strtoupper($data['fibra_optica']);
            $instrutor->ead = mb_strtoupper($data['ead']);
            $instrutor->endereco = mb_strtoupper($data['endereco']);
            $instrutor->cpf = mb_strtoupper($data['cpf']);
            $instrutor->rg = mb_strtoupper($data['rg']);
            $instrutor->passaporte = mb_strtoupper($data['passaporte']);
            $instrutor->aeroporto_preferencia = mb_strtoupper($data['aeroporto_preferencia']);
            $instrutor->observacao = mb_strtoupper($data['observacao']);

            if ($request->has('assinatura'))
            {
                $image = $request->file('assinatura');
                $name = Str::slug($request->input('nome')).'_'.time();
                $folder = '/uploads/images/';
                $filepath = $folder.$name.'.'.$image->getClientOriginalExtension();
                $this->uploadAssinatura($image, $folder, 'public', $name);
                $instrutor->assinatura = $filepath;
            }

            if(count( $validator->errors()) > 0) {
                return redirect()->route('instrutores.edit', [$id])->withErrors($validator);
            }

            $instrutor -> save();
        }

        return redirect()->route('instrutores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instrutores = Instrutor::find($id);
        $instrutores->delete();
        
        return redirect()->route('instrutores.index');
    }
    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = $file->getClientOriginalName();

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
    public function media($mediaItem)
    {
        $mediaItem = Media::find($mediaItem);
        return response()->download($mediaItem->getPath(), $mediaItem->file_name);
    }
}
