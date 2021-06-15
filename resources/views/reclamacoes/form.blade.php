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
            <h1 class="m-0">{{ isset($reclamacao) ? 'Editar' : 'Novo' }} Reclamação</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/reclamacoes">Reclamações</a></li>
            <li class="breadcrumb-item active">{{ isset($reclamacao) ? 'Editar' : 'Novo' }}</li>
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
          <div class="row">
            <div class="col">
              @isset($reclamacao->id)
             
              <a href="/reclamacoes/novo" class="btn btn-primary">
                Nova Reclamação
                <i class="fas fa-plus"></i>
              </a> 
              @endisset
              
            </div>
          </div>
          <br>
         

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

  <form action="/reclamacoes/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($reclamacao){{$reclamacao->id}}@endisset">
    <div class="row">
        <div class="col-4">
          <div class="form-group">
            <label for="colaborador_id" class="form-label">Responsável pela abertura:</label>
            <select  required name="colaborador_id" id="colaborador_id" class="form-control">
              <option value="">Selecione um Responsável</option>
              @foreach($colaboradores_id as $item)
                <option value="{{$item->id}}" @if(isset($reclamacao) &&$reclamacao->colaborador_id == $item->id) selected @elseif(old('colaborador_id') == $item->id) selected @endif>{{$item->nome}}
                </option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label class="form-label">Número do registro:</label>
          <input type="text" name="id" class="form-control" readonly value="@if(isset($reclamacao)){{$reclamacao->id}}@else{{old('id')}} @endif" >
      </div> 
      </div>
      <div class="col-4">
        <div  class="form-group">
          <label  for="" class="form-label">Data de abertura:</label>
          <input required  type="date" min="{{ date('Y-m-d') }}" name="data_abertura" class="form-control" value="@if(isset($reclamacao)){{$reclamacao->data_abertura}}@else{{old('data_abertura')}}@endif" >
      </div> 
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <label for="manifestacao" class="form-label">Tipo manifestação:</label>
        <select required name="manifestacao" id="manifestacao" class="form-control">
          <option value="">Selecione</option>
          @foreach ($tipo_manifestacao as $key => $tipo)
              <option class="" value="{{$tipo}}"@if(isset($reclamacao) && $reclamacao->manifestacao == $tipo) selected @elseif(old('manifestacao') == $tipo) selected @endif>{{$tipo}}</option>
          @endforeach
      </select>
      </div>
      <div class="col-5">
        <div class="form-group">
          <label for="reclamante" class="form-label">Reclamante:</label>
          <input  type="reclamante" name="reclamante" class="form-control" required value="@if(isset($reclamacao)){{$reclamacao->reclamante}}@else{{old('reclamante')}} @endif" >
      </div> 
      </div>
      <div class="col-4">
        <div class="form-group">
            <label for="telefone" class="form-label">Telefone:</label>
            <input required type="text" name="telefone" class="form-control telefone" value="@if(isset($reclamacao)){{$reclamacao->telefone}}@else{{ old('telefone') }}@endif">
        </div>
    </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="email" class="form-label">E-mail:</label>
          <input required type="email" name="email" class="form-control" value="@if(isset($reclamacao)){{$reclamacao->email}}@else{{old('email')}} @endif" >
      </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label for="n_acao_corretiva" class="form-label">Ação corretiva n°:</label>
          <input type="text" name="n_acao_corretiva" class="form-control" value="@if(isset($reclamacao)){{$reclamacao->n_acao_corretiva}}@else{{old('n_acao_corretiva')}} @endif" >
      </div> 
      </div>
      <div class="col-2">
        <label for="tipo_nc" class="form-label"> É uma NC?</label>
        <select required name="tipo_nc" id="tipo_nc" class="form-control">
          <option value="">Selecione</option>
          @foreach ($tipo_nc as $key => $tipo)
          <option class=" tipo_nc" value="{{$tipo}}"@if(isset($reclamacao) && $reclamacao->tipo_nc == $tipo) selected @elseif(old('tipo_nc') == $tipo) selected @endif>{{$tipo}}</option>
        @endforeach
      </select>
      </div>    
    </div>
    <div class="row">
      <div class="col">
        <label for="descricao">Descrição:</label>
          <textarea class="form-control" name="descricao" id="descricao" rows="3" required> @if(isset($reclamacao)){{$reclamacao->descricao}}@else{{ old('descricao')}}@endif</textarea>
      </div>
    </div>
    <br>
    <hr>
<div align='center'>
  <h3>Medidas tomadas</h3>
</div>
<br>

<div class="row">
  <div class="col-6">
    <div class="form-group">
      <label for="retorno">Retorno ao reclamante:</label>
      <textarea required class="form-control" name="retorno" id="retorno" rows="3"> @if(isset($reclamacao)){{$reclamacao->retorno}}@else{{ old('retorno')}}@endif</textarea>
    </div>
  </div>
  <div class="col-6">
    <div class="form-group">
      <label for="solucao">Solução da reclamação:</label>
      <textarea  class="form-control"  name="solucao" id="solucao" rows="3" >@if(isset($reclamacao)){{$reclamacao->solucao}}@else{{ old('solucao')}}@endif</textarea>
    </div>
</div>
</div>
<div class="row">
  <div class="col-6">
    <div class="form-group">
      <label for="analise">Análise crítica:</label>
      <textarea class="form-control" name="analise" id="analise" rows="3" > @if(isset($reclamacao)){{$reclamacao->analise}}@else{{ old('analise')}}@endif</textarea>
    </div>
  </div>
  <div class="col-6">
    <div class="form-group">
      <label for="feedback">Feedback de encerramento:</label>
      <textarea class="form-control"  name="feedback" id="feedback" rows="3" >@if(isset($reclamacao)){{$reclamacao->feedback}}@else{{ old('feedback')}}@endif</textarea>
    </div>
</div>
</div>
<div class="row">
  <div class="col-6">
    <div class="form-group">
      <label for="rep_analise_id" class="form-label">Responsável pela análise:</label>
      <select  name="rep_analise_id" id="rep_analise_id" class="form-control">
        <option value="">Selecione um Responsável</option>
          @foreach($rep_analise_id as $item)
            <option  value="{{$item->id}}" @if(isset($reclamacao) &&$reclamacao->rep_analise_id == $item->id) selected @elseif(old('rep_analise_id') == $item->id) selected @endif>{{$item->nome}}
            </option>
          @endforeach
      </select>
      
  </div>
  </div>
  <div class="col-6">
    <div class="form-group">
      <label for="data_encerramento" class="form-label">Data de encerramento:</label>
      <input  type="date" name="data_encerramento" class="form-control" value="@if(isset($reclamacao)){{$reclamacao->data_encerramento}}@else{{old('data_encerramento')}} @endif" @if(!isset($reclamacao->id)) disabled @endif  @if(isset($reclamacao->data_abertura)) min="{{ $reclamacao->data_abertura }}" @endif>
  </div> 
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="observacao">Observações:</label>
      <textarea class="form-control"  name="observacao" id="observacao" rows="3">@if(isset($reclamacao)){{$reclamacao->observacao}}@else{{ old('observacao')}}@endif</textarea>
    </div>
  </div>
</div>
    
    <div class="row">
        <div class="col" align="end">
            <br>
            <button type="submit" class="btn btn-success w-25 hover-shadow">
                Salvar 
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
  </form>
  
</div>
</div>
         
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@include('layout.footer')


<script>
 $(function () {

$('#teste').datetimepicker({

    minDate:new Date()

});

});
</script>