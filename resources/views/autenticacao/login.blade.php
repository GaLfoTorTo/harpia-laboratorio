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
        
        <form action="/logar" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
            </div>
        </div>
          <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Efetuar login</button>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-link btn-block">
              <a href="/esqueci-senha">Esqueci minha senha</a>
            </button>
          </div>
        </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
@include('autenticacao.footer')