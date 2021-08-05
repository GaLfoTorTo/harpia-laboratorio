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
            <h1 class="m-0">{{ isset($cargo) ? 'Editar' : 'Novo' }} cargo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/cargos">Cargos</a></li>
            <li class="breadcrumb-item active">{{ isset($cargo) ? 'Editar' : 'Novo' }}</li>
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
              @isset($cargo->id)
             
              <a href="/cargos/novo" class="btn btn-primary">
                Novo Cargo
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

  <form action="/cargos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($cargo){{$cargo->id}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
              <label for="cargo" class="form-label">Cargo:</label>
              <input type="text" name="cargo" class="form-control" required value="@if(isset($cargo)){{$cargo->cargo}}@else{{ old('cargo')}}@endif">
              <br> 
            </div>   
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="formacao">Nível de Formação:</label>
            <select required name="tipo_formacao" id="tipo_formacao" class="form-control">
              <option value="">Selecione</option>
              @foreach ($tipo_formacao as $key => $tipo)
                  <option class="" value="{{$tipo}}"@if(isset($cargo) && $cargo->tipo_formacao == $tipo) selected @elseif(old('tipo_formacao') == $tipo) selected @endif>{{$tipo}}</option>
              @endforeach
          </select>
          </div>
        </div>
    </div>
    <hr>
    <div align='center'>
      <h3>Responsabilidades</h3>
    </div>
    <br>
   <div class="row">
        <div class="col-lg-6">
          @if(isset($cargo) && count($cargo->responsabilidades) > 0)
          @foreach ($cargo->responsabilidades as $item)
          <div id="inputFormRow">
            <div class="input-group mb-3">
              <input type="text" name="responsabilidades[]" class="form-control m-input" placeholder="Adicionar responsabilidade" autocomplete="off" value="{{ $item->nome }}">
              <div class="input-group-append">                
                <button id="removeRow" type="button" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </div>
          </div>    
          @endforeach
          @else
            <div id="inputFormRow">
                <div class="input-group mb-3">
                  <input type="text" name="responsabilidades[]" class="form-control m-input" placeholder="Adicionar responsabilidade" autocomplete="off">
                  <div class="input-group-append">                
                    <button id="removeRow" type="button" class="btn btn-danger">
                      <i class="fas fa-trash"></i>
                      
                    </button>
                  </div>
                </div>
              </div>
            @endif

            <div id="newRow"></div>
            <button id="addRow" type="button" class="btn btn-info"> 
              <i class="fas fa-plus"></i>
              Adicionar</button>
        </div>
    </div>
    <hr>
    <div align='center'>
      <h3>Pré-Requisitos</h3>
    </div>
    <br>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="qualificacao">Qualificação:</label>
          <textarea class="form-control" id="qualificacao" name="qualificacao"  rows="3" required> @if(isset($cargo)){{$cargo->qualificacao}}@else{{ old('qualificacao')}}@endif</textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="xp_minima">Experiência mínima:</label>
          <textarea class="form-control" id="xp_minima" name="xp_minima"  rows="3" required> @if(isset($cargo)){{$cargo->xp_minima}}@else{{ old('xp_minima')}}@endif</textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="treinamentos">Treinamento:</label>
          <textarea class="form-control" id="treinamentos" name="treinamentos" rows="3" required>@if(isset($cargo)){{$cargo->treinamentos}}@else{{ old('treinamentos')}}@endif</textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="habilidades">Habilidades:</label>
          <textarea class="form-control" id="habilidades" name="habilidades" rows="3" required>@if(isset($cargo)){{$cargo->habilidades}}@else{{ old('habilidades')}}@endif</textarea>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="descricao">Área de formação:</label>
          <textarea class="form-control"  name="descricao" id="descricao" rows="3" required>@if(isset($cargo)){{$cargo->descricao}}@else{{ old('descricao')}}@endif</textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="con_tecnico">Conhecimento técnico:</label>
          <textarea class="form-control"  name="con_tecnico" id="con_tecnico" rows="3" required>@if(isset($cargo)){{$cargo->con_tecnico}}@else{{ old('con_tecnico')}}@endif</textarea>
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


<script type="text/javascript">
  // add row
  $("#addRow").click(function () {
      var html = '';
      html += '<div id="inputFormRow">';
      html += '<div class="input-group mb-3">';
      html += '<input type="text" name="responsabilidades[]" class="form-control m-input" placeholder="Adicionar responsabilidade" autocomplete="off">';
      html += '<div class="input-group-append">';
      html += '<button id="removeRow" type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>';
      html += '</div>';
      html += '</div>';

      $('#newRow').append(html);
  });

  // remove row
  $(document).on('click', '#removeRow', function () {
      $(this).closest('#inputFormRow').remove();
  });
</script>