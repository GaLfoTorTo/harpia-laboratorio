@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')


<style>
  @if(isset($acoes_propostas) && $acoes_propostas->necessario_prorrogacao == 'sim' )
      .novo_prazo{
          display: initial;
      }
  @else
      .novo_prazo{
          display: none;
      }
  @endif
</style> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ isset($acoes_propostas) ? 'Editar' : 'Novas' }}  Ações Propostas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/acoes_propostas"> Ações Propostas </a></li>
            <li class="breadcrumb-item active">{{ isset($acoes_propostas) ? 'Editar' : 'Novo' }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="card">
    @isset($acoes_propostas->id)
      
    <div class="card-header">
      <a href="/acoes_propostas/novo" class="btn btn-primary">
          Novas Ações Propostas
        <i class="fas fa-plus"></i>
      </a>
      @endisset
      <br><br>
      
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

  <form action="/acoes_propostas/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($acoes_propostas){{$acoes_propostas->id}}@endisset">
    
    <div class="row">
      <div class="col-3">
        <div class="form-group">
                <label for="origem" class="form-label">Origem:</label>
                <input type="text" name="origem" class="form-control origem" required value="@isset($acoes_propostas){{$acoes_propostas->origem}}@endisset">
            </div>
        </div>
        <div class="col-3">
        <div class="form-group">
                <label for="acao" class="form-label">Ação:</label>
                <input type="text" name="acao" class="form-control acao" required value="@isset($acoes_propostas){{$acoes_propostas->acao}}@endisset">
            </div>
        </div>
        <div class="col-3">
        <div class="form-group">
            <label for="responsavel" class="form-label">Responsável:</label>
            <select name="responsavel" id="responsavel" class="form-control selecao">
              <option value="">Selecione</option>
                @foreach ($novos_rncs as $key => $t)
                  <option value="{{ $t->responsavel }}" @if(isset($acoes_propostas) && $acoes_propostas->novos_rncs == $t)  selected @elseif(old('responsavel') == $t) selected @endif >{{$t->responsavel}}</option> 
              @endforeach
            </select>
            </div>
           </div>
            <div class="col-3">
            <div class="form-group">
                <label for="prazo" class="form-label">Prazo:</label>
                <input type="text" name="prazo" class="form-control" value="@isset($acoes_propostas){{$acoes_propostas->prazo}}@endisset">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="prazo_final" class="form-label">Prazo Final da Ação:</label>
              <input type="date" name="prazo_final" class="form-control" value="@isset($acoes_propostas){{$acoes_propostas->prazo_final}}@endisset">
            </div>
          </div>
          <div class="col-4">
            <label class="row  justify-content-center">Necessário Prorrogação</label>
              <div class="row align-item-center justify-content-center">
                <div class="form-group">
                  <label for="sim" onclick="alteraTipo('sim')">Sim</label>
                  <input type="radio" class="necessario_prorrogacao" name="necessario_prorrogacao" id="sim" onclick="alteraTipo('sim')" value="sim" @if(isset($acoes_propostas) && $acoes_propostas->necessario_prorrogacao == 'sim') checked @elseif(old('necessario_prorrogacao') == "sim") checked @endif>
                  <label for="nao" onclick="alteraTipo('nao')">Não</label>
                  <input type="radio" class="necessario_prorrogacao" name="necessario_prorrogacao" id="nao" onclick="alteraTipo('nao')" value="nao" @if(isset($acoes_propostas) && $acoes_propostas->necessario_prorrogacao == 'nao') checked @elseif(old('necessario_prorrogacao') == "nao") checked @endif>
              </div>
            </div>
          </div>
          <div class="col-4 novo_prazo">
            <div class="form-group">
              <label for="Novo_prazo_final" class="form-label">Novo Prazo Final da Ação:</label>
              <input type="date" name="Novo_prazo_final" class="form-control" value="@isset($acoes_propostas){{$acoes_propostas->prazo_final}}@endisset">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
                <label for="justificativa">Justificativa:</label>
                <textarea class="form-control" name="justificativa" id="justificativa" rows="3" required> @if(isset($acoes_propostas)){{$acoes_propostas->justificativa}}@else{{ old('justificativa')}}@endif</textarea>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="data_encerramento" class="form-label">Data de Encerramento:</label>
              <input type="date" name="data_encerramento" class="form-control" value="@isset($acoes_propostas){{$acoes_propostas->data_encerramento}}@endisset">
            </div>
          </div>    
        </div> 
        <div class="row">
            <div class="col" align="end">
                <button type="submit" class="btn btn-success w-100 hover-shadow">
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
  function alteraTipo(){
    $('.necessario_prorrogacao').click(function() {
      var selecao = $(this).attr('id');
      console.log(selecao)
      if(selecao == 'sim') {
        $('.novo_prazo').show();
      } else {
        $('.novo_prazo').hide();
      }
    })
  }

</script>
