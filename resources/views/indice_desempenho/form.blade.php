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
            <h1 class="m-0">{{ isset($indice_desmpenho) ? 'Editar' : 'Novo' }} Índice</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/indice_desempenho">Índice Desempenho</a></li>
            <li class="breadcrumb-item active">{{ isset($indice_desmpenho) ? 'Editar' : 'Novo' }}</li>
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
            @isset($indice_desmpenho)
                <a href="/indice_desempenho/novo" class="btn btn-primary">
                    Novo Cliente
                    <i class="fas fa-plus"></i>
                </a>
            @endisset

  <form action="/indice_desempenho/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->id}}@else{{ old('id') }}@endif">
    <input type="hidden" name="codigo_cliente" value="@isset($indice_desmpenho){{$indice_desmpenho->codigo_cliente}}@else {{rand($min = 100000000, $max = 999999999)}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="fornecedor" class="form-label ">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" class="form-control fornecedor">
                    <option value="">selecione</option>
                    @foreach ($fornecedores as $key => $item)
                        <option value="{{$item->id}}"@if(isset($indice_desmpenho) && $indice_desmpenho->id == $item->id) selected @elseif(old('fornecedor') == $item->id) selected @endif data-fornecedor-cnpj="{{$item->cnpj}}">{{$item->razao_social}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="servico">CNPJ</label>
                <input type="text" name="cnpj" class="form-control cnpj" id="cnpj" readonly required value="@if(isset($indice_desmpenho)){{$indice_desmpenho->cnpj}}@else{{old('cnpj')}}@endisset">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="ano_referencia" class="form-label">Ano Referência:</label>
                <input type="date" name="ano_referencia" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->ano_referencia}}@else{{old('ano_referencia')}} @endif" >
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pedido_compra" class="form-label">Pedido de Compra:</label>
                <input type="text" name="pedido_compra" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedido_compra}}@else{{ old('pedido_compra') }}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="data_entrega" class="form-label">Data de Entrega:</label>
                <input type="date" name="data_entrega" class="form-control data_entrega" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->data_entrega}}@else{{old('data_entrega')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="pedidos_entregues" class="form-label">Nº de Pedidos Entregues:</label>
                <input type="number" name="pedidos_entregues" class="form-control pedidos_entregues" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_entregues}}@else{{old('pedidos_entregues')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pedidos_entregues_atraso" class="form-label">Nº de Pedidos Entregues com Atraso:</label>
                <input type="number" name="pedidos_entregues_atraso" class="form-control pedidos_entregues_atraso" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_entregues_atraso}}@else{{old('pedidos_entregues_atraso')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pedidos_devolvidos" class="form-label">Nº de Pedidos Devolvidos:</label>
                <input type="number" name="pedidos_devolvidos" class="form-control pedidos_devolvidos" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_devolvidos}}@else{{old('pedidos_devolvidos')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="pedidos_nao_conforme" class="form-label">Nº Pedidos Não Conforme:</label>
                <input type="number" name="pedidos_nao_conforme" class="form-control pedidos_nao_conforme" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_nao_conforme}}@else{{old('pedidos_nao_conforme')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="pontualidade" class="form-label">Pontualidade</label>
                <input type="text" name="pontualidade" class="form-control" readonly value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pontualidade}}@else{{old('pontualidade')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="conformidade" class="form-label">Conformidade no Recebimento (CR):</label>
                <input type="text" name="conformidade" class="form-control" readonly value="@if(isset($indice_desmpenho)){{$indice_desmpenho->conformidade}}@else{{old('conformidade')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="calculo_idf" class="form-label">Cálculo IDF:</label>
                <input type="text" name="calculo_idf" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->calculo_idf}}@else{{old('calculo_idf')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="desempenho_fornecedor" class="form-label">Resultado Desempenho do Fornecedor:</label>
                <input type="text" name="desempenho_fornecedor" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->desempenho_fornecedor}}@else{{old('desempenho_fornecedor')}}@endif">
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
    $('.fornecedor').on('change', function(){
        var cnpj = $(this).children('option:selected').attr('data-fornecedor-cnpj');
        console.warn(cnpj)
        if(cnpj){
            $('.cnpj').val(cnpj);
        }
    });
    var pedidos_entregues = $('.pedidos_entregues').onChange().val();
    console.log(pedidos_entregues);
</script>