@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')


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
                            <li class="breadcrumb-item"><a href="/documentos_externos">Documento</a></li>
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
                <div class="col card-body">

                    <form action="/documento/salvar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($documento){{$documento->id}}@endisset">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tipo_documento">Interno</label>
                                <input type="radio" class="tipo_documento" name="tipo_documento" id="interno">
                                <label for="tipo_documento">Externo</label>
                                <input type="radio" class="tipo_documento" name="tipo_documento" id="externo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" name="titulo" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->titulo}}@else{{ old('titulo')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="revisao_edicao_n" class="form-label">Revisão/Edição/N°:</label>
                                    <input type="text" name="revisao_edicao_n" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->revisao_edicao_n}}@else{{ old('revisao_edicao_n')}}@endif">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Código:</label>
                                    <input type="text" name="codigo" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->codigo}}@else{{ old('codigo')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="n_de_exemplares" class="form-label">N° de exemplares:</label>
                                    <input type="number" name="n_de_exemplares" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->n_de_exemplares}}@else{{ old('n_de_exemplares')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="localizacao" class="form-label">Localização:</label>
                                    <input type="text" name="localizacao" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->localizacao}}@else{{ old('localizacao')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="data_da_atualizacao" class="form-label">Data da atualização:</label>
                                    <input type="date" name="data_da_atualizacao" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->data_da_atualizacao}}@else{{ old('data_da_atualizacao')}}@endif">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="analise_critica_verificacao" class="form-label">Análise Critica/Verificação:</label>
                                    <input type="text" name="analise_critica_verificacao" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->analise_critica_verificacao}}@else{{ old('analise_critica_verificacao')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="atualizacao_em" class="form-label">Atualização em:</label>
                                    <input type="date" name="atualizacao_em" class="form-control documentos_externos" required value="@if(isset($documento)){{$documento->atualizacao_em}}@else{{ old('atualizacao_em')}}@endif">
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="carregar documento:" class="form-label">Carregar documento:</label>
                                        <input type="file" name="documento_temp" class="form-control documentos_externos">
                               
                                          @if(isset($documento) && $documento->documento != '')
                                            <a href="{{ $documento->documento }}" target="_blank">Ver documento</a>

                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
            <div class="documentos_internos" >
                        <div class="row">
                            <div class="col-4">
                            <div class="form-group">
                                        <label for="equipamento_proprio" class="form-label">Equipamento Próprio:</label>
                                        <select name="equipamento_proprio" id="equipamento_proprio" class="form-control documentos_internos">
                                            <option value=""></option>
                                            @foreach ($equipamento_proprio as $key => $proprio)
                                                <option class=" equipamento_proprio" value="{{$proprio->equipamento_proprio}}" @if(isset($equipamentos) && $equipamentos->equipamento_proprio == $proprio->equipamento_proprio) selected @endif>{{$proprio->equipamento_proprio}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="equipamento" class="form-label">Equipamento:</label>
                                        <input type="text" name="equipamento" class="form-control documentos_internos" required value="@isset($equipamentos){{$equipamentos->equipamento}}@endisset">
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="marca" class="form-label">Marca:</label>
                                        <input type="text" name="marca" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->marca}}@endisset">
                                    </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="modelo" class="form-label">Modelo:</label>
                                        <input type="number" name="modelo" class="form-control fone documentos_internos" value="@isset($equipamentos){{$equipamentos->modelo}}@endisset">
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="tensao" class="form-label">Tensão:</label>
                                        <select name="tensao" id="tensao" class="form-control selecao documentos_internos">
                                                <option value=""></option>
                                            @foreach ($tensao as $key => $t)
                                                <option value="{{ $t->tensao }}" {{ isset($equipamentos) && $equipamentos->tensao == $t->tensao ? 'selected' : ''}} >{{$t->tensao}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="manual" class="form-label">Manual:</label>
                                        <select name="manual" id="manual" class="form-control documentos_internos">
                                                <option value=""></option>
                                            @foreach ($manual as $key => $man)
                                                <option value="{{ $man->manual }}" {{ isset($equipamentos) && $equipamentos->manual == $man->manual ? 'selected' : ''}} >{{$man->manual}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                <div class="form-group">
                                        <label for="num_serie" class="form-label">Número de Série:</label>
                                        <input type="number" name="num_serie" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->num_serie}}@endisset">
                                    </div>
                                </div>
                                <div class="col-6 camposLocalizacao" >
                        
                        
                                <div class="form-group">
                                        <label for="localizacao_manual" class="form-label">Localização Manual:</label>
                                        <input type="text" name="localizacao_manual" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->localizacao_manual}}@endisset">
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="doc_instrucao" class="form-label">Documento de Instrução:</label>
                                        <input type="text" name="doc_instrucao" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->doc_instrucao}}@endisset">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="codigo" class="form-label">Código:</label>
                                        <input type="number" name="codigo" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->codigo}}@endisset">
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="patrimonio" class="form-label">Patrimônio:</label>
                                        <input type="text" name="patrimonio" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->patrimonio}}@endisset">
                                    </div>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                        <label for="fabricante" class="form-label">Fabricante:</label>
                                        <input type="text" name="fabricante" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->fabricante}}@endisset">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-5">
                                <div class="form-group">
                                    <label for="fornecedor" class="form-label">Fornecedor:</label>
                                    <select name="fornecedor" id="fornecedor" class="form-control documentos_internos">
                                        @foreach ($fornecedores as $key => $t)
                                          <option value="{{ $t->razao_social }}" @if(isset($equipamentos) && $equipamentos->fornecedores == $t->razao_social)  selected @elseif(old('fornecedores') == $t->razao_social) selected @endif >{{$t->razao_social}}</option>
                                      @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-7">
                                <div class="form-group">
                                        <label for="localizacao_equipamento" class="form-label">Localização Equipamento:</label>
                                        <input type="text" name="localizacao_equipamento" class="form-control documentos_internos" value="@isset($equipamentos){{$equipamentos->localizacao_equipamento}}@endisset">
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                                 
                        </div>
                    </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success w-100">
                                    Salvar 
                                    <i class="fas fa-save"></i>
                                </button>
                            </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
     
@include('layout.footer')
<script>
    $('.alteraManual').on('change', function(){
    if($(this).val() == 'Sim') {
      $('.camposLocalizacao').show();
    }else {
      $('.camposLocalizacao').hide();

    }
  })
</script>