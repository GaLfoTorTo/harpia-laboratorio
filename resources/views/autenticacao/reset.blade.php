@include('autenticacao.header')
<div class="login-box">
    <div class="login-logo">
      <a href="/">
          <img src="/img/logo.png" alt="" class="logo-login">
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Esqueci a senha
            <br>
            <small>Informe o e-mail para a redefinição da senha:</small>
        </p>
        @if(session('status') != '')
          <div class="alert alert-success" align="center">{{ session('status') }}</div>
        @endif

        {{-- @if(session('email'))
          <div class="alert alert-info">{{ session('email') }}</div>
        @endif --}}
        <form action="/esqueci-senha" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            </div>
        </div>

          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Resetar senha</button>
            </div>
            <!-- /.col -->
        </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
@include('autenticacao.footer')