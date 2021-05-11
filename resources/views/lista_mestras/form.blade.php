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
            <h1 class="m-0">{{ isset($lista_mestra) ? 'Editar ' : 'Nova ' }}Lista Mestra</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/lista_mestras">Lista Mestra</a></li>
            <li class="breadcrumb-item active">{{ isset($lista_mestra) ? 'Editar' : 'Novo' }}</li>
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


  <form action="/lista_mestras/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($lista_mestra){{$lista_mestra->id}}@endisset">
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="">Selecione</option>
                    @foreach ($tipos as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="codigo" class="form-label">Código:</label>
                <select name="codigo" id="codigo" class="form-control">
                    <option value="">Selecione</option>
                    @foreach ($documentos as $key => $t)
                      <option value="{{ $t->codigo }}" @if(isset($lista_mestra) && $lista_mestra->codigo == $t->codigo)  selected @elseif(old('documentos') == $t) selected @endif >{{$t->codigo}} - {{$t->titulo}}</option> 
                  @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="revisao_n" class="form-label">Número de Revisão:</label>
                <input type="number" name="revisao_n" class="form-control"value="@if(isset($lista_mestra)){{$lista_mestra->revisao_n}}@else{{ old('revisao_n')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">    
        <div class="col-4">
            <label for="data_aprovacao" class="form-label">Data de Aprovação:</label>
            <input type="date" name="data_aprovacao" class="form-control data_aprovacao"value="@if(isset($lista_mestra)){{$lista_mestra->data_aprovacao}}@else{{ old('cep')}}@endif">
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="n_copias" class="form-label">Número de Cópias:</label>
                <input type="number" name="n_copias" class="form-control"value="@if(isset($lista_mestra)){{$lista_mestra->n_copias}}@else{{ old('n_copias')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="data_analise" class="form-label">Data da Análise:</label>
                <input type="date" name="data_analise" class="form-control"value="@if(isset($lista_mestra)){{$lista_mestra->data_analise}}@else{{ old('data_analise')}}@endif">
            </div>        
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="atualizacao_em" class="form-label">Atualização em:</label>
                <input type="date" name="atualizacao_em" class="form-control"value="@if(isset($lista_mestra)){{$lista_mestra->atualizacao_em}}@else{{ old('atualizacao_em')}}@endif">
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="carregar documento:" class="form-label">Carregar Documento:</label>
                <input type="file" name="documento_temp" class="form-control">
       
                  @if(isset($documento) && $documento->documento != '')
                    <a href="{{ $documento->documento }}" target="_blank">Ver Documento</a>
                @endif
            </div>
        </div>
        <div class="col-4">
            
                <div class="form-group">
                   
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
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@include('layout.footer')