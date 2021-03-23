@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>{{ isset($cliente) ? 'Editar' : 'Novo' }} cliente</h2>

  <form action="/colaboradores/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($cliente){{$cliente->id}}@endisset">
    <input type="hidden" name="codigo_cliente" value="@isset($cliente){{$cliente->codigo_cliente}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="nome" class="form-control" required value="@isset($cliente){{$cliente->nome}}@endisset">
                <label for="nome" class="form-label">Nome:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="cpf" class="form-control cpf" required value="@isset($cliente){{$cliente->cpf_cnpj}}@endisset">
                <label for="cpf" class="form-label">CPF:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="form-outline">
                <input type="email" name="email" class="form-control" value="@isset($cliente){{$cliente->email}}@endisset">
                <label for="email" class="form-label">E-mail:</label>
            </div>
        </div>
        <div class="col-4">
            <div class="form-outline">
                <input type="text" name="telefone" class="form-control fone" value="@isset($cliente){{$cliente->telefone}}@endisset">
                <label for="telefone" class="form-label">Telefone:</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
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
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-4">
            <div class="form-outline">
                <select name="tipo_unidade" id="tipo_unidade" class="form-control">
                    @isset($cliente)
                        <option class="form-control tipo_unidade" value="{{$cliente->tipo_unidade}}">{{$cliente->tipo_unidade}}</option>
                    @endisset
                    @foreach ($tipo_unidade as $key => $tipo)
                        <option class="form-control tipo_unidade" value="">{{$tipo->tipo_unidade}}</option>
                    @endforeach
                </select>
                <label for="tipo_unidade" class="form-label">Tipo de Unidade:</label>
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-success w-25 justify-content-end">
                Salvar 
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
  </form>
</div>
@include('layout.footer')