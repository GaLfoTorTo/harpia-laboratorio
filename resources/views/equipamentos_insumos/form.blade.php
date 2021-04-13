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
            <h1 class="m-0">{{ isset($equipamentos_insumos) ? 'Editar' : 'Novo' }} Equipamentos (Insumos)</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/equipamentos_insumos">Equipamentos (Insumos) </a></li>
            <li class="breadcrumb-item active">{{ isset($equipamentos_insumos) ? 'Editar' : 'Novo' }}</li>
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


  <form action="/equipamentos_insumos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($equipamentos_insumos){{$equipamentos_insumos->id}}@endisset">
    
    <div class="row">
        <div class="col-4">
        <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control nome" required value="@isset($equipamentos_insumos){{$equipamentos_insumos->nome}}@endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" name="codigo" class="form-control" value="@if(isset($equipamentos_insumos) && $equipamentos_insumos){{$equipamentos_insumos->codigo}}@else{{old("codigo")}}@endif">
            </div>
           </div>
            <div class="col-4">
            <div class="form-group">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <input type="text" name="fabricante" class="form-control fone" value="@isset($equipamentos_insumos){{$equipamentos_insumos->fabricante}}@endisset">
            </div>
          </div>
    </div>
    <div class="row">
    <div class="col-4">
      <div class="form-group">
            <label for="produto_critico" class="form-label">Produto Crítico:</label>
            <select name="produto_critico" id="produto_critico" class="form-control selecao">
              <option value="">Selecione</option>
                  @foreach ($produto_critico as $key => $t)
                    <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->produto_critico == $t)  selected @elseif(old('produto_critico') == $t) selected @endif >{{$t}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-4">
      <div class="form-group">
              <label for="materiais_referencia" class="form-label">Materiais de Referência:</label>
              <select name="materiais_referencia" id="materiais_referencia" class="form-control selecao">
                <option value="">Selecione</option>
                    @foreach ($materiais_referencia as $key => $t)
                      <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->materiais_referencia == $t) selected @elseif(old('materiais_referencia') == $t) selected @endif >{{$t}}</option>
                    @endforeach
              </select>
          </div>
      </div>
    <div class="col-4">
      <div class="form-group">
              <label for="materiais" class="form-label">Materiais:</label>
              <select name="materiais" id="materiais" class="form-control selecao">
                <option value="">Selecione:</option>
                  @foreach ($materiais as $key => $t)
                      <option value="{{ $t }}" @if(isset($equipamentos_insumos) && $equipamentos_insumos->materiais == $t)  selected @elseif(old('materiais') == $t) selected @endif >{{$t}}</option>
                  @endforeach
              </select>
          </div>
      </div>    
    </div> 
    <div class="row">
      <div class="col-4">
        <div class="form-group">
            <label for="fornecedor" class="form-label">Fornecedor:</label>
            <input type="text" name="fornecedor" class="form-control" value="@isset($equipamentos_insumos){{$equipamentos_insumos->fornecedor}}@endisset">
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
            <label for="desc_produto" class="form-label">Descrição do Produto:</label>
            <input type="text" name="desc_produto" class="form-control" value="@isset($equipamentos_insumos){{$equipamentos_insumos->desc_produto}}@endisset">
        </div>
      </div>
      <div class="col-4">
      <div class="form-group">
              <label for="quantidade" class="form-label">Quantidade:</label>
              <input type="number" name="quantidade" class="form-control" value="@isset($equipamentos_insumos){{$equipamentos_insumos->quantidade}}@endisset">
          </div>
      </div>
    </div>  
    <div class="row">
      <div class="col-4">
        <div class="form-group">
            <label for="unidade" class="form-label">Unidade:</label>
            <select name="unidade" id="unidade" class="form-control selecao">
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
         
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

  

@include('layout.footer')


        


            

            
            