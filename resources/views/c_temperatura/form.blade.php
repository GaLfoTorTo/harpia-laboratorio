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
            <h1 class="m-0">{{ isset($c_temperaturas) ? 'Editar' : 'Novo' }} Controle de Temperatura</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/c_temperatura">Controle de Temperatura</a></li>
            <li class="breadcrumb-item active">{{ isset($c_temperaturas) ? 'Editar' : 'Novo' }}</li>
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
              @isset($c_temperaturas->id)
             
              <a href="/c_temperatura/novo" class="btn btn-primary">
                Nova Temperatura
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

  <form action="/c_temperatura/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($c_temperaturas){{$c_temperaturas->id}}@endisset">
    <div class="row">
      <div class="col-5">
        <div class="form-group">
          <label for="equipamento_id" class="form-label">Refrigerador:</label>
          <select required name="equipamento_id" id="equipamento_id" class="form-control">
            <option value="">Selecione um Refrigerador</option>
            @foreach($refrigerador as $item)
              <option value="{{$item->id}}" @if(isset($c_temperaturas) &&$c_temperaturas->equipamento_id == $item->id) selected @elseif(old('equipamento_id') == $item->id) selected @endif>{{$item->equipamento}}
              </option>
            @endforeach
          </select>
      </div>
    </div>
      
    <div class="col-3">
      <div class="form-group">
        <label for="re_numero" class="form-label">Número:</label>
        <input required type="number" name="re_numero" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->re_numero}}@else{{old('re_numero')}} @endif" >
    </div> 
    </div>
    <div class="col-4">
      <div class="form-group">
        <label for="mes_ano" class="form-label">Data:</label>
        <input required type="date" name="mes_ano" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->mes_ano}}@else{{old('mes_ano')}} @endif" >
    </div> 
    </div>
    </div>
    <hr>
    <div align='center'>
      <h3>Registro Diário</h3>
    </div>
    <br>
    <div class="row">
      <div class="col-6">
        <h5 >Especificações: T mín: 2C° / T máx: 8C°</h5> 
        <hr>
      </div>
   </div>
    <br>
    <div class="row">
      <div class="col-1">
        <div class="form-group">
          <label for="dia" class="form-label">Dia:</label>
          <input required type="number" name="dia" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->dia}}@else{{old('dia')}} @endif" >
      </div> 
      </div>
      <div class="col-2">
        <div class="form-group">
          <label for="hora" class="form-label">Hora:</label>
          <input required type="time" name="hora" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->hora}}@else{{old('hora')}} @endif" >
      </div> 
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="colaborador_id" class="form-label">Responsável:</label>
          <select required name="colaborador_id" id="colaborador_id" class="form-control">
            <option value="">Selecione um Responsável</option>
            @foreach($colaboradores_id as $item)
              <option value="{{$item->id}}" @if(isset($c_temperaturas) &&$c_temperaturas->colaborador_id == $item->id) selected @elseif(old('colaborador_id') == $item->id) selected @endif>{{$item->nome}}
              </option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-1">
      <div class="form-group">
        <label for="t_min" class="form-label">T mín:</label>
        <input required type="number" placeholder="°C" name="t_min" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->t_min}}@else{{old('t_min')}} @endif" >
    </div> 
    </div>
    <div class="col-1">
      <div class="form-group">
        <label for="t_atual" class="form-label">T atual:</label>
        <input required type="number" name="t_atual" class="form-control" placeholder="°C" value="@if(isset($c_temperaturas)){{$c_temperaturas->t_atual}}@else{{old('t_atual')}} @endif" >
    </div> 
    </div>
    <div class="col-1">
      <div class="form-group">
        <label for="t_max" class="form-label">T máx:</label>
        <input required type="number" name="t_max" class="form-control" placeholder="°C" value="@if(isset($c_temperaturas)){{$c_temperaturas->t_max}}@else{{old('t_max')}} @endif" >
    </div> 
    </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="observacoes">Observações:</label>
          <textarea class="form-control"  name="observacoes" id="observacoes" rows="3">@if(isset($c_temperaturas)){{$c_temperaturas->observacoes}}@else{{ old('observacoes')}}@endif</textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <label for="decongela_dia" class="form-label">Descongelamento (se aplicável):</label>
          <input type="date" name="decongela_dia" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->decongela_dia}}@else{{old('decongela_dia')}} @endif" >
      </div> 
      </div>
      <div class="col-7">
        <div class="form-group">
          <label for="d_colaborador_id" class="form-label">Responsável:</label>
          <select name="d_colaborador_id" id="d_colaborador_id" class="form-control">
            <option value="">Selecione um Responsável</option>
            @foreach($d_colaboradores_id as $item)
              <option value="{{$item->id}}" @if(isset($c_temperaturas) &&$c_temperaturas->d_colaborador_id == $item->id) selected @elseif(old('d_colaborador_id') == $item->id) selected @endif>{{$item->nome}}
              </option>
            @endforeach
          </select>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <label for="limpeza_dia" class="form-label">Limpeza:</label>
          <input type="date" name="limpeza_dia" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->limpeza_dia}}@else{{old('limpeza_dia')}} @endif" >
      </div> 
      </div>
      <div class="col-7">
        <div class="form-group">
          <label for="l_colaborador_id" class="form-label">Responsável:</label>
          <select name="l_colaborador_id" id="l_colaborador_id" class="form-control">
            <option value="">Selecione um Responsável</option>
            @foreach($l_colaboradores_id as $item)
              <option value="{{$item->id}}" @if(isset($c_temperaturas) &&$c_temperaturas->l_colaborador_id == $item->id) selected @elseif(old('l_colaborador_id') == $item->id) selected @endif>{{$item->nome}}
              </option>
            @endforeach
          </select>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-7">
        <div class="form-group">
          <label for="comprovacao_dia" class="form-label">Comprovação da temperatura com termômetro calibrado:</label>
          <input type="date" name="comprovacao_dia" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->comprovacao_dia}}@else{{old('comprovacao_dia')}} @endif" >
      </div> 
      </div>
      <div class="col-5">
        <div class="form-group">
          <label for="c_colaborador_id" class="form-label">Responsável:</label>
          <select name="c_colaborador_id" id="c_colaborador_id" class="form-control">
            <option value="">Selecione um Responsável</option>
            @foreach($c_colaboradores_id as $item)
              <option value="{{$item->id}}" @if(isset($c_temperaturas) &&$c_temperaturas->c_colaborador_id == $item->id) selected @elseif(old('c_colaborador_id') == $item->id) selected @endif>{{$item->nome}}
              </option>
            @endforeach
          </select>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-5">
        <div class="form-group">
          <label for="n_registro" class="form-label">N° de registro do termômetro em uso:</label>
          <input type="text" name="n_registro" class="form-control" value="@if(isset($c_temperaturas)){{$c_temperaturas->n_registro}}@else{{old('n_registro')}} @endif" >
      </div> 
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="analise_critica">Análise crítica:</label>
          <textarea class="form-control"  name="analise_critica" id="analise_critica" rows="3">@if(isset($c_temperaturas)){{$c_temperaturas->analise_critica}}@else{{ old('analise_critica')}}@endif</textarea>
        </div>

      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="observacao">Observações:</label>
          <textarea class="form-control"  name="observacao" id="observacao" rows="3">@if(isset($c_temperaturas)){{$c_temperaturas->observacao}}@else{{ old('observacao')}}@endif</textarea>
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