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
            <li class="breadcrumb-item active">{{ isset($inspecao_recebidos) ? 'Editar' : 'Nova' }}</li>
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
            @isset($inspecao_recebidos)
                <a href="/inspecao_recebidos/novo" class="btn btn-primary">
                    Nova Inspeção 
                    <i class="fas fa-plus"></i>
                </a>
            @endisset

  <form action="/inspecao_recebidos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->id}}@else{{ old('id') }}@endif">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="produto_id" class="form-label">Produto:</label>
                <option value="">selecione</option>
                <select name="produto_id" id="produto_id" class="form-control select_produto_id">
                    <option value="">selecione</option>
                    @foreach ($produto as $key => $tipo)
                        <option class="produto_id" value="{{$tipo->id}}"@if(isset($inspecao_recebidos) && $inspecao_recebidos->produto_id == $tipo->id) selected @elseif(old('produto_id') == $tipo->id) selected @endif data-fabricante="{{$tipo->fabricante}}" data-fornecedor="{{$tipo->fornecedor->razao_social}}">{{$tipo->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="fornecedor" class="form-label">Fornecedor:</label>
                <input type="text" name="fornecedor" class="form-control fornecedor" readonly value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->fornecedor}}@else{{old('fornecedor')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" name="fabricante" class="form-control fabricante" readonly value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->fabricante}}@else{{old('fabricante')}}@endif">
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
            @foreach ($pergunta as $key => $item)     
                <tbody>
                    <th>
                        <div class="row">
                            <div class="col-9" >
                                <label for="lote" class="form-label">{{$item->pergunta}}</label>
                            </div>
                            <div class="col-1" align="center">
                                <label for="resposta">SIM</label><br>
                                <input type="radio" class="respostas" required name="resposta[{{$item->id}}]" value="sim" @if(isset($resposta) && $resposta[$key]->resposta == "sim") checked @elseif(old('resposta[{{$item->id}}]') == 'sim')checked @endif>
                            </div>
                            <div class="col-1" align="center">
                                <label for="resposta">NÃO</label><br>
                                <input type="radio" class="resposta" name="resposta[{{$item->id}}]" value="nao" @if(isset($resposta) && $resposta[$key]->resposta == "nao") checked @elseif(old('resposta[{{$item->id}}]') == 'nao')checked @endif>
                            </div>
                            <div class="col-1" align="center">
                                <label for="resposta">NA</label><br>
                                <input type="radio" class="resposta" name="resposta[{{$item->id}}]" value="na" @if(isset($resposta) && $resposta[$key]->resposta == "na") checked @elseif(old('resposta[{{$item->id}}]') == 'na')checked @endif
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
                <label for="descricao_teste">Descrição:</label>
                <textarea name="descricao_teste" class="form-control"id="descricao_teste" rows="7" >@if(isset($inspecao_recebidos)){{$inspecao_recebidos->descricao_teste}}@else{{old('descricao_teste')}}@endif</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <label for="insumo_liberado">Insumo liberado para uso?</label><br>
        </div>
        <div class="col-2" align="center">
            <label for="sim">SIM</label>
            <input type="radio" name="insumo_liberado" class="insumo_liberado" id="sim" value="sim" @if(isset($inspecao_recebidos) && $inspecao_recebidos->insumo_liberado == "sim") checked @elseif(old('insumo_liberado') == 'sim')checked @endif>

            <label for="nao">NÃO</label>
            <input type="radio" required name="insumo_liberado" class="insumo_liberado" id="nao" value="nao" @if(isset($inspecao_recebidos) && $inspecao_recebidos->insumo_liberado == "nao") checked @elseif(old('insumo_liberado') == 'nao')checked @endif>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="justificatica">Se não, justificativa:</label>
            <textarea name="justificativa" readonly class="form-control justificativa" rows="5" >@if(isset($inspecao_recebidos)){{$inspecao_recebidos->justificativa}}@else{{old('justificativa')}}@endif</textarea>
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
    $(document).ready(function(){

        $('.select_produto_id').on('change',function(){
            var fabricante = $(this).children('option:selected').data('fabricante');
            var fornecedor = $(this).children('option:selected').attr('data-fornecedor');
            if(fabricante != ''){
                $('.fabricante').val(fabricante);
                $('.fornecedor').val(fornecedor);
            }
        });

        var justificatica = $('.justificativa').attr('value');
        var insumo_liberado = $('.insumo_liberado').is('checked');
        if(insumo_liberado == true){
            $('.justificativa').removeAttr('readonly');
        }
        $('.insumo_liberado').click(function(){
            var valor = $(this).attr('value');
            if(valor == 'nao'){
                $('.justificativa').removeAttr('readonly');
            }else if(valor == 'sim'){
                $('.justificativa').val('');
                $('.justificativa').attr('readonly', true);
            }
        });
    });
</script>    