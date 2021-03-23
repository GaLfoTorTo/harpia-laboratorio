@include('layout.header')
@include('layout.menu')

<div class="container corpo">
  <h2>Documentos Externos</h2>

  <div class="row">
      <div class="col">
          <a href="/documentos_externos/novo" class="btn btn-primary">
            Novo Documento
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
                    <th>Título:</th>
                    <th>Revisão/Edição n°:</th>
                    <th>Código:</th>
                    <th>Localização</th>
                    <th>Data da atualização</th>
                    <th>Análise critica/verificação</th>
                    <th>Atualização em</th>
                    <th>N° de Exemplares</th>
                </tr>
              </thead>
              @foreach ($documento as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->revisao_edicao_n }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->n_de_exemplares}}</td>
                    <td>{{ $item->localizacao }}</td>
                    <td>{{ $item->data_da_atualizacao }}</td>
                    <td>{{ $item->analise_critica_verificacao }}</td>
                    <td>{{ $item->atualizacao_em }}</td>

                    <td>
                  
                      <a href="documentos_externos/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="documentos_externos/deletar/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
              @endforeach
          </table>

        </div>
        <div>
          {{ $documento->links() }}
        </div>
  </div>
</div>



@include('layout.footer')