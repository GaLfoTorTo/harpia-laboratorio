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
            <h1 class="m-0">{{ isset($inspecao_recebidos) ? 'Editar' : 'Nova' }} Inspeção de Recebido</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/inspecao_recebidos">Inspeção de Recebidos</a></li>
            <li class="breadcrumb-item active">{{ isset($inspecao_recebidos) ? 'Editar' : 'Novo' }}</li>
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

  <form action="/inspecao_recebidos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->id}}@else{{ old('id') }}@endif">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="produto" class="form-label">Produto:</label>
                <input type="text" name="produto" class="form-control" required value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->produto}}@else{{ old('produto') }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="fornecedor_id" class="form-label">Fornecedor:</label>
                <select name="fornecedor_id" id="fornecedor_id" class="form-control">
                    @foreach ($fornecedor as $key => $tipo)
                        <option class=" fornecedor_id" value="{{$tipo->id}}"@if(isset($inspecao_recebidos) && $inspecao_recebidos->fornecedor_id == $tipo->id) selected @elseif(old('fornecedor_id') == $tipo->id) selected @endif>{{$tipo->nome_fantasia}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" name="fabricante" class="form-control fabricante" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->fabricante}}@else{{ old('fabricante') }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="nota_fiscal" class="form-label">N°. da nota fiscal:</label>
                <input type="text" name="nota_fiscal" class="form-control nota_fiscal" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->nota_fiscal}}@else{{old('nota_fiscal')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="lote" class="form-label">Lote:</label>
                <input type="text" name="lote" class="form-control" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->lote}}@else{{old('lote')}}@endif">
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col" align="center">
            <h2>Lista de Verificação de Insumos</h2>
        </div>
    </div>
    <div class="row">
        <table class="table">
            @foreach ($pergunta as $item)
            <tbody>
                <th>
                    <div class="row">
                        <div class="col-9" >
                            <label for="lote" class="form-label">{{$item->pergunta}}</label>
                        </div>               
                        <div class="col-1" align="center">
                            <label for="resposta">SIM</label><br>
                            <input type="radio" class="respostas" required name="resposta[{{$item->id}}]" value="@if('checked'){{'sim'}}@endif">
                        </div>
                        <div class="col-1" align="center">
                            <label for="resposta">NÃO</label><br>
                            <input type="radio" class="resposta" name="resposta[{{$item->id}}]" value="@if('checked'){{'nao'}}@endif">
                        </div>
                        <div class="col-1" align="center">
                            <label for="resposta">NDA</label><br>
                            <input type="radio" class="resposta" name="resposta[{{$item->id}}]" value="@if('checked'){{'nada'}}@endif">
                        </div>
                    </div>
                </th>
            </tbody>
            @endforeach
        </table>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control"id="descricao" rows="7" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->descricao}}@else{{old('descricao')}}@endif"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label for="insumo_liberado">Insumo liberado para uso?</label><br>
        </div>
        <div class="col-2" align="center">
            <label for="sim">SIM</label>
            <input type="radio" name="insumo_liberado" class="insumo_liberado" id="sim" value="@if(isset($inspecao_recebidos) && $inspecao_recebidos->insumo_liberado == 'sim'){{$inspecao_recebidos->insumo_liberado}}@elseif('checked'){{'sim'}}@else{{old('insumo_liberado')}}@endif">
            <label for="nao">NÃO</label>
            <input type="radio" required name="insumo_liberado" class="insumo_liberado" id="nao" value="@if(isset($inspecao_recebidos) && $inspecao_recebidos->insumo_liberado == 'não'){{$inspecao_recebidos->insumo_liberado}}@elseif('checked'){{'não'}}@else{{old('insumo_liberado')}}@endif">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="justificatica">Se não, justificativa:</label>
            <textarea name="justificativa" readonly class="form-control justificativa" rows="5"  value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->justificativa}}@else{{old('justificativa')}}@endif"></textarea>
        </div>
    </div>
    <br>
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
    $('.insumo_liberado').click(function(){
        var valor = $(this).attr('value');
        if(valor == 'não'){
            $('.justificativa').removeAttr('readonly');
        }else if(valor == 'sim'){
            $('.justificativa').empty('value');
            $('.justificativa').attr('readonly', true);
        }
    })
</script>    