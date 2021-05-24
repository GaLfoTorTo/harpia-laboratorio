  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Harpia Laboratório</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src='{{ \Auth::user()->foto }}' class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/" class="d-block">
            {{ \Auth::user()->name }}
          </a>
          <a href="/logout" class="d-block">
            <b>Sair</b>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          {{-- </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configurações
                <span class="right badge badge-danger">Novo</span>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Ações Propostas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/acoes_propostas/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/acoes_propostas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Inspeção de Recebidos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inspecao_recebidos/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/inspecao_recebidos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-clipboard"></i>
              <p>
                Novo RNC
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/novo_rnc/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/novo_rnc" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Participantes Treinamento
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/participantes_treinamento/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/participantes_treinamento" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check-double"></i>
              <p>
                Procedimentos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/procedimento/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/procedimento" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-signature"></i>
              <p>
                Registro de Ocorrencias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/registro_de_ocorrencia/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/registro_de_ocorrencia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-exclamation-triangle"></i>
              <p>
               Reclamações e Sugestões
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/reclamacoes/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/reclamacoes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-prescription"></i>
              <p>
                Registro Treinamento
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/registro_treinamento/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/registro_treinamento" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>       
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-temperature-low"></i>
              <p>
                Temperatura
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/c_temperatura/novo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Novo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/c_temperatura" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>