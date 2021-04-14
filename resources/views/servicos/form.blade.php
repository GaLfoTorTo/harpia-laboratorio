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
            <h1 class="m-0">{{ isset($servico) ? 'Editar' : 'Novo' }} serviço</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/servicos">Serviços</a></li>
            <li class="breadcrumb-item active">{{ isset($servico) ? 'Editar' : 'Novo' }}</li>
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

  <form action="/servicos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($servico){{$servico->id}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
              <input type="text" name="descricao" class="form-control" required value="@if(isset($servico)){{$servico->descricao}}@else{{ old('descricao')}}@endif">
              <label for="descricao" class="form-label">Descrição:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <select name="tipo_material" id="tipo_material" class="form-control">
                    <option value="">Selecione tipo material</option>
                    @foreach ($tipo_material as $key => $tipo)
                    <option class="tipo_material" value="{{$tipo}}" @if(@isset($servico) && $servico->tipo_material == $tipo)selected @elseif(old('tipo_material') == $tipo) selected @endif >{{$tipo}}   
                    </option>
                    @endforeach
                    
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <select name="tipo_servico" id="tipo_servico" class="form-control">
                    <option value="">Selecione o tipo do serviço</option>
                    @foreach ($tipo_servico as $key => $tipo)
                    <option class="tipo_servico" value="{{$tipo}}" @if(@isset($servico) && $servico->tipo_servico == $tipo)selected @elseif(old('tipo_servico') == $tipo) selected @endif >{{$tipo}}   
                    </option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <select name="servico_critico" id="servico_critico" class="form-control">
                    <option value="">Serviço crítico?</option>
                    <option value="Sim" {{ isset($servico) && $servico->servico_critico == 'Sim'  || old('servico_critico') == 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ isset($servico) && $servico->servico_critico == 'Não' || old('servico_critico') == 'Não' ? 'selected' : '' }}>Não</option>
                    
                </select>
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