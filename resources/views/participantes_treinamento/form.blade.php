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
            <h1 class="m-0">{{ isset($participantes_treinamento) ? 'Editar' : 'Novo' }} Participantes do Treinamento: <br>
            {{ $treinamento->titulo }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/participantes_treinamento">Participantes do Treinamento</a></li>
            <li class="breadcrumb-item active">{{ isset($participantes_treinamento) ? 'Editar' : 'Novo' }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="card">
    @isset($participantes_treinamento->id)
      
    <div class="card-header">
      <a href="/participantes_treinamento/novo" class="btn btn-primary">
        Novo Participante do Treinamento 
        <i class="fas fa-plus"></i>
      </a>
      <br><br>
      @endisset
  <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row card">
            <div class="col card-body">


      
                
@if($errors->any())
     <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
        </button>
            
        @foreach($errors->all() as $error)
         {{ $error }}<br/>
        @endforeach
        </div>
         @endif               

  <form action="/participantes_treinamento/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($participantes_treinamento){{$participantes_treinamento->id}}@endisset">
    <input type="hidden" name="registro_treinamento_id" value="{{$treinamento->id}}">
    
    <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="setor" class="form-label">Setor:</label>
                <select name="setor" id="setor" class="form-control">
                  <option value="">Selecione:</option>
                    @foreach ($setores as $key => $tipo)
                    <option value="{{ $tipo->setor }}" @if(isset($participantes_treinamento) && $participantes_treinamento->setor == $tipo->setor)  selected @elseif(old('setor') == $tipo) selected @endif >{{$tipo->setor}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-6">
        <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <select name="nome" id="nome" class="form-control">
                  <option value="">Selecione:</option>
                    @foreach ($colaboradores as $key => $tipo)
                    <option value="{{ $tipo->nome }}" @if(isset($participantes_treinamento) && $participantes_treinamento->nome == $tipo->nome)  selected @elseif(old('nome') == $tipo) selected @endif >{{$tipo->nome}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            </div>
           
        </div>
    </div>
    <div class="row">
        <div class="col" align="end">
            <button type="submit" class="btn btn-success w-25 hover-shadow">
                Salvar 
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
  </form>
</div>
</div>    
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


  

@include('layout.footer')