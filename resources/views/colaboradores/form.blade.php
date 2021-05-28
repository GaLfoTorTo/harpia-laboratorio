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
                @isset($colaborador)
                    <a href="/colaboradores/novo" class="btn btn-primary">
                        Novo Colaborador
                        <i class="fas fa-plus"></i>
                    </a>
                @endisset
                <form action="/colaboradores/salvar" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="@if(isset($colaborador)){{$colaborador->id}}@else{{ old('id') }}@endif">
                    <div class="row">
                        <div class="col-7">
                            <div class="form-outline">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" class="form-control" required value="@if(isset($colaborador)){{$colaborador->nome}}@else{{ old('nome') }}@endif">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-outline">
                                <label for="cpf" class="form-label">CPF:</label>
                                <input type="text" data-mask-for-cpf-cnpj  name="cpf" class="form-control cpf" required value="@if(isset($colaborador)){{$colaborador->cpf}}@else{{ old('cpf') }}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-outline">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" name="email" class="form-control" value="@if(isset($colaborador)){{$colaborador->email}}@else{{ old('email') }}@endif">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline">
                                <label for="telefone" class="form-label">Telefone:</label>
                                <input type="text" name="telefone" class="form-control telefone" value="@if(isset($coalborador)){{$coalborador->telefone}}@else{{ old('telefone') }}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-outline">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" name="cep" class="form-control cep" value="@if(isset($colaborador)){{$colaborador->cep}}@else{{ old('cep') }}@endif">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label for="logradouro" class="form-label">Logradouro</label>
                                <input type="text" name="logradouro" class="form-control" value="@if(isset($colaborador)){{$colaborador->logradouro}}@else{{ old('logradouro') }}@endif">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-outline">
                                <label for="numero" class="form-label">Número</label>
                                <input type="number" name="numero" class="form-control" value="@if(isset($colaborador)){{$colaborador->numero}}@else{{ old('numero') }}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="form-outline">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" name="bairro" class="form-control" value="@if(isset($colaborador)){{$colaborador->bairro}}@else{{ old('bairro') }}@endif">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-outline">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" name="cidade" class="form-control" value="@if(isset($colaborador)){{$colaborador->cidade}}@else{{ old('cidade') }}@endif">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-outline">
                                <label for="uf" class="form-label">UF</label>
                                <input type="text" name="uf" class="form-control" value="@if(isset($colaborador)){{$colaborador->uf}}@else{{ old('uf') }}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-outline">
                                <label for="formacao" class="form-label">Formação</label>
                                <input type="text" name="formacao" class="form-control" value="@if(isset($colaborador)){{$colaborador->formacao}}@else{{ old('formacao') }}@endif">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label for="funcao" class="form-label">Função:</label>
                                <input type="text" name="funcao" class="form-control" value="@if(isset($colaborador)){{$colaborador->funcao}}@else{{ old('funcao') }}@endif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="setor" class="form-label">Setor:</label>
                                <select name="setor" id="setor" class="form-control">
                                    <option value="">selecione</option>
                                    @foreach ($setores as $key => $tipo)
                                        <option class=" setor" value="{{$tipo->setor}}"@if(isset($colaborador) && $colaborador->setor == $tipo->setor) selected @elseif(old('setor') == $tipo->setor) selected @endif>{{$tipo->setor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="foto:" class="form-label">Carregar Foto:</label>
                                <input type="file" name="foto" class="form-control">
                                @if(isset($colaborador) && $colaborador->foto != '')
                                    <a href="{{ $colaborador->foto }}" target="_blank">Ver Foto</a>
                                @endif
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
