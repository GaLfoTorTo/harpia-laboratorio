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
          <div class="row">
            <div class="col-9">
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
                @isset($user)
                  <a href="/user/novo" class="btn btn-primary">
                      Novo Usuário
                      <i class="fas fa-plus"></i>
                  </a>
              @endisset
    
      <form action="/user/salvar" method="POST" enctype="multipart/form-data">
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
                <div class="form-group cardSenha">
                    <label for="password" class="form-label lableSenha">Senha:</label>
                    <input type="password" name="password" class="form-control password" value="">
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
          <div class="col-6">
            <div class="form-group">
              <label for="foto" class="form-label">Carregar Foto:</label>
              <input type="file" name="foto_temp" class="form-control" value="@if(isset($user)){{$user->foto}}@else{{old('foto')}} @endif">
              
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
            </div>

            <div class="col-3">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    @if(isset($user) && $user->foto != '')
                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->foto }}" alt="">
                  @endif
                  </div>
                </div>
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
  $(document).ready(function(){
    var form = $('.m-0').text();
    if(form == 'Novo usuário'){
      console.log('funfo')
    }else if(form == 'Editar usuário'){
      var senha = document.querySelector('.password').value;
      if(senha != '' || senha != null){
        $('.password').attr('readonly', true);
        $('.lableSenha').empty()
        $('.lableSenha').append(`Alterar a Senha: `)
        $(`<label for="escolha">Sim</label>
          <input type="radio" class="tipo" name="tipo" id="sim">
          <label for="escolha">Não</label>
          <input type="radio" class="tipo" name="tipo" id="nao">`).insertBefore($('.password'));
        $('.tipo').click(function(){
          var id = $(this).attr('id');
          if(id == 'sim'){
            $('.password').removeAttr('readonly');
            $('.password').attr('value', '');
          }else if(id == 'nao'){
            $('.password').attr('readonly', true);
            $('.password').attr('value', senha);
            $('.password').removeAttr('required');
          }
        })
      }
    }

  })
</script>