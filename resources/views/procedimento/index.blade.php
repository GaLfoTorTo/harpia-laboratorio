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
            <h1 class="m-0">Procedimento</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Procedimento</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


  <section class="content">
      <div class="container-fluid">

  <div class="card">
          <div class="card-header">
            <a href="/procedimento/novo" class="btn btn-primary">
              Novo Procedimento
              <i class="fas fa-plus"></i>
            </a>

            <div class="card-tools">
              <form action="">
                <div class="input-group input-group" style="width: 150px;">
                <input type="search" id="form1" class="form-control" name="pesquisa"/>
              <label class="form-label" for="form1"></label>
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
                    <th>Rev</th>
                    <th>Data</th>
                    <th>Analista</th>
                    <th>Lote</th>
                    <th>Responsável</th>
                </tr>
              </thead>
              @foreach ($procedimento as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->rev}}</td>
                    <td>{{ $item->data}}</td>
                    <td>{{ $item->analista}}</td>
                    <td>{{ $item->lote}}</td>
                    <td>{{ $item->responsavel}}</td>
                    
                    <td>
                  
                      <a href="procedimento/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger" onclick="deleta('/procedimento/deletar/{{ $item->id }}')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
              @endforeach
          </table>
          <br>
            @if(count($procedimento) < 1)
            <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
              Nenhum registro encontrado!
            </div>
            @endif
        </div>
        <div>
          {{ $procedimento->links() }}
        </div>
  </div>
</div>
</div>
</div>



@include('layout.footer')