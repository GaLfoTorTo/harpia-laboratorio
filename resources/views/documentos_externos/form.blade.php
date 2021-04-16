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
                    <h1 class="m-0">{{ isset($documentos_externos) ? 'Editar' : 'Novo' }} Documento</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/documentos_externos">Documento Externo</a></li>
                            <li class="breadcrumb-item active">{{ isset($documentos_externos) ? 'Editar' : 'Novo' }}</li>
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

                    <form action="/documentos_externos/salvar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($documento){{$documento->id}}@endisset">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" name="titulo" class="form-control" required value="@if(isset($documento)){{$documento->titulo}}@else{{ old('titulo')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="revisao_edicao_n" class="form-label">Revisão/Edição/N°:</label>
                                    <input type="text" name="revisao_edicao_n" class="form-control" required value="@if(isset($documento)){{$documento->revisao_edicao_n}}@else{{ old('revisao_edicao_n')}}@endif">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Código:</label>
                                    <input type="text" name="codigo" class="form-control" required value="@if(isset($documento)){{$documento->codigo}}@else{{ old('codigo')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="n_de_exemplares" class="form-label">N° de exemplares:</label>
                                    <input type="number" name="n_de_exemplares" class="form-control" required value="@if(isset($documento)){{$documento->n_de_exemplares}}@else{{ old('n_de_exemplares')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="localizacao" class="form-label">Localização:</label>
                                    <input type="text" name="localizacao" class="form-control" required value="@if(isset($documento)){{$documento->localizacao}}@else{{ old('localizacao')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="data_da_atualizacao" class="form-label">Data da atualização:</label>
                                    <input type="date" name="data_da_atualizacao" class="form-control" required value="@if(isset($documento)){{$documento->data_da_atualizacao}}@else{{ old('data_da_atualizacao')}}@endif">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="analise_critica_verificacao" class="form-label">Análise Critica/Verificação:</label>
                                    <input type="text" name="analise_critica_verificacao" class="form-control" required value="@if(isset($documento)){{$documento->analise_critica_verificacao}}@else{{ old('analise_critica_verificacao')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="atualizacao_em" class="form-label">Atualização em:</label>
                                    <input type="date" name="atualizacao_em" class="form-control" required value="@if(isset($documento)){{$documento->atualizacao_em}}@else{{ old('atualizacao_em')}}@endif">
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="carregar documento:" class="form-label">Carregar documento:</label>
                                        <input type="file" name="documento_temp" class="form-control">
                                        @if(isset($documento) && $documento->documento != '')
                                            <a href="{{ $documento->documento }}" target="_blank">Ver documento</a>
                                        @endif
                                    </div>
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
