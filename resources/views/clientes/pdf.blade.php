@include('layout.header_pdf')
<!-- Content Wrapper. Contains page content -->
<div class="">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Clientes</h1>
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
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap table-bordered ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>E-mail</th>
              </tr>
            </thead>
            @foreach ($clientes as $item)
            <tbody>
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nome }}</td>
                  <td>{{ $item->cpf_cnpj }}</td>
                  <td>{{ $item->email }}</td>
              </tr>
            </tbody>
            @endforeach
          </table>
          <br>
            @if(count($clientes) < 1)
            <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
              Nenhum registro encontrado!
            </div>
            @endif
        </div>
        <!-- /.card-body -->
      </div>


      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>
