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
                <label for="codigo" class="form-label">Título</label>
                <select name="codigo" id="codigo" class="form-control select_codigo">
                    <option value="">selecione</option>
                    @foreach ($documentos as $key => $tipo)
                        <option class="codigo" value="{{$tipo->titulo}}" @if(isset($lista_mestra) && $lista_mestra->titulo) selected @elseif(old('codigo') == $tipo->titulo) selected @endif data-codigo="{{$tipo->codigo}}" data-tipo="{{$tipo->tipo}}" data-revisao_edicao_n="{{$tipo->revisao_edicao_n}}" data-tipo_documento="{{$tipo->tipo_documento}}" data-data_aprovacao="{{$tipo->data_aprovacao}}" data-num_copias="{{$tipo->num_copias}}" data-data_analise="{{$tipo->created_at}}" data-atualizacao_em="{{$tipo->atualizacao_em}}" data-documento="{{$tipo->documento}}">{{$tipo->titulo}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <div class="form-group">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="number" name="codigo" id="codigo" class="form-control codigo"value="@if(isset($lista_mestra)){{$lista_mestra->codigo}}@else{{ old('codigo')}}@endif" readonly>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <div class="form-group">
                    <label for="tipo" class="form-label">Tipo</label>
                    <input type="text" name="tipo" id="tipo" class="form-control tipo"value="@if(isset($lista_mestra)){{$lista_mestra->tipo}}@else{{ old('tipo')}}@endif" readonly>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="revisao_n" class="form-label">Número de Revisão:</label>
                <input type="number" name="revisao_n" id="revisao_n" class="form-control revisao_n"value="@if(isset($lista_mestra)){{$lista_mestra->revisao_n}}@else{{ old('revisao_n')}}@endif" readonly>
            </div>
        </div>
    </div>
    <div class="row">    
        <div class="col-4">
            <label for="data_aprovacao" class="form-label" id="data_aprovacao">Data de Aprovação:</label>
            <input type="date" name="data_aprovacao" class="form-control data_aprovacao"value="@if(isset($lista_mestra)){{$lista_mestra->data_aprovacao}}@else{{ old('cep')}}@endif" readonly>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="n_copias" class="form-label" id="num_copias">Número de Cópias:</label>
                <input type="number" name="n_copias" class="form-control n_copias"value="@if(isset($lista_mestra)){{$lista_mestra->n_copias}}@else{{ old('n_copias')}}@endif" readonly>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="data_analise" class="form-label" id="data_analise">Data da Análise:</label>
                <input type="date" name="data_analise" class="form-control"value="@if(isset($lista_mestra)){{$lista_mestra->data_analise}}@else{{ old('data_analise')}}@endif" readonly>
            </div>        
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="atualizacao_em" class="form-label" id="atualizacao_em">Atualização em:</label>
                <input type="date" name="atualizacao_em" class="form-control atualizacao_em"value="@if(isset($lista_mestra)){{$lista_mestra->atualizacao_em}}@else{{ old('atualizacao_em')}}@endif" readonly>
            </div>
        </div>
        <div class="col-8">
            <div class="form-group">
                <label for="carregar documento:" class="form-label" id="documento">Carregar Documento:</label>
                <input type="file" name="documento_temp" class="form-control documento" readonly>
       
                  @if(isset($documento) && $documento->documento != '')
                    <a href="{{ $documento->documento }}" target="_blank">Ver Documento</a>
                @endif
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
<script>
    $(documento).ready(function(){
        $('.select_codigo').on('change', function(){
            var codigo = $(this).children('option:selected').attr('data-codigo');
            var tipo = $(this).children('option:selected').attr('data-tipo');
            var revisao_edicao_n = $(this).children('option:selected').attr('data-revisao_edicao_n');
            var data_aprovacao = $(this).children('option:selected').attr('data-data_aprovacao');
            var num_copias = $(this).children('option:selected').attr('data-num_copias');
            var data_analise = $(this).children('option:selected').attr('data-data_analise');
            var atualizacao_em = $(this).children('option:selected').attr('data-atualizacao_em');
            var documento = $(this).children('option:selected').attr('data-documento');
            var tipo_documento = $(this).children('option:selected').attr('data-tipo_documento');

            if(data_analise != ''){
                $('.codigo').val(codigo);
                $('.tipo').val(tipo);
                $('.revisao_n').val(revisao_edicao_n);
                $('.data_aprovacao').val(data_aprovacao);
                $('.num_copias').val(num_copias);
                $('.data_analise').val(data_analise);
                $('.atualizacao_em').val(atualizacao_em);
                $('.documento').val(documento);
            }
        })
    })
</script>