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
        <p class="login-box-msg">Área restrita</p>


        <form action="/reset-password" method="post">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required value="{{ request()->email }}">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Senha" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            </div>
        </div>
          <div class="input-group mb-3">
              <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme a senha" required>
            <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Alterar senha</button>
            </div>
            <!-- /.col -->
        </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
@include('autenticacao.footer')