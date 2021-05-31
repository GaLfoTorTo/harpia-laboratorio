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
            <h1 class="m-0">{{ isset($equipamentos) ? 'Editar' : 'Novo' }} Equipamentos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/equipamentos">Equipamentos</a></li>
            <li class="breadcrumb-item active">{{ isset($equipamentos) ? 'Editar' : 'Novo' }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="card">
        @isset($equipamentos->id)

    <div class="card-header">
      <a href="/equipamentos/novo" class="btn btn-primary">
        Novo Equipamento 
        <i class="fas fa-plus"></i>
      </a>
      @endisset
      <br><br>
     
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


  <form action="/equipamentos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($equipamentos){{$equipamentos->id}}@endisset">
    
    <div class="row">
    <div class="col-4">
    <div class="form-group">
                <label for="equipamento_proprio" class="form-label">Equipamento Próprio:</label>
                <select name="equipamento_proprio" id="equipamento_proprio" class="form-control selecao">
                    <option value="">Selecione:</option>
                    @foreach ($equipamento_proprio as $key => $t)
                    <option value="{{ $t }}" @if(isset($equipamentos) && $equipamentos->equipamento_proprio == $t)  selected @elseif(old('equipamento_proprio') == $t) selected @endif >{{ $t }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="equipamento" class="form-label">Equipamento:</label>
                <input type="text" name="equipamento" class="form-control equipamento" required value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->equipamento}}@else{{old("equipamento")}}@endif">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" class="form-control" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->marca}}@else{{old("marca")}}@endif">
            </div>
            </div>
    </div>
    <div class="row">
        <div class="col-4">
        <div class="form-group">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" name="modelo" class="form-control fone" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->modelo}}@else{{old("modelo")}}@endif">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="tensao" class="form-label">Tensão:</label>
                <select name="tensao" id="tensao" class="form-control selecao">
                    <option value="">Selecione:</option>
                    @foreach ($tensao as $key => $t)
                        <option value="{{ $t }}" @if(isset($equipamentos) && $equipamentos->tensao == $t)  selected @elseif(old('tensao') == $t) selected @endif >{{$t}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="manual" class="form-label">Manual:</label>
                <select name="manual" id="manual" class="form-control selecao alteraManual">
                    <option value="">Selecione:</option>
                    @foreach ($manual as $key => $t)
                        <option value="{{ $t}}" @if(isset($equipamentos) && $equipamentos->manual == $t)  selected @elseif(old('manual') == $t) selected @endif >{{$t}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
        <div class="form-group">
                <label for="num_serie" class="form-label">Número de Série:</label>
                <input type="text" name="num_serie" class="form-control" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->num_serie}}@else{{old("num_serie")}}@endif">
            </div>
        </div>
        <div class="col-6 camposLocalizacao" >
        <div class="form-group">
                <label for="localizacao_manual" class="form-label">Localização Manual:</label>
                <select name="localizacao_manual" id="localizacao_manual" class="form-control">
                    @foreach ($setor as $key => $tipo)
                        <option value="{{$tipo->setor}}"@if(isset($equipamentos) && $equipamentos->localizacao_manual == $tipo->setor) selected @elseif(old('localizacao_manual') == $tipo->setor) selected @endif>{{$tipo->setor}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="doc_instrucao" class="form-label">Documento de Instrução:</label>
                <input type="text" name="doc_instrucao" class="form-control" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->doc_instrucao}}@else{{old("doc_instrucao")}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        <div class="form-group">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" name="codigo" class="form-control" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->codigo}}@else{{old("codigo")}}@endif">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="patrimonio" class="form-label">Patrimônio:</label>
                <input type="text" name="patrimonio" class="form-control" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->patrimonio}}@else{{old("patrimonio")}}@endif">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" name="fabricante" class="form-control" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->fabricante}}@else{{old("fabricante")}}@endif">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-5">
        <div class="form-group">
            <label for="fornecedor" class="form-label">Fornecedor:</label>
            <select name="fornecedor" id="fornecedor" class="form-control selecao">
                @foreach ($fornecedores as $key => $t)
                <option value="{{ $t->razao_social }}" @if(isset($equipamentos) && $equipamentos->fornecedor == $t->razao_social)  selected @elseif(old('fornecedor') == $t->razao_social) selected @endif >{{$t->razao_social}}</option>
              @endforeach
            </select>
            </div>
        </div>
            <div class="col-7">
                <div class="form-group">
                    <label for="localizacao_equipamento" class="form-label">Localizacão do Equipamento:</label>
                    <select name="localizacao_equipamento" id="localizacao_equipamento" class="form-control">
                        @foreach ($setor as $key => $tipo)
                            <option value="{{$tipo->setor}}"@if(isset($equipamentos) && $equipamentos->localizacao_equipamento == $tipo->setor) selected @elseif(old('localizacao_equipamento') == $tipo->setor) selected @endif>{{$tipo->setor}}</option>
                        @endforeach
                    </select>
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
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@include('layout.footer')


        


            

            
            