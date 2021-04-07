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
                    <h1 class="m-0">{{ isset($colaborador) ? 'Editar' : 'Novo' }} colaborador</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/colaboradores">Colaaboradores</a></li>
                        <li class="breadcrumb-item active">{{ isset($colaboradores) ? 'Editar' : 'Novo' }}</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row card">
            <div class="col card-body">
                <form action="/colaboradores/salvar" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="@isset($colaborador){{$colaborador->id}}@endisset">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-outline">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" class="form-control" required value="@isset($colaborador){{$colaborador->nome}}@endisset">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-outline">
                                <label for="cpf" class="form-label">CPF:</label>
                                <input type="text" name="cpf" class="form-control cpf" required value="@isset($colaborador){{$colaborador->cpf_cnpj}}@endisset">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-outline">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" name="email" class="form-control" value="@isset($colaborador){{$colaborador->email}}@endisset">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="text" name="telefone" class="form-control fone" value="@isset($colaborador){{$colaborador->telefone}}@endisset">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-outline">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" name="cep" class="form-control cep" value="@isset($colaborador){{$colaborador->cep}}@endisset">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label for="logradouro" class="form-label">Logradouro</label>
                                <input type="text" name="logradouro" class="form-control" value="@isset($colaborador){{$colaborador->logradouro}}@endisset">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-outline">
                                <label for="numero" class="form-label">Numero</label>
                                <input type="number" name="numero" class="form-control" value="@isset($colaborador){{$colaborador->numero}}@endisset">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-outline">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" name="cidade" class="form-control" value="@isset($colaborador){{$colaborador->cidade}}@endisset">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-outline">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" name="bairro" class="form-control" value="@isset($colaborador){{$colaborador->bairro}}@endisset">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-outline">
                                <label for="uf" class="form-label">UF</label>
                                <input type="text" name="uf" class="form-control" value="@isset($colaborador){{$colaborador->uf}}@endisset">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-outline">
                                <label for="formacao" class="form-label">Formação</label>
                                <input type="text" name="formacao" class="form-control" value="@isset($colaborador){{$colaborador->formacao}}@endisset">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label for="funcao" class="form-label">Funcao:</label>
                                <input type="text" name="funcao" class="form-control" readonly value="@isset($colaborador){{$colaborador->funcao}}@endisset">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" align="end">
                            <button type="submit" class="btn btn-success w-25 hover-shadow">
                                Salvar 
                                <i class="fas fa-save"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@include('layout.footer')
