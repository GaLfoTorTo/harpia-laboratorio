@include('layout.header')
<<<<<<< HEAD
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


  <form action="/clientes/salvar" method="POST">
=======
@include('layout.menu')
<div class="container corpo">
  <h2>{{ isset($cliente) ? 'Editar' : 'Novo' }} cliente</h2>

  <form action="/colaboradores/salvar" method="POST">
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
    @csrf
    <input type="hidden" name="id" value="@isset($cliente){{$cliente->id}}@endisset">
    <input type="hidden" name="codigo_cliente" value="@isset($cliente){{$cliente->codigo_cliente}}@endisset">
    <div class="row">
        <div class="col-6">
<<<<<<< HEAD
            <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required value="@isset($cliente){{$cliente->nome}}@endisset">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="cpf_cnpj" class="form-label">CPF/CNPJ:</label>
                <input type="text" name="cpf_cnpj" class="form-control cpf" required value="@isset($cliente){{$cliente->cpf_cnpj}}@endisset">
=======
            <div class="form-outline">
                <input type="text" name="nome" class="form-control" required value="@isset($cliente){{$cliente->nome}}@endisset">
                <label for="nome" class="form-label">Nome:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="cpf" class="form-control cpf" required value="@isset($cliente){{$cliente->cpf_cnpj}}@endisset">
                <label for="cpf" class="form-label">CPF:</label>
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
<<<<<<< HEAD
            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" value="@isset($cliente){{$cliente->email}}@endisset">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" class="form-control fone" value="@isset($cliente){{$cliente->telefone}}@endisset">
=======
            <div class="form-outline">
                <input type="email" name="email" class="form-control" value="@isset($cliente){{$cliente->email}}@endisset">
                <label for="email" class="form-label">E-mail:</label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-outline">
                <input type="text" name="telefone" class="form-control fone" value="@isset($cliente){{$cliente->telefone}}@endisset">
                <label for="telefone" class="form-label">Telefone:</label>
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
<<<<<<< HEAD
            <div class="form-group">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" name="cep" class="form-control cep" value="@isset($cliente){{$cliente->cep}}@endisset">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" name="logradouro" class="form-control" value="@isset($cliente){{$cliente->logradouro}}@endisset">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="numero" class="form-label">Numero</label>
                <input type="number" name="numero" class="form-control" value="@isset($cliente){{$cliente->numero}}@endisset">
=======
            <div class="form-outline">
                <input type="text" name="cep" class="form-control cep" value="@isset($cliente){{$cliente->cep}}@endisset">
                <label for="cep" class="form-label">CEP</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="logradouro" class="form-control" value="@isset($cliente){{$cliente->logradouro}}@endisset">
                <label for="logradouro" class="form-label">Logradouro</label>
            </div>
        </div>
        <div class="col-2">
            <div class="form-outline">
                <input type="number" name="numero" class="form-control" value="@isset($cliente){{$cliente->numero}}@endisset">
                <label for="numero" class="form-label">Numero</label>
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
<<<<<<< HEAD
            <div class="form-group">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" value="@isset($cliente){{$cliente->cidade}}@endisset">
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" name="bairro" class="form-control" value="@isset($cliente){{$cliente->bairro}}@endisset">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="uf" class="form-label">UF</label>
                <input type="text" name="uf" class="form-control" value="@isset($cliente){{$cliente->uf}}@endisset">
=======
            <div class="form-outline">
                <input type="text" name="cidade" class="form-control" value="@isset($cliente){{$cliente->cidade}}@endisset">
                <label for="cidade" class="form-label">Cidade</label>
            </div>
        </div>
        <div class="col-5">
            <div class="form-outline">
                <input type="text" name="bairro" class="form-control" value="@isset($cliente){{$cliente->bairro}}@endisset">
                <label for="bairro" class="form-label">Bairro</label>
            </div>
        </div>
        <div class="col-3">
            <div class="form-outline">
                <input type="text" name="uf" class="form-control" value="@isset($cliente){{$cliente->uf}}@endisset">
                <label for="uf" class="form-label">UF</label>
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-4">
<<<<<<< HEAD
            <div class="form-group">
                <label for="tipo_unidade" class="form-label">Tipo de Unidade:</label>
                <select name="tipo_unidade" id="tipo_unidade" class="form-control">
=======
            <div class="form-outline">
                <select name="tipo_unidade" id="tipo_unidade" class="form-select">
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
                    <option value=""></option>
                    @foreach ($tipo_unidade as $key => $tipo)
                        <option class=" tipo_unidade" value="{{$tipo->tipo_unidade}}" @if(isset($cliente) && $cliente->tipo_unidade == $tipo->tipo_unidade) selected @endif>{{$tipo->tipo_unidade}}</option>
                    @endforeach
                </select>
<<<<<<< HEAD
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="responsavel_tecnico" class="form-label">Responsável Técnico:</label>
                <select name="responsavel_tecnico" id="responsavel_tecnico" class="form-control selecao">
                        <option value=""></option>
                    @foreach ($responsavel_tecnico as $key => $tecnico)
                        <option value="{{ $tecnico->id }}" {{ isset($cliente) && $cliente->responsavel_tecnico == $tecnico->responsavel_tecnico ? 'selected' : ''}} >{{$tecnico->responsavel_tecnico}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="responsavel_financeiro" class="form-label">Responsável Financeiro:</label>
                <select name="responsavel_financeiro" id="responsavel_financeiro" class="form-control selecao">
                    <option value=""></option>
                    @foreach ($responsavel_financeiro as $key => $financeiro)
                        <option value=""  {{ isset($cliente) && $cliente->responsavel_financeiro == $financeiro->responsavel_financeiro ? 'selected' : ''}}>{{$financeiro->responsavel_financeiro}}</option>
                    @endforeach
                </select>

=======
                {{-- <label for="tipo_unidade" class="form-label">Tipo de Unidade:</label> --}}
            </div>
        </div>
        <div class="col-4">
            <div class="form-outline">
                <select name="responsavel_tecnico" id="responsavel_tecnico" class="form-control selecao">
                    @isset($cliente)
                        <option class="form-control responsavel_tecnico" value="{{$cliente->responsavel_tecnico}}">{{$cliente->responsavel_tecnico}}</option>
                    @endisset
                    @foreach ($responsavel_tecnico as $key => $tecnico)
                        <option class="form-control tipo_unidade" value="">{{$tecnico->responsavel_tecnico}}</option>
                    @endforeach
                </select>
                <label for="responsavel_tecnico" class="form-label">Responsável Técnico:</label>
                {{-- div deveria ser adcionada automaticamente mas nao foi nao sei pq --}}
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 103.2px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-outline">
                <select name="responsavel_financeiro" id="responsavel_financeiro" class="form-control selecao">
                    @isset($cliente)
                        <option class="form-control responsavel_financeiro" value="{{$cliente->responsavel_financeiro}}">{{$cliente->responsavel_financeiro}}</option>
                    @endisset
                    @foreach ($responsavel_financeiro as $key => $financeiro)
                        <option class="form-control tipo_unidade" value="">{{$financeiro->responsavel_financeiro}}</option>
                    @endforeach
                </select>
                <label for="responsavel_financeiro" class="form-label">Responsável Financeiro:</label>
                {{-- div deveria ser adcionada automaticamente mas nao foi nao sei pq --}}
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 103.2px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
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
<<<<<<< HEAD

</div>
         
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

=======
</div>
>>>>>>> 2a771528437d9b77c6ee4df186119a5910612bc2
@include('layout.footer')