@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')
<div class="container corpo">
  <h2>{{ isset($documentos_externos) ? 'Editar' : 'Novo' }} Documentos Externos</h2>

  <form action="/documento/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($documento){{$documento->id}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="titulo" class="form-control" required value="@isset($documento){{$documento->nome}}@endisset">
                <label for="titulo" class="form-label">Titulo:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="revisao_edicao_n" class="form-control" required value="@isset($documento){{$documento->cpf_cnpj}}@endisset">
                <label for="revisao_edicao_n" class="form-label">Revisão/Edição/N°:</label>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="codigo" class="form-control" required value="@isset($documento){{$documento->nome}}@endisset">
                <label for="codigo" class="form-label">Código:</label>
            </div>
        </div>
    
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="n_de_exemplares" class="form-control" required value="@isset($documento){{$documento->nome}}@endisset">
                <label for="n_de_exemplares" class="form-label">N° de exemplares:</label>
            </div>
        </div>
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="localizacao" class="form-control" value="@isset($documento){{$documento->email}}@endisset">
                <label for="localizacao" class="form-label">Localização:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="data_atualizacao" class="form-control" value="@isset($documento){{$documento->telefone}}@endisset">
                <label for="data_atualizacao" class="form-label">Data da atualização:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="analise_critica_verificacao" class="form-control" value="@isset($documento){{$documento->email}}@endisset">
                <label for="analise_critica_verificacao" class="form-label">Análise Critica/Verificação:</label>
            </div>
        </div>
        <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="atualizacao_em" class="form-control" value="@isset($documento){{$documento->email}}@endisset">
                <label for="atualizacao_em" class="form-label">Atualização em:</label>
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
@include('layout.footer')
