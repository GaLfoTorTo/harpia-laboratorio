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
            <h1 class="m-0">Fornecedores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Fornecedores</li>
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
            <a href="/fornecedores/novo" class="btn btn-primary">
              Novo fornecedor 
              <i class="fas fa-plus"></i>
            </a>

            <div class="card-tools">
              <form action="">
                <div class="input-group input-group" style="width: 150px;">
                  <input type="search" id="form1" class="form-control" name="pesquisa">
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
                  
                  <th>tipo</th>
                  <th>cnpj</th>
                  <th>razao_social</th>
                  <th>telefone</th>
                  <th>email</th>
                </tr>
              </thead>
              @foreach ($fornecedores as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->cnpj }}</td>
                    <td>{{ $item->razao_social }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                      <a href="fornecedores/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger" onclick="deleta('/fornecedores/deletar/{{ $item->id }}')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
              </tbody>
              @endforeach
            </table>
            <br>
            @if(count($fornecedores) < 1)
            <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
              Nenhum registro encontrado!
            </div>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
  <div class="row">
    <div class="col">
      {{ $fornecedores->links() }}
    </div>
  </div>

  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@include('layout.footer')