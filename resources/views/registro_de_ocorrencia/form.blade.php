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
                    <h1 class="m-0">{{ isset($registro) ? 'Editar' : 'Novo' }} Registro de Ocorrência</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/registro_de_ocorrencia"> Registro de Ocorrência</a></li>
                            <li class="breadcrumb-item active">{{ isset($registro) ? 'Editar' : 'Novo' }}</li>
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
                    
                    <form action="/registro_de_ocorrencia/salvar/" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="numero" class="form-label">Número:</label>
                                <input type="number" name="numero" class="form-control" required value="@if(isset($registro)){{$registro->numero}}@else{{ old('numero')}}@endif">
                            </div>
                        </div>                       
                        <div class="col-4">
                            <div class="form-group">
                                <label for="responsavel" class="form-label">Responsável:</label>
                                <input type="text" name="responsavel" class="form-control"  required value="@if(isset($registro)){{$registro->responsavel}}@else{{ old('responsavel')}}@endif">
                            
                            </div>
                        </div>    
                        <div class="col-4">
                            <div class="form-group">
                                <label for="origem" class="form-label">Origem:</label>
                                <input type="text" name="origem" class="form-control" required value="@if(isset($registro)){{$registro->origem}}@else{{ old('origem')}}@endif">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="data_de_abertura" class="form-label">Data de Abertura:</label>
                                <input type="date" name="data_de_abertura" class="form-control" required value="@if(isset($registro)){{$registro->data_de_abertura}}@else{{ old('data_de_abertura')}}@endif">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="identificacao_do_equipamento" class="form-label">Identificacao do Equipamento:</label>
                                <input type="text" name="identificacao_do_equipamento" class="form-control" required value="@if(isset($registro)){{$registro->identificacao_do_equipamento}}@else{{ old('identificacao_do_equipamento')}}@endif">
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="cod_equipamento" class="form-label">Cod Equipamento:</label>
                            <input type="text" name="cod_equipamento" class="form-control" required value="@if(isset($registro)){{$registro->cod_equipamento}}@else{{ old('cod_equipamento')}}@endif">
                    </div>
                </div>
                    </div>
                    <div class="row">
                          <div class="col-4">
                              <div class="form-group">
                                        <label for="descricao_da_ocorrencia" class="form-label">Descricao da Ocorrencia:</label>
                                        <input type="text" name="descricao_da_ocorrencia" class="form-control" required value="@if(isset($registro)){{$registro->descricao_da_ocorrencia}}@else{{ old('descricao_da_ocorrencia')}}@endif">
                                    </div>
                                </div>
                            
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="necessario_correcao_imediata" class="form-label">Necessario Correcao Imediata:</label>
                                            <input type="text" name="necessario_correcao_imediata" class="form-control" required value="@if(isset($registro)){{$registro->necessario_correcao_imediata}}@else{{ old('necessario_correcao_imediata')}}@endif">
                                        </div>
                                    </div>
                                      <div class="col-4">
                                            <div class="form-group">
                                                <label for="descrever_correcao" class="form-label">Descrever Correcao:</label>
                                                <input type="text" name="descrever_correcao" class="form-control" required value="@if(isset($registro)){{$registro->descrever_correcao}}@else{{ old('descrever_correcao')}}@endif">
                                            </div>
                                        </div>
                                      </div>
                                         <div class="row">
                                               <div class="col-4">
                                                   <div class="form-group">
                                                            <label for="ocorrencia_e_um_trabalho_NC" class="form-label">Ocorrencia e um Trabalho NC:</label>
                                                            <input type="text" name="ocorrencia_e_um_trabalho_NC" class="form-control" required value="@if(isset($registro)){{$registro->ocorrencia_e_um_trabalho_NC}}@else{{ old('ocorrencia_e_um_trabalho_NC')}}@endif">
                                                        </div>
                                                    </div>
                                                   <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="registro_de_AC_n" class="form-label">Registro de AC n:</label>
                                                                <input type="text" name="registro_de_AC_n" class="form-control" required value="@if(isset($registro)){{$registro->registro_de_AC_n}}@else{{ old('registro_de_AC_n')}}@endif">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="parecer_tecnico" class="form-label">Parecer Tecnico:</label>
                                                                <input type="text" name="parecer_tecnico" class="form-control" required value="@if(isset($registro)){{$registro->parecer_tecnico}}@else{{ old('parecer_tecnico')}}@endif">
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="observacoes" class="form-label">Observacoes:</label>
                                                                <input type="text" name="observacoes" class="form-control" required value="@if(isset($registro)){{$registro->observacoes}}@else{{ old('observacoes')}}@endif">
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
                    </div>
                </div>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                               
</div>
     
@include('layout.footer')