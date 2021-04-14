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
            <h1 class="m-0">{{ isset($equipamentos) ? 'Editar' : 'Novo' }} Equipamento</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/equipamentos">Equipamentos</a></li>
            <li class="breadcrumb-item active">{{ isset($equipamentos) ? 'Editar' : 'Novo' }}</li>
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


  <form action="/equipamentos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($equipamentos){{$equipamentos->id}}@endisset">
    
    <div class="row">
    <div class="col-4">
    <div class="form-group">
                <label for="equipamento_proprio" class="form-label">Equipamento Próprio:</label>
                <select name="equipamento_proprio" id="equipamento_proprio" class="form-control">
                    @foreach ($equipamento_proprio as $key => $proprio)
                        <option value="{{ $proprio->equipamento_proprio }}" {{ isset($equipamentos) && $equipamentos->equipamento_proprio == $proprio->equipamento_proprio ? 'selected' : ''}} >{{$proprio->equipamento_proprio}}</option>
                    @endforeach
                    
                </select>
                
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="equipamento" class="form-label">Equipamento:</label>
                <input type="text" name="equipamento" class="form-control equipamento" required value="@isset($equipamentos){{$equipamentos->equipamento}} @else {{ old('equipamento')}} @endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" class="form-control" value="@isset($equipamentos){{$equipamentos->marca}}@else {{ old('marca')}} @endisset">
            </div>
            </div>
    </div>
    <div class="row">
        <div class="col-4">
        <div class="form-group">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="number" name="modelo" class="form-control fone" value="@isset($equipamentos){{$equipamentos->modelo}}@else {{ old('modelo')}} @endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="tensao" class="form-label">Tensão:</label>
                <select name="tensao" id="tensao" class="form-control selecao">
                        <option value=""></option>
                    @foreach ($tensao as $key => $t)
                        <option value="{{ $t->tensao }}" {{ isset($equipamentos) && $equipamentos->tensao == $t->tensao ? 'selected' : ''}} >{{$t->tensao}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="manual" class="form-label">Manual:</label>
                <select name="manual" id="manual" class="form-control selecao alteraManual">
                        <option value=""></option>
                    @foreach ($manual as $key => $man)
                        <option value="{{ $man->manual }}" {{ isset($equipamentos) && $equipamentos->manual == $man->manual ? 'selected' : ''}} >{{$man->manual}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
        <div class="form-group">
                <label for="num_serie" class="form-label">Número de Série:</label>
                <input type="number" name="num_serie" class="form-control" value="@isset($equipamentos){{$equipamentos->num_serie}}@else {{ old('num_serie')}} @endisset">
            </div>
        </div>
        <div class="col-6 camposLocalizacao" >


        <div class="form-group">
                <label for="localizacao_manual" class="form-label">Localização Manual:</label>
                <input type="text" name="localizacao_manual" class="form-control" value="@isset($equipamentos){{$equipamentos->localizacao_manual}}@else {{ old('localizacao_manual')}} @endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="doc_instrucao" class="form-label">Documento de Instrução:</label>
                <input type="text" name="doc_instrucao" class="form-control" value="@isset($equipamentos){{$equipamentos->doc_instrucao}}@else {{ old('doc_instrucao')}} @endisset">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        <div class="form-group">
                <label for="codigo" class="form-label">Código:</label>
                <input type="number" name="codigo" class="form-control" value="@isset($equipamentos){{$equipamentos->codigo}}@else {{ old('codigo')}} @endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="patrimonio" class="form-label">Patrimônio:</label>
                <input type="text" name="patrimonio" class="form-control" value="@isset($equipamentos){{$equipamentos->patrimonio}}@else {{ old('patrimonio')}} @endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" name="fabricante" class="form-control" value="@isset($equipamentos){{$equipamentos->fabricante}}@else {{ old('fabricante')}} @endisset">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-5">
        <div class="form-group">
                <label for="fornecedor" class="form-label">Fornecedor:</label>
                <input type="text" name="fornecedor" class="form-control" value="@isset($equipamentos){{$equipamentos->fornecedor}}@else {{ old('fornecedor')}} @endisset">
            </div>
        </div>
        <div class="col-7">
        <div class="form-group">
                <label for="localizacao_equipamento" class="form-label">Localização Equipamento:</label>
                <input type="text" name="localizacao_equipamento" class="form-control" value="@isset($equipamentos){{$equipamentos->localizacao_equipamento}}@else {{ old('localizacao_equipamento')}} @endisset">
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