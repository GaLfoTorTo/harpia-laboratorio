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
            <h1 class="m-0">Documento</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Documento</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container corpo">
  

  <section class="content">
      <div class="container-fluid">

  <div class="card">
          <div class="card-header">
            <a href="/documento/novo" class="btn btn-primary">
              Novo documento 
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
                    <th>Título:</th>
                    <th>Código:</th>
                    <th>Localização</th>
                    <th>Documento</th>
                </tr>
              </thead>
              @foreach ($documento as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->localizacao }}</td>
                    <td>{{ $item->documento}}</td>
                    <td>
                      <a href="documento/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger" onclick="deleta('/documento/deletar/{{ $item->id }}')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                </tr>
              </tbody>
              @endforeach
          </table>
          <br>
          @if(count($documento) < 1)
              <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
              Nenhum registro encontrado!
              </div>
            @endif

        </div>
        <div>
           {{ $documento->links() }}
        </div>
  </div>
</div>
</div>
  </div>
</div>
</div>
@include('layout.footer')


