@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<style>
    .documentos_externos{
        display: none;
    }
</style>
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
                <div class="col card-body">

                    <form action="/documento/salvar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($documento){{$documento->id}}@endisset">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="interno" onclick="alteraTipo('interno')">Interno</label>
                                <input type="radio" class="tipo_documento" checked name="tipo_documento" id="interno" onclick="alteraTipo('interno')">
                                <label for="externo" onclick="alteraTipo('externo')">Externo</label>
                                <input type="radio" class="tipo_documento" name="tipo_documento" id="externo" onclick="alteraTipo('externo')">
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
                                    <label for="revisao_edicao_n" class="form-label">Revisão/Edição/N°:</label>
                                    <input type="text" name="revisao_edicao_n" class="form-control "  value="@if(isset($documento)){{$documento->revisao_edicao_n}}@else{{ old('revisao_edicao_n')}}@endif">
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
                                        @foreach ($setores as $key => $tipo)
                                          <option value="{{ $tipo->setor }}" @if(isset($documento) && $documento->setor == $tipo)  selected @elseif(old('setor') == $tipo) selected @endif >{{$tipo->setor}}</option>
                                          @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="data_da_atualizacao" class="form-label">Data da atualização:</label>
                                    <input type="date" name="data_da_atualizacao" class="form-control"  value="@if(isset($documento)){{$documento->data_da_atualizacao}}@else{{ old('data_da_atualizacao')}}@endif">
                                </div>
                            </div>
                     
                            <div class="col-6 documentos_externos">
                                <div class="form-group">
                                    <label for="analise_critica_verificacao" class="form-label">Análise Critica/Verificação:</label>
                                    <input type="text" name="analise_critica_verificacao" class="form-control"  value="@if(isset($documento)){{$documento->analise_critica_verificacao}}@else{{ old('analise_critica_verificacao')}}@endif">
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

</script>