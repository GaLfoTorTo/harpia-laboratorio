@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>Equipamentos</h2>

  <div class="row">
      <div class="col">
          <a href="/equipamentos/novo" class="btn btn-primary">
            Novo Equipamento 
            <i class="fas fa-plus"></i>
          </a>
      </div>
      <div class="col ">
        <form action="">
          <div class="input-group justify-content-end">
            <div class="form-outline ">
              <input type="search" id="form1" class="form-control" name="pesquisa"/>
              <label class="form-label" for="form1">Pesquisar</label>
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
    </div>
  </div>
  <div class="row">
      <div class="col">
          <table class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                    
                      <a href="" class="btn btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="" class="btn btn-danger" onclick="return confirm('Deseja realmente deletar?')">
                        <i class="fas fa-trash"></i>
                      </a>


                    </td>
                </tr>
              </tbody>
             
          </table>

        </div>
        <div>
        
        </div>
  </div>
</div>
@include('layout.footer')


