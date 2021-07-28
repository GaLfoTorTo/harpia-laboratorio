@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<script>
@if(isset($documento) && $documento->tipo_documento == 'externo')
    .documentos_internos{
        display: none;
    }
@else
    .documentos_externos{
        display: none;
    }
@endif
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($documento) ? 'Editar' : 'Novo' }} Documento</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/documento">Documento</a></li>
                            <li class="breadcrumb-item active">{{ isset($documento) ? 'Editar' : 'Novo' }}</li>
                        </ol>
                    </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif

    <div class="container corpo">
        <div class="container-fluid">
        
            <div class="row card">
            <div class="card">
          <div class="card-header">
            <a href="/documento/novo" class="btn btn-primary">
              Novo documento 
              <i class="fas fa-plus"></i>
            </a>
                <div class="col card-body">

                    <form action="/documento/salvar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($documento){{$documento->id}}@endisset">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="interno" onclick="alteraTipo('interno')">Interno</label>
                                <input type="radio" class="tipo_documento" checked name="tipo_documento" id="interno" onclick="alteraTipo('interno')" value="interno" @if(isset($documento) && $documento->tipo_documento == 'interno') checked @elseif(old('tipo_documento') == "interno") checked @endif>
                                <label for="externo" onclick="alteraTipo('externo')">Externo</label>
                                <input type="radio" class="tipo_documento" name="tipo_documento" id="externo" onclick="alteraTipo('externo')" value="externo" @if(isset($documento) && $documento->tipo_documento == 'externo') checked @elseif(old('tipo_documento') == "externo") checked @endif>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 ">
                                <div class="form-group">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" name="titulo" class="form-control"  value="@if(isset($documento)){{$documento->titulo}}@else{{ old('titulo')}}@endif">
                                </div>
                            </div>
                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="revisao_edicao_n" class="form-label">Data da Revisão/Edição/N°:</label>
                                    <input type="text" name="revisao_edicao_n" class="form-control "  value="@if(isset($documento)){{$documento->revisao_edicao_n}}@else{{ old('revisao_edicao_n')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="localizacao" class="form-label">Tipo:</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach ($tipo as $key => $item)
                                          <option value="{{ $item }}" @if(isset($documento) && $documento->tipo == $item)  selected @elseif(old('tipo') == $item) selected @endif >{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Código:</label>
                                    <input type="text" name="codigo" class="form-control"  value="@if(isset($documento)){{$documento->codigo}}@else{{ old('codigo')}}@endif">
                                </div>
                            </div>
                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="n_de_exemplares" class="form-label">N° de exemplares:</label>
                                    <input type="number" name="n_de_exemplares" class="form-control"  value="@if(isset($documento)){{$documento->n_de_exemplares}}@else{{ old('n_de_exemplares')}}@endif">
                                </div>
                            </div>
                        
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="localizacao" class="form-label">Localização:</label>
                                    <select name="localizacao" id="localizacao" class="form-control">
                                    <option value="">Selecione</option>
                                        @foreach ($setores as $key => $tipo)
                                          <option value="{{ $tipo->setor }}" @if(isset($documento) && $documento->localizacao == $tipo->setor)  selected @elseif(old('localizacao') == $tipo) selected @endif >{{$tipo->setor}}</option>
                                          @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="data_da_ultima_analise_critica" class="form-label">Data da última análise crítica:</label>
                                    <input type="date" name="data_da_ultima_analise_critica" class="form-control"  value="@if(isset($documento)){{$documento->data_da_ultima_analise_critica}}@else{{ old('data_da_ultima_analise_critica')}}@endif">
                                </div>
                            </div>

                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="proxima_analise_critica_em" class="form-label">Próxima análise crítica em</label>
                                    <input type="date" name="proxima_analise_critica_em" class="form-control"  value="@if(isset($documento)){{$documento->proxima_analise_critica_em}}@else{{ old('proxima_analise_critica_em')}}@endif">
                                </div>
                            </div>
                     
                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="frequencia_da_analise_critica_verificacao" class="form-label">Frequência da análise crítica/verificação:</label>
                                    <input type="text" name="frequencia_da_analise_critica_verificacao" class="form-control"  value="@if(isset($documento)){{$documento->frequencia_da_analise_critica_verificacao}}@else{{ old('frequencia_da_analise_critica_verificacao')}}@endif">
                                </div>
                            </div>
                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="atualizacao_em" class="form-label">Atualização em:</label>
                                    <input type="date" name="atualizacao_em" class="form-control"  value="@if(isset($documento)){{$documento->atualizacao_em}}@else{{ old('atualizacao_em')}}@endif">
                                </div>
                            </div>
                        
                                       
                            <div class="col-6 documentos_internos">
                                <div class="form-group">
                                    <label for="revisao_edicao" class="form-label">Revisão Edição:</label>
                                    <input type="text" name="revisao_edicao" class="form-control"  value="@if(isset($documento)){{$documento->revisao_edicao}}@else{{ old('revisao_edicao')}}@endif">
                                </div>
                            </div>
                            <div class="col-6 documentos_internos">
                                <div class="form-group">
                                    <label for="data_aprovacao" class="form-label">Data da Aprovação:</label>
                                    <input type="date" name="data_aprovacao" class="form-control"  value="@if(isset($documento)){{$documento->data_aprovacao}}@else{{ old('data_aprovacao')}}@endif">
                                </div>
                            </div>
                       
                            <div class="col-6 documentos_internos">
                                <div class="form-group">
                                    <label for="num_copias" class="form-label">Nº de cópias:</label>
                                    <input type="number" name="num_copias" class="form-control"  value="@if(isset($documento)){{$documento->num_copias}}@else{{ old('num_copias')}}@endif">
                                </div>
                            </div> 
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="carregar documento:" class="form-label">Carregar documento:</label>
                                    <input type="file" name="documento_temp" class="form-control ">
                            
                                        @if(isset($documento) && $documento->documento != '')
                                        <a href="{{ $documento->documento }}" target="_blank">Ver documento</a>

                                    @endif
                                </div>
                            </div>                                        
                        </div>
                        </div>
          </div>
            </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-success w-100">
                                    Salvar 
                                <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

     
@include('layout.footer')
<script>
    function alteraTipo(tipo) {

        if(tipo == 'interno') {
            $('.documentos_internos').show();
            $('.documentos_externos').hide();
        } else {
            $('.documentos_internos').hide();
            $('.documentos_externos').show();
        }
    }

    $(document).ready(function(){
        var tipo_doc = $('.tipo_documento').Chilldren().is('checked');
        console.log(tipo_doc);
    })
    

</script>