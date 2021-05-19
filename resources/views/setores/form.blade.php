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
            <h1 class="m-0">{{ isset($setor) ? 'Editar' : 'Novo' }} setor</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/setores">Setor</a></li>
            <li class="breadcrumb-item active">{{ isset($setor) ? 'Editar' : 'Novo' }}</li>
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
              @isset($setor->id)
             
              <a href="/setores/novo" class="btn btn-primary">
                Novo Setor
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

  <form action="/setores/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($setor){{$setor->id}}@endisset">
    <div class="row">
      <div class="col-6">
        <div class="form-outline">
          <label for="sub_setor" class="form-label">Setor Pai:</label>
          <select name="setors_id" class="form-control" id="setors_id">
            <option value=""></option>
            @foreach ($setores as $set)
              <option value="{{ $set->id }}" @if(isset($setor) && $setor->setors_id == $set->id) selected @elseif( old('setors_id') == $set->id) selected @endif >{{ $set->setor }}</option>
            @endforeach
          </select>
        </div>
    </div>
        <div class="col-6">
            <div class="form-outline">
              <label for="setor" class="form-label">Setor Filho:</label>
              <input type="text" name="setor" class="form-control" required value="@if(isset($setor)){{$setor->setor}}@else{{ old('setor')}}@endif">                  </div>
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