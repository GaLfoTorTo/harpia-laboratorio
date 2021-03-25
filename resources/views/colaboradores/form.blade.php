@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>{{ isset($colaborador) ? 'Editar' : 'Novo' }} colaborador</h2>
  <form action="/colaboradores/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($colaborador){{$colaborador->id}}@endisset">
    <div class="row">
        <div class="col-7">
            <div class="form-outline">
                <input type="text" name="nome" class="form-control" required value="@isset($colaborador){{$colaborador->nome}}@endisset">
                <label for="nome" class="form-label">Nome:</label>
            </div>
        </div>
        <div class="col-5">
            <div class="form-outline">
                <input type="text" name="cpf" class="form-control cpf" required value="@isset($colaborador){{$colaborador->cpf_cnpj}}@endisset">
                <label for="cpf" class="form-label">CPF:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-outline">
                <input type="email" name="email" class="form-control" value="@isset($colaborador){{$colaborador->email}}@endisset">
                <label for="email" class="form-label">E-mail:</label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-outline">
                <input type="text" name="telefone" class="form-control fone" value="@isset($colaborador){{$colaborador->telefone}}@endisset">
                <label for="telefone" class="form-label">Telefone:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-outline">
                <input type="text" name="cep" class="form-control cep" value="@isset($colaborador){{$colaborador->cep}}@endisset">
                <label for="cep" class="form-label">CEP</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="logradouro" class="form-control" value="@isset($colaborador){{$colaborador->logradouro}}@endisset">
                <label for="logradouro" class="form-label">Logradouro</label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-outline">
                <input type="number" name="numero" class="form-control" value="@isset($colaborador){{$colaborador->numero}}@endisset">
                <label for="numero" class="form-label">Numero</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-outline">
                <input type="text" name="cidade" class="form-control" value="@isset($colaborador){{$colaborador->cidade}}@endisset">
                <label for="cidade" class="form-label">Cidade</label>
            </div>
        </div>
        <div class="col-5">
            <div class="form-outline">
                <input type="text" name="bairro" class="form-control" value="@isset($colaborador){{$colaborador->bairro}}@endisset">
                <label for="bairro" class="form-label">Bairro</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="uf" class="form-control" value="@isset($colaborador){{$colaborador->uf}}@endisset">
                <label for="uf" class="form-label">UF</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="formacao" class="form-control" value="@isset($colaborador){{$colaborador->formacao}}@endisset">
                <label for="formacao" class="form-label">Formação</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="funcao" class="form-control" readonly value="@isset($colaborador){{$colaborador->funcao}}@endisset">
                <label for="funcao" class="form-label">Funcao:</label>
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
@include('layout.footer')
