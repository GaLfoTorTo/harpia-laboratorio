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
            <h1 class="m-0">Participantes do Treinamento</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Participantes do Treinamento</li>
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
            <a href="/participantes_treinamento/novo" class="btn btn-primary">
              Novo Participante do Treinamento 
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
                  <th>N°</th>
                  <th>Setor</th>
                  <th>Nome</th>
                  <th>Assinatura</th>
                  <th>Opções</th>
                </tr>
              </thead>
              @foreach ($participantes_treinamento as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->numero }}</td>
                    <td>{{ $item->setor }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->assinatura }}</td>
                    <td>
                      <a href="participantes_treinamento/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="participantes_treinamento/deletar/{{ $item->id }}" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
  <div class="row">
    <div class="col">
      {{ $participantes_treinamento->links() }}
    </div>
  </div>

  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@include('layout.footer')