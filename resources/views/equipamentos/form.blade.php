@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<script>
@if(isset($equipamentos) && $equipamentos->tipo_equipamento == 'medicao')
    .equipamentos_medicao{
        display: none;
    }
@else
    .equipamentos_insumo{
        display: none;
    }
@endif
</script>

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


  <form action="/equipamentos/salvar" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="@isset($equipamentos){{$equipamentos->id}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="tipo_equipamento" onclick="alteraTipo('medicao')">Medição</label>
                <input type="radio" class="tipo_equipamento" checked name="tipo_equipamento" id="medicao" onclick="alteraTipo('medicao')" value="medicao" @if(isset($equipamentos) && $equipamentos->tipo_equipamento == 'medicao') checked @elseif(old('tipo_equipamento') == "medicao") checked @endif>
                <label for="tipo_equipamento" onclick="alteraTipo('insumos')"> Insumos</label>
                <input type="radio" class="tipo_equipamento" name="tipo_equipamento" id="insumos" onclick="alteraTipo('insumos')" value="insumos" @if(isset($equipamentos) && $equipamentos->tipo_equipamento == 'insumos') checked @elseif(old('tipo_equipamento') == "insumos") checked @endif>
            </div>
        </div> 
    </div>
    <div class="row">
    <div class="col-4 equipamentos_medicao">
    <div class="form-group">
                <label for="equipamento_proprio" class="form-label">Equipamento Próprio:</label>
                <select name="equipamento_proprio" id="equipamento_proprio" class="form-control selecao ">
                    <option value="">Selecione:</option>
                    @foreach ($equipamento_proprio as $key => $t)
                    <option value="{{ $t }}" @if(isset($equipamentos) && $equipamentos->equipamento_proprio == $t)  selected @elseif(old('equipamento_proprio') == $t) selected @endif >{{ $t }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="equipamento" class="form-label">Equipamento:</label>
                <input type="text" name="equipamento" class="form-control " value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->equipamento}}@else{{old("equipamento")}}@endif">
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" class="form-control " value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->marca}}@else{{old("marca")}}@endif">
            </div>
            </div>
    </div>
    <div class="row">
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" name="modelo" class="form-control equipamentos_medicao" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->modelo}}@else{{old("modelo")}}@endif">
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="tensao" class="form-label">Tensão:</label>
                <select name="tensao" id="tensao" class="form-control selecao equipamentos_medicao">
                    <option value="">Selecione:</option>
                    @foreach ($tensao as $key => $t)
                        <option value="{{ $t }}" @if(isset($equipamentos) && $equipamentos->tensao == $t)  selected @elseif(old('tensao') == $t) selected @endif >{{$t}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="manual" class="form-label">Manual:</label>
                <select name="manual" id="manual" class="form-control selecao equipamentos_medicao">
                    <option value="">Selecione:</option>
                    @foreach ($manual as $key => $t)
                        <option value="{{ $t}}" @if(isset($equipamentos) && $equipamentos->manual == $t)  selected @elseif(old('manual') == $t) selected @endif >{{$t}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2 equipamentos_medicao">
        <div class="form-group">
                <label for="num_serie" class="form-label">Número de Série:</label>
                <input type="text" name="num_serie" class="form-control equipamentos_medicao" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->num_serie}}@else{{old("num_serie")}}@endif">
            </div>
        </div>
        <div class="col-6 equipamentos_medicao" >
        <div class="form-group">
                <label for="localizacao_manual" class="form-label">Localização Manual:</label>
                <select name="localizacao_manual" id="localizacao_manual" class="form-control equipamentos_medicao">
                    <option value="">Selecione:</option>
                    @foreach ($setor as $key => $tipo)
                        <option value="{{$tipo->setor}}"@if(isset($equipamentos) && $equipamentos->localizacao_manual == $tipo->setor) selected @elseif(old('localizacao_manual') == $tipo->setor) selected @endif>{{$tipo->setor}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="doc_instrucao" class="form-label">Documento de Instrução:</label>
                <input type="text" name="doc_instrucao" class="form-control equipamentos_medicao" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->doc_instrucao}}@else{{old("doc_instrucao")}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" name="codigo" class="form-control equipamentos_medicao" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->codigo}}@else{{old("codigo")}}@endif">
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="patrimonio" class="form-label">Patrimônio:</label>
                <input type="text" name="patrimonio" class="form-control equipamentos_medicao" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->patrimonio}}@else{{old("patrimonio")}}@endif">
            </div>
        </div>
        <div class="col-4 equipamentos_medicao">
        <div class="form-group">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" name="fabricante" class="form-control equipamentos_medicao" value="@if(isset($equipamentos) && $equipamentos){{$equipamentos->fabricante}}@else{{old("fabricante")}}@endif">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-5 equipamentos_medicao">
        <div class="form-group">
            <label for="fornecedor" class="form-label">Fornecedor:</label>
            <select name="fornecedor" id="fornecedor" class="form-control selecao equipamentos_medicao">
                <option value="">Selecione:</option>
                @foreach ($fornecedores as $key => $t)
                <option value="{{ $t->razao_social }}" @if(isset($equipamentos) && $equipamentos->fornecedor == $t->razao_social)  selected @elseif(old('fornecedor') == $t->razao_social) selected @endif >{{$t->razao_social}}</option>
              @endforeach
            </select>
            </div>
        </div>
            <div class="col-7 equipamentos_medicao">
                <div class="form-group">
                    <label for="localizacao_equipamento" class="form-label">Localizacão do Equipamento:</label>
                    <select name="localizacao_equipamento" id="localizacao_equipamento" class="form-control equipamentos_medicao">
                        <option value="">Selecione:</option>
                        @foreach ($setor as $key => $tipo)
                            <option value="{{$tipo->setor}}"@if(isset($equipamentos) && $equipamentos->localizacao_equipamento == $tipo->setor) selected @elseif(old('localizacao_equipamento') == $tipo->setor) selected @endif>{{$tipo->setor}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-4 equipamentos_insumo">
                <div class="form-group">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control equipamentos_insumo" value="@isset($equipamentos_insumos){{$equipamentos_insumos->nome}}@endisset">
                    </div>
                </div>
                <div class="col-4 equipamentos_insumo">
                    <div class="form-group">
                          <label for="produto_critico" class="form-label">Produto Crítico:</label>
                          <select name="produto_critico" id="produto_critico" class="form-control selecao equipamentos_insumo">
                            <option value="">Selecione</option>
                                @foreach ($produto_critico as $key => $t)
                                  <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->produto_critico == $t)  selected @elseif(old('produto_critico') == $t) selected @endif >{{$t}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-4 equipamentos_insumo">
                    <div class="form-group">
                            <label for="materiais_referencia" class="form-label">Materiais de Referência:</label>
                            <select name="materiais_referencia" id="materiais_referencia" class="form-control selecao equipamentos_insumo">
                              <option value="">Selecione</option>
                                  @foreach ($materiais_referencia as $key => $t)
                                    <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->materiais_referencia == $t) selected @elseif(old('materiais_referencia') == $t) selected @endif >{{$t}}</option>
                                  @endforeach
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="row">
                  <div class="col-4 equipamentos_insumo">
                    <div class="form-group">
                            <label for="materiais" class="form-label">Materiais:</label>
                            <select name="materiais" id="materiais" class="form-control selecao equipamentos_insumo">
                              <option value="">Selecione:</option>
                                @foreach ($materiais as $key => $t)
                                    <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->materiais == $t)  selected @elseif(old('materiais') == $t) selected @endif >{{$t}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4 equipamentos_insumo">
                        <div class="form-group">
                            <label for="desc_produto" class="form-label">Descrição do Produto:</label>
                            <input type="text" name="desc_produto" class="form-control equipamentos_insumo" value="@isset($equipamentos_insumos){{$equipamentos_insumos->desc_produto}}@endisset">
                        </div>
                      </div>
                      <div class="col-4 equipamentos_insumo">
                      <div class="form-group">
                              <label for="quantidade" class="form-label">Quantidade:</label>
                              <input type="number" name="quantidade" class="form-control equipamentos_insumo" value="@isset($equipamentos_insumos){{$equipamentos_insumos->quantidade}}@endisset">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-4 equipamentos_insumo">
                          <div class="form-group">
                              <label for="unidade" class="form-label">Unidade:</label>
                              <select name="unidade" id="unidade" class="form-control selecao equipamentos_insumo">
                                  <option value="">Selecione</option>
                                    @foreach ($unidade as $key => $t)
                                      <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->unidade == $t)  selected @elseif(old('unidade') == $t) selected @endif >{{$t}}</option>
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

<script>
    function alteraTipo(tipo) {

        if(tipo == 'medicao') {
            $('.equipamentos_medicao').show();
            $('.equipamentos_insumo').hide();
        } else {
            $('.equipamentos_medicao').hide();
            $('.equipamentos_insumo').show();
        }
    }

    $(document).ready(function(){
        var tipo_doc = $('.tipo_equipamento').Chilldren().is('checked');
        console.log(tipo_doc);
    })
</script>


        


            

            
            