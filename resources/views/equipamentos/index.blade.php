@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>Equipamentos</h2>

  <div class="row">
      <div class="col">
          <a href="/equipamentos/novo" class="btn btn-primary">
            Novo Equipamento 
            <i class="fas fa-plus"></i>
          </a>
      </div>
      <div class="col ">
        <form action="">
          <div class="input-group justify-content-end">
            <div class="form-outline ">
              <input type="search" placeholder="pesquisar" id="form1" class="form-control" name="pesquisa"/>
              <label class="form-label" for="form1">Pesquisar</label>
            </div>
            <button type="submit" class="btn btn-primary">
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
                    <th>Equipamento</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>fornecedor</th>
                    <th>Ações</th>
                </tr>
              </thead>
              @foreach ($equipamentos as $item)
              <tbody>
                <tr>
                <td>{{ $item->id }}</td>
                    <td>{{ $item->equipamento }}</td>
                    <td>{{ $item->modelo }}</td>
                    <td>{{ $item->fabricante }}</td>
                    <td>{{ $item->fornecedor }}</td>
                    <td>
                    
                      <a href="equipamentos/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="equipamentos/deletar/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
             @endforeach
          </table>

        </div>
        <div>
        {{ $equipamentos->links() }}
        </div>
  </div>
</div>
@include('layout.footer')


