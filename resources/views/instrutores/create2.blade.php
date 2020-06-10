@extends('adminlte::page')

@section('title', 'Novo Instrutor')

@section('content_header')
    <link href="{{ asset('css/form-modulos.css') }}" rel="stylesheet">
    <h1>Novo Instrutor</h1>

    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>    
            <h5>
                <i class="icon fas fa-ban"></i>
                Ocorreram um ou mais erros:
            </h5>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

        {{Form::open(['route' => 'instrutores.store' ,'enctype'=>'multipart/form-data', 'files' => true, 'id' => 'upload_form', 'method' => 'post'])}}
            <input type="hidden" id="token_b" name="_token" value="{{ csrf_token() }}"  />
            @csrf

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Nome</label>
                    <input type="text" name="nome" value="{{old('nome')}}" 
                        	   class="upper form-control @error('nome') is-invalid @enderror" />
                </div>

                <div class="col-sm-6">
                    <label>MikroTik</label>
                    <select id="mikrotik" name="mikrotik" class="form-control upper @error('mikrotik') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('mikrotik') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('mikrotik') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Ubiquiti</label>
                    <select id="ubiquiti" name="ubiquiti" class="form-control upper @error('ubiquiti') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Juniper</label>
                    <select id="juniper" name="juniper" class="form-control upper @error('juniper') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>VyOS</label>
                    <select id="vyos" name="vyos" class="form-control upper @error('vyos') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Cisco</label>
                    <select id="cisco" name="cisco" class="form-control upper @error('cisco') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Linux</label>
                    <select id="linux" name="linux" class="form-control upper @error('linux') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Fibra Óptica</label>
                    <select id="fibra_optica" name="fibra_optica" class="form-control upper @error('fibra_optica') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>EAD</label>
                    <select id="ead" name="ead" class="form-control upper @error('ead') is-invalid @enderror">
                            <option value="" selected disabled>Selecione</option>
                            <option value="SIM" <?php if (old('oficial') == 'SIM') { ?>selected="true" <?php }; ?>>SIM</option>
                            <option value="NÃO" <?php if (old('oficial') == 'NÃO') { ?>selected="true" <?php }; ?>>NÃO</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Endereço</label>
                    <input type="text" name="endereco" value="{{old('endereco')}}" 
                        	   class="upper form-control @error('endereco') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>CPF</label>
                    <input type="text" name="cpf" value="{{old('cpf')}}" 
                        	   class="upper form-control @error('cpf') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>RG</label>
                    <input type="text" name="rg" value="{{old('rg')}}" 
                        	   class="upper form-control @error('rg') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Passaporte</label>
                    <input type="text" name="passaporte" value="{{old('passaporte')}}" 
                        	   class="upper form-control @error('passaporte') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Aeroporto de preferência</label>
                    <input type="text" name="aeroporto_preferencia" value="{{old('aeroporto_preferencia')}}" 
                        	   class="upper form-control @error('aeroporto_preferencia') is-invalid @enderror" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <label>Observação</label>
                    <input type="text" name="observacao" value="{{old('observacao')}}" 
                        	   class="upper form-control @error('observacao') is-invalid @enderror" />
                </div>
                <div class="col-sm-6">
                    <label>Assinatura</label>
                </div>
            </div>

           
       

                <div class="dropzone dropzone-default dropzone-brand dz-clickable" id="kt_dropzone_2">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">Arraste os arquivos aqui ou clique para selecionar.</h3>
                        <span class="dropzone-msg-desc">Máximo de 10 Arquivos</span>
                    </div>
                </div>
            
            </div>
            </div>
            <br/>
            {{Form::submit('Salvar', ['class' => 'btn btn-primary', 'id' => 'salvar'])}}
            {{Form::close()}}
        </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
<script>
    var files = {};
    var uploadedDocumentMap = {};
    var token = "{{csrf_token()}}";
    // Dropzone.autoDiscover = false;
    Dropzone.options.documentDropzone ={
        url: "{{ route('modulos.file-upload')}}",
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        dictRemoveFile: "<button type='button' class='btn btn-danger btn-elevate btn-circle btn-icon'><i class='flaticon2-delete'></i></button>",
        dataType: 'json',
        ContentType: 'application/json',
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
            // console.log(response.name);
        },
        removedfile: function(file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="' + name + '"]').remove()
        },
        init: function() {
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                var anchorEl = document.createElement('a');
                anchorEl.setAttribute('href', '../media/' + file.id);
                anchorEl.setAttribute('target', '_blank');
                anchorEl.innerHTML = '<button type="button" class="btn btn-primary btn-elevate btn-circle btn-icon"><i class="flaticon-download"></i></button>';
                file.previewTemplate.appendChild(anchorEl);
            }
        }
    };
</script>
