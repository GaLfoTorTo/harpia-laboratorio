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
            <h1 class="m-0">{{ isset($cliente) ? 'Editar' : 'Novo' }} cliente</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
            <li class="breadcrumb-item active">{{ isset($cliente) ? 'Editar' : 'Novo' }}</li>
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
            @isset($cliente)
                <a href="/clientes/novo" class="btn btn-primary">
                    Novo Cliente
                    <i class="fas fa-plus"></i>
                </a>
            @endisset

  <form action="/clientes/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@if(isset($cliente)){{$cliente->id}}@else{{ old('id') }}@endif">
    <input type="hidden" name="codigo_cliente" value="@isset($cliente){{$cliente->codigo_cliente}}@else {{rand($min = 100000000, $max = 999999999)}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required value="@if(isset($cliente)){{$cliente->nome}}@else{{ old('nome') }}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="servico">CPF</label>
                <input type="radio" class="tipo" name="tipo" id="tipo_cpf">
                <label for="servico">CNPJ</label>
                <input type="radio" class="tipo" name="tipo" id="tipo_cnpj">
                <input type="text" name="cpf_cnpj" class="form-control cpf_cnpj" id="cpf_cnpj" readonly required value="@if(isset($cliente)){{$cliente->cpf_cnpj}}@else{{old('cpf_cnpj')}}@endisset">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" value="@if(isset($cliente)){{$cliente->email}}@else{{old('email')}} @endif" >
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control telefone" value="@if(isset($cliente)){{$cliente->telefone}}@else{{ old('telefone') }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" name="cep" class="form-control cep" value="@if(isset($cliente)){{$cliente->cep}}@else{{old('cep')}}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" value="@if(isset($cliente)){{$cliente->logradouro}}@else{{old('logradouro')}}@endif">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="numero" class="form-label">Numero</label>
                <input type="number" name="numero" class="form-control" value="@if(isset($cliente)){{$cliente->numero}}@else{{old('numero')}}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" value="@if(isset($cliente)){{$cliente->cidade}}@else{{old('cidade')}}@endif">
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" name="bairro" class="form-control" value="@if(isset($cliente)){{$cliente->bairro}}@else{{old('bairro')}}@endif">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="uf" class="form-label">UF</label>
                <input type="text" name="uf" class="form-control" value="@if(isset($cliente)){{$cliente->uf}}@else{{old('uf')}}@endif">
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="responsavel_tecnico" class="form-label">Responsável Técnico:</label>
                <input type="text" name="responsavel_tecnico" class="form-control" value="@if(isset($cliente)){{$cliente->responsavel_tecnico}}@else{{old('responsavel_tecnico')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="responsavel_financeiro" class="form-label">Responsável Financeiro:</label>
                <input type="text" name="responsavel_financeiro" class="form-control" value="@if(isset($cliente)){{$cliente->responsavel_financeiro}}@else{{old('responsavel_financeiro')}}@endif">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="tipo_unidade" class="form-label">Tipo de Unidade:</label>
                <select name="tipo_unidade" id="tipo_unidade" class="form-control">
                    <option value="">selecione</option>
                    @foreach ($tipos_unidade as $key => $tipo)
                        <option class=" tipo_unidade" value="{{$tipo}}"@if(isset($cliente) && $cliente->tipo_unidade == $tipo) selected @elseif(old('tipo_unidade') == $tipo) selected @endif>{{$tipo}}</option>
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