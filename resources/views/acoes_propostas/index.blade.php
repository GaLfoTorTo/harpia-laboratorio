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
            <h1 class="m-0">Novas Ações Propostas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Novas Ações Propostas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->

        <div class="card">
          <div class="card-header">
            <a href="/acoes_propostas/novo" class="btn btn-primary">
                Novas Ações Propostas
              <i class="fas fa-plus"></i>
            </a>

            <div class="card-tools">
              <form action="">
                <div class="input-group input-group" style="width: 150px;">
                  <input type="text" name="pesquisa" class="form-control float-right" placeholder="Pesquisar" value="{{ $pesquisa }}">
  
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th>Ação</th>
                  <th>Responsável</th>
                  <th>Prazo</th>
                  <th>Prazo Final</th>
                  <th>Necessário Prorrogação</th>
                  <th>Data de Encerramento</th>
                  <th>Ações</th>
                </tr>
              </thead>
              @foreach ($acoes_propostas as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
<<<<<<< HEAD:resources/views/acoes_propostas/index.blade.php
                    <td>{{ $item->acao }}</td>
                    <td>{{ $item->responsavel }}</td>
                    <td>{{ $item->prazo }}</td>
                    <td>{{ $item->prazo_final }}</td>
                    <td>{{ $item->necessario_prorrogacao }}</td>
                    <td>{{ $item->data_encerramento }}</td>
=======
                    <td>{{ $item->equipamento }}</td>
                    <td>{{ $item->marca }}</td>
                    <td>{{ $item->modelo }}</td>
                    <td>{{ $item->fabricante }}</td>
                    <td>{{ $item->fornecedor->razao_social }}</td>
>>>>>>> 28d920a187d56c4018474835ac2699507944170b:resources/views/equipamentos_medicao/index.blade.php
                    <td>
                      <a href="acoes_propostas/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger" onclick="deleta('/acoes_propostas/deletar/{{ $item->id }}')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
              @endforeach
            </table>
            <br>
            @if(count($acoes_propostas) < 1)
            <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
              Nenhum registro encontrado!
            </div>
            @endif
          </div>
          
          <!-- /.card-body -->
        </div>
  <div class="row">
    <div class="col">
      {{ $acoes_propostas->links() }}
    </div>
  </div>

  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@include('layout.footer')