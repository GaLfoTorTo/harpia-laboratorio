@php
    $menu = [
        "Cargos" => ["links" => "cargos", "icone" => "fas fa-user-tie" ],
        "Clientes" => ["links" => "clientes", "icone" => "fas fa-users" ],
        "Colaboradores" => ["links" => "colaboradores", "icone" => "fas fa-user-friends" ],
        "Documentos" => ["links" => "documento", "icone" => "fas fa-copy" ],
        "Equipamento" => ["links" => "equipamentos", "icone" => "fas fa-microscope" ],
        "Fornecedores" => ["links" => "fornecedores", "icone" => "fas fa-dolly-flatbed" ],
        "Listra Mestra" => ["links" => "lista_mestras", "icone" => "fas fa-building" ],
        "Serviços" => ["links" => "servicos", "icone" => "fas fa-toolbox" ],
        "Setores" => ["links" => "setores", "icone" => "fas fa-building" ],
        "Usuários" => ["links" => "user", "icone" => "fas fa-user" ]
    ]
@endphp

<div class="modal fade" tabindex="-1" id="menuModal"role="dialog" aria-labelledby="titulo-modal" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastros</h5>
          <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#menuModal">
            <a class="nav-link" href="#" >
              <i class="fas fa-times" style="font-size: 27px !important; color: grey"></i>
            </a>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
              <div class="row justify-content-center">
                @foreach ($menu as $key => $item)
                  <div class="col-4 cardModalMenu btn btn-link iconeColor"  data-toggle="collapse" href="#{{$item['links']}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="nav-icon {{$item["icone"]}} iconeMenu"></i>
                    <div class="row">
                      <p class="col-11">
                        {{$key}}
                      </p>
                      <i class="col-1 right fas fa-angle-left justify-content-end"></i>
                    </div>
                    <div class="collapse" id="{{$item['links']}}">
                      <ul class="nav row justify-content-center">
                          <div class="row justify-content-center">
                            <li class="nav-item">
                                <a href="/{{$item["links"]}}/novo" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Novo</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/{{$item["links"]}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar</p>
                                </a>
                            </li>
                          </div>
                      </ul>
                    </div>
                  </div>
                @endforeach   
              </div>
            </ul>
        </div>
      </div>
    </div>
  </div>
</div>