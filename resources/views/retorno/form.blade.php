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
            <h1 class="m-0">{{ isset($retorno) ? 'Editar' : 'Novo' }} Retorno ao reclamante</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/retorno">Retorno ao reclamante</a></li>
            <li class="breadcrumb-item active">{{ isset($retorno) ? 'Editar' : 'Novo' }}</li>
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
      <div class="row card">
        <div class="col card-body">
          <div class="row">
            <div class="col">
              @isset($retorno->id)
             
              <a href="/retorno/novo" class="btn btn-primary">
                Retorno ao reclamante
                <i class="fas fa-plus"></i>
              </a> 
              @endisset
              
            </div>
          </div>
          <br>
          
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

  <form action="/retorno/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($retorno){{$retorno->id}}@endisset">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
              <label >Retorno ao reclamante:</label>
              <textarea required class="form-control" name="descricao" id="descricao" rows="3"> @if(isset($retorno)){{$retorno->descricao}}@else{{ old('descricao')}}@endif</textarea>
            </div>
          </div>
        </div>     
    <div class="row">
        <div class="col-4">
            <div class="form-group">
              <label for="data_retorno" class="form-label">Data retorno:</label>
              <input  type="date" name="data_retorno" class="form-control" value="@if(isset($retorno)){{$retorno->data_retorno}}@else{{old('data_retorno')}} @endif">
          </div> 
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="colaborador_id" class="form-label">Responsável pelo retorno:</label>
              <select  name="colaborador_id" id="colaborador_id" class="form-control">
                <option value="">Selecione um Responsável</option>
                @foreach($colaboradores_id as $item)
                <option value="{{$item->id}}" @if(isset($retorno) &&$retorno->colaborador_id == $item->id) selected @elseif(old('colaborador_id') == $item->id) selected @endif>{{$item->nome}}
                </option>
              @endforeach
              </select>     
          </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="reclamacao_id" class="form-label">ID:</label>
              <input disabled type="text" name="reclamacao_id" class="form-control" value="{{$reclamacao_id}}">
          </div> 
          </div>
    </div>
       <div class="row">
        <div class="col" align="end">
            <br>
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