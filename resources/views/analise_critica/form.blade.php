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
                    <h1 class="m-0">{{ isset($analise_critica) ? 'Editar' : 'Novo' }} Análise Crítica</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/analise_critica">Análise Crítica</a></li>
                            <li class="breadcrumb-item active">{{ isset($analise_critica) ? 'Editar' : 'Novo' }}</li>
                        </ol>
                    </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container corpo">
        <div class="container-fluid">
            <div class="row card">
                <div class="col card-body">

                    <form action="/analise_critica/salvar/" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($analise_critica){{$analise_critica->id}}@endisset">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Os métodos estão adequadamente definidos, documentados e entendidos pelo 
                                        pessoal do laboratório?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="metodos_definidos" id="sim">
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="metodos_definidos" id="nao">
                                </div>
                            </div>                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">O Laboratório possui pessoal qualificado para a realização dos ensaios?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="pessoal_qualificado" id="sim">
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="pessoal_qualificado" id="nao">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">O laboratório possui capacidade e recursos para atender aos requisitos do cliente?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="capacidade_recursos" id="sim">
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="capacidade_recursos" id="nao">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">O método de ensaio é adequado às necessidades do cliente?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="metodo_ensaio" id="sim">
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="metodo_ensaio" id="nao">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Aprovado?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="aprovado" id="sim">
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="aprovado" id="nao">
                                </div>
                            </div>
                        </div>                            
                            <div class="col">
                                <button type="submit" class="btn btn-success w-100">
                                    Salvar 
                                    <i class="fas fa-save"></i>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
     
@include('layout.footer')