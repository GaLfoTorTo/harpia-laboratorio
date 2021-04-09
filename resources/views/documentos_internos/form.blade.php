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


    <div class="container corpo">
        <div class="container-fluid">
            <div class="row card">
                <div class="col card-body">

                    <form action="/documentos_internos/salvar/" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="@isset($documento){{$documento->id}}@endisset">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tipo" class="form-label">Tipo:</label>
                                    <select name="tipo" id="" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($tipos as $tipo)
                                            <option value="{{  $tipo }}">{{ $tipo }}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Codigo:</label>
                                    <input type="text" name="codigo" class="form-control" required value="@isset($documento){{$documento->cpf_cnpj}}@endisset">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="titulo:" class="form-label">Titulo::</label>
                                    <input type="text" name="titulo" class="form-control" required value="@isset($documento){{$documento->nome}}@endisset">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="revisao_edicao" class="form-label">Revisão_Edição:</label>
                                    <input type="text" name="revisao_edicao" class="form-control" required value="@isset($documento){{$documento->nome}}@endisset">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="data_aprovacao" class="form-label">Data da Aprovação:</label>
                                    <input type="text" name="data_aprovacao" class="form-control" value="@isset($documento){{$documento->email}}@endisset">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="num_copias" class="form-label">Nº de copias:</label>
                                    <input type="text" name="num_copias" class="form-control" value="@isset($documento){{$documento->telefone}}@endisset">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="localizacao" class="form-label">Localização:</label>
                                    <input type="text" name="localizacao" class="form-control" value="@isset($documento){{$documento->email}}@endisset">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="carregar documento:" class="form-label">Carregar documento:</label>
                                    <input type="file" name="carregar documento:" class="form-control" value="@isset($documento){{$documento->email}}@endisset">
                                </div>
                            </div>
                            
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

</div>
     
@include('layout.footer')