
@extends('adminlte::page')

@section('title', 'Módulos')

@section('content_header')
<link href="{{ asset('css/clients2.css') }}" rel="stylesheet">
	<h1>
		Módulos
		&nbsp;&nbsp;
		<a href="{{ route('modulos.create') }}" class="btn btn-sm btn-success">
	  	Novo Módulo
	</a>  
	</h1>  
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection
@section('content')
{{Form::open(['route' => 'projects.store' ,'enctype'=>'multipart/form-data', 'files' => true, 'id' => 'upload_form', 'method' => 'post'])}}

<input type="hidden" id="master_token" name="_token" value="{{ csrf_token() }}" />

    {{-- Name/Description fields, irrelevant for this article --}}

    <div class="form-group">
    <h3 class="kt-font-success">Upload de arquivos Sobre o Evento,Avaliação e outros.</h1><br>
            <div class="form-group">
                <label class="col-form-label col-lg-3 col-sm-12">Carregar Arquivos</label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="dropzone dropzone-default dropzone-brand dz-clickable" id="kt_dropzone_2">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">Arraste os arquivos aqui ou clique para selecionar.</h3>
                            <span class="dropzone-msg-desc">Máximo de 10 Arquivos</span>
                        </div>
                    </div>
                </div>
            </div>
    <div>
    {{Form::submit('Salvar', ['class' => 'btn btn-primary', 'id' => 'salvar'])}}
  
   
    {{Form::close()}}
    @endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script>
  var uploadedDocumentMap = {};
  var files = {};
  var token = "{{csrf_token()}}";
  Dropzone.autoDiscover = false;
  Dropzone.options.documentDropzone = {
    url: '{{ route('projects.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
   
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        dictRemoveFile: "<button type='button' class='btn btn-danger btn-elevate btn-circle btn-icon'><i class='flaticon2-delete'></i></button>",
        dataType: 'json',
        ContentType: 'application/json',
        headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name;
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
