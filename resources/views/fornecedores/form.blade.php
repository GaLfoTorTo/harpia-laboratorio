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
            <h1 class="m-0">{{ isset($fornecedor) ? 'Editar' : 'Novo ' }}Fornecedor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/fornecedores">Fornecedores</a></li>
            <li class="breadcrumb-item active">{{ isset($fornecedor) ? 'Editar' : 'Novo' }}</li>
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


  <form action="/fornecedores/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($fornecedor){{$fornecedor->id}}@endisset">
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="tipo" class="form-label">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="">Selecione</option>
                    @foreach ($tipos as $item)
                        <option value="{{ $item }}" @if(isset($fornecedor) && $fornecedor->tipo == $item) selected @elseif(old("tipo") == $item ) selected @endif>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label for="razao_social" class="form-label">Razão Social:</label>
                <input type="text" name="razao_social" class="form-control name"required value="@if(isset($fornecedor)){{$fornecedor->razao_social}}@else{{ old('razao_social')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="cnpj" class="form-label">CNPJ:</label>
                <input type="text" name="cnpj" class="form-control cnpj"required value="@if(isset($fornecedor)){{$fornecedor->cnpj}}@else{{ old('cnpj')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control email"required value="@if(isset($fornecedor)){{$fornecedor->email}}@else{{ old('email')}}@endif">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control telefone"required value="@if(isset($fornecedor)){{$fornecedor->telefone}}@else{{ old('telefone')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="nome_contato" class="form-label">Nome do contato:</label>
                <input type="text" name="nome_do_contato" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->nome_contato}}@else{{ old('nome_contato')}}@endif">
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="nome_fantasia" class="form-label">Nome fantasia:</label>
                <input type="text" name="nome_fantasia" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->nome_fantasia}}@else{{ old('nome_fantasia')}}@endif">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="cep" class="form-label">CEP:</label>
                <input type="text" name="cep" class="form-control cep"value="@if(isset($fornecedor)){{$fornecedor->cep}}@else{{ old('cep')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="logradouro" class="form-label">Logradouro:</label>
                <input type="text" name="logradouro" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->logradouro}}@else{{ old('logradouro')}}@endif">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="numero" class="form-label">Número:</label>
                <input type="number" name="numero" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->numero}}@else{{ old('numero')}}@endif">
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="complemento" class="form-label">Complemento:</label>
                <input type="text" name="complemento" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->cep}}@else{{ old('cep')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" name="cidade" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->cidade}}@else{{ old('cidade')}}@endif">
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" name="bairro" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->bairro}}@else{{ old('bairro')}}@endif">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="uf" class="form-label">UF:</label>
                <input type="text" name="uf" class="form-control"value="@if(isset($fornecedor)){{$fornecedor->uf}}@else{{ old('uf')}}@endif">
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