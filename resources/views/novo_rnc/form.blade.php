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
            <h1 class="m-0">{{ isset($novo_rnc) ? 'Editar' : 'Novo' }}  Novo RNC</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/novo_rnc"> Novo RNC </a></li>
            <li class="breadcrumb-item active">{{ isset($novo_rnc) ? 'Editar' : 'Novo' }}</li>
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


  <form action="/novo_rnc/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($novo_rnc){{$novo_rnc->id}}@endisset">
    
    <div class="row">
        <div class="col-4">
        <div class="form-group">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" name="codigo" class="form-control codigo" required value="@isset($novo_rnc){{$novo_rnc->codigo}}@endisset">
            </div>
        </div>
        <div class="col-4">
        <div class="form-group">
                <label for="revisao" class="form-label">Revisão:</label>
                <input type="number" name="revisao" class="form-control" value="@if(isset($novo_rnc) && $novo_rnc){{$novo_rnc->revisao}}@else{{old("revisao")}}@endif">
            </div>
           </div>
            <div class="col-4">
            <div class="form-group">
                <label for="numero" class="form-label">Número:</label>
                <input type="number" name="numero" class="form-control" value="@isset($novo_rnc){{$novo_rnc->numero}}@endisset">
            </div>
          </div>
    </div>
    <div class="row">
    <div class="col-4">
      <div class="form-group">
        <label for="data_abertura" class="form-label">Data de Abertura:</label>
        <input type="date" name="data_abertura" class="form-control" value="@isset($novo_rnc){{$novo_rnc->data_abertura}}@endisset">
        </div>
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="responsavel" class="form-label">Responsável:</label>
        <input type="text" name="responsavel" class="form-control" value="@isset($novo_rnc){{$novo_rnc->responsavel}}@endisset">
          </div>
      </div>
    <div class="col-4">
      <div class="form-group">
              <label for="classificacao_acao" class="form-label">Classificacão da Ação:</label>
              <select name="classificacao_acao" id="classificacao_acao" class="form-control selecao">
                <option value="">Selecione:</option>
                  @foreach ($classificacao_acao as $key => $t)
                      <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->classificacao_acao == $t)  selected @elseif(old('classificacao_acao') == $t) selected @endif >{{$t}}</option>
                  @endforeach
              </select>
          </div>
      </div>    
    </div> 
    <div class="row">
      <div class="col-4">
        <div class="form-group">
            <label for="origem" class="form-label">Origem:</label>
            <select name="origem" id="origem" class="form-control selecao">
              <option value="">Selecione</option>
                @foreach ($origem as $key => $t)
                  <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->origem == $t)  selected @elseif(old('origem') == $t) selected @endif >{{$t}}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
            <label for="id" class="form-label">ID:</label>
            <input type="number" name="id" class="form-control" value="@isset($novo_rnc){{$novo_rnc->id}}@endisset">
        </div>
      </div>
        <div class="col-4">
        <div class="form-group">
            <label for="doc_referencia" class="form-label">Documento de Referência:</label>
            <select name="doc_referencia" id="doc_referencia" class="form-control selecao">
            <option value="">Selecione</option>
                @foreach ($doc_referencia as $key => $t)
                <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->doc_referencia == $t)  selected @elseif(old('doc_referencia') == $t) selected @endif >{{$t}}</option>
            @endforeach
        </select>
            </div>
      </div>
    </div>  
    <div class="row">
      <div class="col-4">
        <div class="form-group">
            <label for="requisito" class="form-label">Requisito:</label>
            <input type="text" name="requisito" class="form-control" value="@isset($novo_rnc){{$novo_rnc->requisito}}@endisset">
            </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="descricao">Descrição da Situação:</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="3" required> @if(isset($novo_rnc)){{$novo_rnc->descricao}}@else{{ old('descricao')}}@endif</textarea>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
              <label for="necessario_analise" class="form-label">Necessário Análise de Causa?</label>
              <select name="necessario_analise" id="necessario_analise" class="form-control selecao">
              <option value="">Selecione</option>
                  @foreach ($necessario_analise as $key => $t)
                  <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->necessario_analise == $t)  selected @elseif(old('necessario_analise') == $t) selected @endif >{{$t}}</option>
              @endforeach
          </select>
              </div>
        </div>
    </div> 
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="analise_causa">Análise de Causa:</label>
          <textarea class="form-control" name="analise_causa" id="analise_causa" rows="3" required> @if(isset($novo_rnc)){{$novo_rnc->analise_causa}}@else{{ old('analise_causa')}}@endif</textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="causa_raiz">Causa Raiz:</label>
          <textarea class="form-control" name="causa_raiz" id="causa_raiz" rows="3" required> @if(isset($novo_rnc)){{$novo_rnc->causa_raiz}}@else{{ old('causa_raiz')}}@endif</textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="form-group">
            <label for="data_encerramento" class="form-label">Data de Encerramento:</label>
            <input type="date" name="data_encerramento" class="form-control" value="@isset($novo_rnc){{$novo_rnc->data_encerramento}}@endisset">
            </div>
        </div>
        <div class="col-4">
          <div class="form-group">
              <label for="nc_consequencia" class="form-label">A NC Gerou Consequência?</label>
              <select name="nc_consequencia" id="nc_consequencia" class="form-control selecao">
              <option value="">Selecione</option>
                  @foreach ($nc_consequencia as $key => $t)
                  <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->nc_consequencia == $t)  selected @elseif(old('nc_consequencia') == $t) selected @endif >{{$t}}</option>
              @endforeach
          </select>
              </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="relato_nc">Relato:</label>
            <textarea class="form-control" name="relato_nc" id="relato_nc" rows="3" required> @if(isset($novo_rnc)){{$novo_rnc->relato_nc}}@else{{ old('relato_nc')}}@endif</textarea>
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-4">
          <div class="form-group">
              <label for="tratativa_eficaz" class="form-label">A Tratativa foi Eficaz?</label>
              <select name="tratativa_eficaz" id="tratativa_eficaz" class="form-control selecao">
              <option value="">Selecione</option>
                  @foreach ($tratativa_eficaz as $key => $t)
                  <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->tratativa_eficaz == $t)  selected @elseif(old('tratativa_eficaz') == $t) selected @endif >{{$t}}</option>
              @endforeach
          </select>
              </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <label for="relato_tratativa">Relato:</label>
            <textarea class="form-control" name="relato_tratativa" id="relato_tratativa" rows="3" required> @if(isset($novo_rnc)){{$novo_rnc->relato_tratativa}}@else{{ old('relato_tratativa')}}@endif</textarea>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
              <label for="data_avaliacao" class="form-label">Data da Avaliação da Eficácia:</label>
              <input type="date" name="data_avaliacao" class="form-control" value="@isset($novo_rnc){{$novo_rnc->data_avaliacao}}@endisset">
              </div>
          </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="form-group">
            <label for="risco_avaliado" class="form-label">Risco Avaliado?</label>
            <select name="risco_avaliado" id="risco_avaliado" class="form-control selecao">
            <option value="">Selecione</option>
                @foreach ($risco_avaliado as $key => $t)
                <option value="{{ $t }}" @if(isset($novo_rnc) && $novo_rnc->risco_avaliado == $t)  selected @elseif(old('risco_avaliado') == $t) selected @endif >{{$t}}</option>
            @endforeach
        </select>
            </div>
      </div>
      <div class="col-4">
        <div class="form-group">
            <label for="n_risco" class="form-label">Risco Nº:</label>
            <input type="number" name="n_risco" class="form-control" value="@isset($novo_rnc){{$novo_rnc->n_risco}}@endisset">
            </div>
        </div>
        <div class="col-4">
          <div class="form-group">
              <label for="responsavel_encerramento" class="form-label">Responsável Pelo Encerramento:</label>
              <input type="text" name="responsavel_encerramento" class="form-control" value="@isset($novo_rnc){{$novo_rnc->responsavel_encerramento}}@endisset">
              </div>
          </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
            <label for="data_responsavel" class="form-label">Data:</label>
            <input type="date" name="data_responsavel" class="form-control" value="@isset($novo_rnc){{$novo_rnc->data_responsavel}}@endisset">
            </div>
        </div>
        <div class="col-6">
          <div class="form-group">
              <label for="observacoes" class="form-label">Observações:</label>
              <input type="text" name="observacoes" class="form-control" value="@isset($novo_rnc){{$novo_rnc->observacoes}}@endisset">
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
