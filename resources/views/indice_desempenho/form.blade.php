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
        <div class="col-6">
            <div class="form-group">
                <label for="pedidos_entregues" class="form-label">Nº de Pedidos Entregues:</label>
                <input type="number" id="pedidos_entregues" name="pedidos_entregues" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_entregues}}@else{{old('pedidos_entregues')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="pedidos_entregues_atraso" class="form-label">Nº de Pedidos Entregues com Atraso:</label>
                <input type="number" id="pedidos_entregues_atraso" name="pedidos_entregues_atraso" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_entregues_atraso}}@else{{old('pedidos_entregues_atraso')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="pedidos_devolvidos" class="form-label">Nº de Pedidos Devolvidos:</label>
                <input type="number" id="pedidos_devolvidos" name="pedidos_devolvidos" class="form-control " value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_devolvidos}}@else{{old('pedidos_devolvidos')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="pedidos_nao_conforme" class="form-label">Nº Pedidos Não Conforme:</label>
                <input type="number" id="pedidos_nao_conforme" name="pedidos_nao_conforme" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pedidos_nao_conforme}}@else{{old('pedidos_nao_conforme')}}@endif" onchange="algoritmo(this)">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="pontualidade" class="form-label">Pontualidade</label>
                <input type="text" name="pontualidade" id="pontualidade" class="form-control" readonly value="@if(isset($indice_desmpenho)){{$indice_desmpenho->pontualidade}}@else{{old('pontualidade')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="conformidade" class="form-label">Conformidade no Recebimento (CR):</label>
                <input type="text" id="conformidade" name="conformidade" class="form-control" readonly value="@if(isset($indice_desmpenho)){{$indice_desmpenho->conformidade}}@else{{old('conformidade')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="calculo_idf" class="form-label">Cálculo IDF:</label>
                <input type="text" name="calculo_idf" name="calculo_idf" class="form-control" readonly value="@if(isset($indice_desmpenho)){{$indice_desmpenho->calculo_idf}}@else{{old('calculo_idf')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="desempenho_fornecedor" class="form-label">Resultado Desempenho do Fornecedor:</label>
                <input type="text" id="desempenho_fornecedor" name="desempenho_fornecedor" class="form-control" value="@if(isset($indice_desmpenho)){{$indice_desmpenho->desempenho_fornecedor}}@else{{old('desempenho_fornecedor')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card" >
                <div class="card-header bg-secondary" align='center'>
                    <h5>Classificação IDF</h5>
                </div>
                <div class="card-body">
                    <table class='table text-nowrap table-bordered '>
                        <tbody align='center'>
                            <tr class="bg-success">
                                <td>Conceito A</td>
                                <td>≥ 90%</td>
                            </tr>
                            <tr class="bg-warning">
                                <td>Conceito B</td>
                                <td>≥ 50% a < 90%</td>
                            </tr>
                            <tr class="bg-orange">
                                <td>Conceito C</td>
                                <td>≥ 20% a < 50%</td>
                            </tr>
                            <tr class="bg-danger">
                                <td>Conceito D</td>
                                <td>< 20%</td>
                            </tr>
                        </tbody>
                    </table>
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

    const algoritmo = (input) => {
        
        var pedidos_entregues = $('#pedidos_entregues').val();
        var pedidos_entregues_atraso = $('#pedidos_entregues_atraso').val();
        var pedidos_devolvidos = $('#pedidos_devolvidos').val();
        var pedidos_nao_conforme = input.value;

        var pontualidade = ((pedidos_entregues - pedidos_entregues_atraso) / pedidos_entregues) * 100;
        var conformidade = ((pedidos_entregues) - (pedidos_devolvidos * 0.80) - (pedidos_nao_conforme * 0.20) / pedidos_entregues) * 100;
        var calculo_idf = (pontualidade * 0,60) + (conformidade * 0,40)

        if(calculo_idf >= (calculo_idf * 0.90)){
                $('#desempenho_fornecedor').removeClass();
                $('#desempenho_fornecedor').addClass('form-control bg-success');
                $('#desempenho_fornecedor').val('A');
        }else if(calculo_idf >= (calculo_idf * 0.50) && calculo_idf < (calculo_idf * 0.90)){
                $('#desempenho_fornecedor').removeClass();
                $('#desempenho_fornecedor').addClass('form-control bg-warning');
                $('#desempenho_fornecedor').val('B');
        }else if(calculo_idf >= (calculo_idf * 0.20) && calculo_idf < (calculo_idf * 0.50)){
                $('#desempenho_fornecedor').removeClass();
                $('#desempenho_fornecedor').addClass('form-control bg-orange');
                $('#desempenho_fornecedor').val('C');
        }else if(calculo_idf < (calculo_idf * 0.20)){
                $('#desempenho_fornecedor').removeClass();
                $('#desempenho_fornecedor').addClass('form-control bg-danger');
                $('#desempenho_fornecedor').val('D');
        }

        $('#pontualidade').val(pontualidade.toFixed(2) + '%');
        $('#conformidade').val(conformidade.toFixed(2) + '%');
        $('#calculo_idf').val(calculo_idf.toFixed(2) + '%');
        

    }
</script>