@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>Serviços</h2>

  <div class="row">
      <div class="col">
          <a href="/servicos/novo" class="btn btn-primary">
            Novo serviço 
            <i class="fas fa-plus"></i>
          </a>
      </div>
      <div class="col ">
        <form action="">
          <div class="input-group justify-content-end">
            <div class="form-outline ">
              <input type="search" id="form1" class="form-control" name="pesquisa"/>
              <label class="form-label" for="form1">Pesquisar</label>
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
    </div>
  </div>
  <div class="row">
      <div class="col">
          <table class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Descrição</th>
                    <th>Tipo material</th>
                    <th>Tipo serviço</th>
                    <th>Serviço crítico</th>
                    <th>Ações</th>
                </tr>
              </thead>
              @foreach ($servicos as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>{{ $item->tipo_material }}</td>
                    <td>{{ $item->tipo_servico }}</td>
                    <td>{{ $item->servico_critico }}</td>
                    <td>
                      <a href="servicos/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="servicos/deletar/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
              @endforeach
          </table>

        </div>
        <div>
          {{ $servicos->links() }}
        </div>
  </div>
</div>
@include('layout.footer')
