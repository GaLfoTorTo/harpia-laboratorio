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
            <h1 class="m-0">{{ isset($responsa_auto) ? 'Editar' : 'Novo' }} Responsabilidades e autorizações</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/reclamacoes">Responsabilidades e autorizações</a></li>
            <li class="breadcrumb-item active">{{ isset($responsa_auto) ? 'Editar' : 'Novo' }}</li>
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
              @isset($responsa_auto->id)
             
              <a href="/responsa_auto/novo" class="btn btn-primary">
                Nova Responsabilidades e autorizações
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

  <form action="/responsa_auto/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($responsa_auto){{$responsa_auto->id}}@endisset">
    <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="colaborador_id" class="form-label">Nome do colaborador:</label>
            <select  required name="colaborador_id" id="colaborador_id" class="form-control">
              <option value="">Selecione um Responsável</option>
              @foreach($colaboradores_id as $item)
                <option value="{{$item->id}}" @if(isset($responsa_auto) &&$responsa_auto->colaborador_id == $item->id) selected @elseif(old('colaborador_id') == $item->id) selected @endif>{{$item->nome}}
                </option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="autorizado_id" class="form-label">Autorizado por:</label>
          <select  required name="autorizado_id" id="autorizado_id" class="form-control">
            <option value="">Selecione um Responsável</option>
             @foreach($colaboradores_id as $item)
                <option value="{{$item->id}}" @if(isset($responsa_auto) &&$responsa_auto->colaborador_id == $item->id) selected @elseif(old('autorizado_id') == $item->id) selected @endif>{{$item->nome}}
                </option>
              @endforeach
          </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for=cargo_id" class="form-label">Cargo:</label>
        <select  required name="cargo_id" id="cargo_id" class="form-control">
          <option value="0">Selecione um Cargo</option>
          @foreach($cargos as $item)
            <option value="{{$item->id}}" @if(isset($responsa_auto) &&$responsa_auto->cargo_id == $item->id) selected @elseif(old('cargo_id') == $item->id) selected @endif>{{$item->cargo}}
            </option>
          @endforeach
        </select>
    </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="">Responsabilidades</label>
        <select class="js-example-basic-multiple form-control" id="lista_responsabilidades" name="states[]" multiple="multiple" placeholder="Selecione o cargo">
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="form-group">
        <label for="assinatura_autorizado" class="form-label">Assinatura autorizado:</label>
        <input type="text" name="assinatura_autorizado" class="form-control" value="@if(isset($responsa_auto)){{$responsa_auto->assinatura_autorizado}}@else{{old('assinatura_autorizado')}} @endif" >
    </div> 
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="assinatura_autorizador" class="form-label">Assinatura autorizador:</label>
        <input type="text" name="assinatura_autorizador" class="form-control" value="@if(isset($responsa_auto)){{$responsa_auto->assinatura_autorizador}}@else{{old('assinatura_autorizador')}} @endif" >
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

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    $('#cargo_id').change(function(){
      let cargo = $(this).val()
      $.ajax({
          url: "/cargos/responsabilidades/" + cargo,
        })
        .done(function( data ) {
          $('#lista_responsabilidades option').each(function() {
            $(this).remove();
          });
          $.each(data.responsabilidades, function (i, item) {
              $('#lista_responsabilidades').append($('<option>', { 
                  value: item.id,
                  text : item.nome 
              }));
          });



        });
      });
});
</script>