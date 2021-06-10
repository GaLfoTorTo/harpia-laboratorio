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
            <h1 class="m-0">Registro de ocorrência</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item active">Registro de ocorrência</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


  <section class="content">
      <div class="container-fluid">

  <div class="card">
          <div class="card-header">
            <a href="/registro_de_ocorrencia/novo" class="btn btn-primary">
              Novo Registro 
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
                    <th>Número</th>
                    <th>Origem</th>
                    <th>Data de Abertura</th>
                    <th>Identificacao do Equipamento</th>
                    <th>Descrever Correcão</th>
                    <th>Ocorrencia e um Trabalho NC</th>
                    <th>Registro de AC n</th>
                    <th>Parecer Tecnico</th>
                    <th>Observacões</th>
                </tr>
              </thead>
              @foreach ($registro as $item)
              <tbody>
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->numero }}</td>
                    <td>{{ $item->origem }}</td>
                    <td>{{ $item->data_de_abertura}}</td>
                    <td>{{ $item->identificacao_do_equipamento}}</td>
                    <td>{{ $item->descrever_correcao}}</td>
                    <td>{{ $item->ocorrencia_e_um_trabalho_NC}}</td>
                    <td>{{ $item->registro_de_AC_n}}</td>
                    <td>{{ $item->parecer_tecnico}}</td>
                    <td>{{ $item->observacoes}}</td>

                    <td>
                  
                      <a href="registro_de_ocorrencia/editar/{{ $item->id }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-danger" onclick="deleta('/registro_de_ocorrencia/deletar/{{ $item->id }}')">
                       <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
              @endforeach
          </table>
            <br>
            @if(count($registro) < 1)
              <div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
              Nenhum registro encontrado!
              </div>
            @endif


        </div>
        <div>
          {{ $registro->links() }}
        </div>
  </div>
</div>
</div>
</div>



@include('layout.footer')