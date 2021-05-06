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
            <h1 class="m-0">{{ isset($inspecao_recebidos) ? 'Editar' : 'Novo' }} Inspecao Recebidos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/inspecao_recebidos">Inspecao Recebidos</a></li>
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

  <form action="/clientes/salvar" method="POST">
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
                <label for="fornecedor" class="form-label">Fornecedor:</label>
                <input type="text" name="fornecedor" class="form-control" value="@if(isset($inspecao_recebidos)){{$inspecao_recebidos->fornecedor}}@else{{old('fornecedor')}} @endif" >
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
                            <label for="servico">SIM</label><br>
                            <input type="radio" class="tipo" required name="tipo[{{$item->id}}]" id="sim">
                        </div>
                        <div class="col-1" align="center">
                            <label for="servico">NÃO</label><br>
                            <input type="radio" class="tipo" name="tipo[{{$item->id}}]" id="nao">
                        </div>
                        <div class="col-1" align="center">
                            <label for="servico">NDA</label><br>
                            <input type="radio" class="tipo" name="tipo[{{$item->id}}]" id="nada">
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
                <textarea name="descricao" class="form-control"id="descricao" rows="7"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="servico">SIM</label><br>
            <input type="radio" class="tipo" name="tipo" id="sim">
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