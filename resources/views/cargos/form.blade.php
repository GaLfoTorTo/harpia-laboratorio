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
        <div class="col-12">
            <div class="form-outline">
              <label for="cargo" class="form-label">Cargo:</label>
              <input type="text" name="cargo" class="form-control" required value="@if(isset($cargo)){{$cargo->cargo}}@else{{ old('cargo')}}@endif">
              <br> 
            </div>   
        </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="formacao">Formação:</label>
          <textarea class="form-control" name="formacao" id="formacao" rows="3" required > @if(isset($cargo)){{$cargo->formacao}}@else{{ old('formacao')}}@endif</textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <textarea class="form-control"  name="descricao" id="descricao" rows="3" required>@if(isset($cargo)){{$cargo->descricao}}@else{{ old('descricao')}}@endif</textarea>
        </div>
    </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="requisitos">Pré-Requisitos:</label>
          <textarea class="form-control" id="requisitos" name="requisitos"  rows="3" required> @if(isset($cargo)){{$cargo->requisitos}}@else{{ old('requisitos')}}@endif</textarea>
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="treinamentos">Treinamentos:</label>
          <textarea class="form-control" id="treinamentos" name="treinamentos" rows="3" required>@if(isset($cargo)){{$cargo->treinamentos}}@else{{ old('treinamentos')}}@endif</textarea>
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