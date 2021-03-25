@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>{{ isset($equipamento) ? 'Editar' : 'Novo' }} Equipamento</h2>
  <br>

  <form action="/equipamentos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($equipamentos){{$equipamentos->id}}@endisset">
    <div class="row">
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="equipamento_proprio" class="form-control" required value="@isset($equipamentos){{$equipamentos->equipamento_proprio}}@endisset">
                <label for="equipamento_proprio" class="form-label">Equipamento Próprio:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="equipamento" class="form-control" required value="@isset($equipamentos){{$equipamentos->equipamento}}@endisset">
                <label for="equipamento" class="form-label">Equipamento:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="marca" class="form-control" value="@isset($equipamentos){{$equipamentos->marca}}@endisset">
                <label for="marca" class="form-label">Marca:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="modelo" class="form-control" value="@isset($equipamentos){{$equipamentos->modelo}}@endisset">
                <label for="modelo" class="form-label">Modelo:</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
    <div class="col-3">
            <div class="form-outline">
                <input type="text" name="tensao" class="form-control" required value="@isset($equipamentos){{$equipamentos->tensao}}@endisset">
                <label for="tensao" class="form-label">Tensão:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="manual" class="form-control" required value="@isset($equipamentos){{$equipamentos->manual}}@endisset">
                <label for="manual" class="form-label"> Manual:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="num_serie" class="form-control" value="@isset($equipamentos){{$equipamentos->num_serie}}@endisset">
                <label for="num_serie" class="form-label">Número de Série:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="localizacao_manual" class="form-control" value="@isset($equipamentos){{$equipamentos->localizacao_manual}}@endisset">
                <label for="localizacao_manual" class="form-label">Localização Manual:</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
    <div class="col-3">
            <div class="form-outline">
                <input type="text" name="doc_instrucao" class="form-control" required value="@isset($equipamentos){{$equipamentos->doc_instrucao}}@endisset">
                <label for="doc_instrucao" class="form-label">Documento de Instrução:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="codigo" class="form-control" required value="@isset($equipamentos){{$equipamentos->codigo}}@endisset">
                <label for="codigo" class="form-label">Código:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="patrimonio" class="form-control" value="@isset($equipamentos){{$equipamentos->patrimonio}}@endisset">
                <label for="patrimonio" class="form-label">Patrimônio:</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="fabricante" class="form-control" value="@isset($equipamentos){{$equipamentos->fabricante}}@endisset">
                <label for="fabricante" class="form-label">Fabricante:</label>
            </div>
        </div>
        </div>
        <br>
        <div class="row">
    <div class="col-6">
            <div class="form-outline">
                <input type="text" name="fornecedor" class="form-control" required value="@isset($equipamentos){{$equipamentos->fornecedor}}@endisset">
                <label for="fornecedor" class="form-label">Fornecedor:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="localizacao_equipamento" class="form-control" required value="@isset($equipamentos){{$equipamentos->localizacao_equipamento}}@endisset">
                <label for="localizacao_equipamento" class="form-label">Localização Equipamento:</label>
            </div>
        </div>
        </div>
        <br>
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