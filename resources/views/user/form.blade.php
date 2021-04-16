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
            <h1 class="m-0">{{ isset($user) ? 'Editar' : 'Novo' }} usuário</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/clientes">Clientes</a></li>
            <li class="breadcrumb-item active">{{ isset($user) ? 'Editar' : 'Novo' }}</li>
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

  <form action="/user/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@if(isset($user)){{$user->id}}@else{{ old('id') }}@endif">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" class="form-control" required value="@if(isset($user)){{$user->name}}@else{{ old('name') }}@endif">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" name="password" class="form-control" required value="@if(isset($user)){{$user->password}}@else{{ old('password') }}@endif">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" value="@if(isset($user)){{$user->email}}@else{{old('email')}} @endif" >
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