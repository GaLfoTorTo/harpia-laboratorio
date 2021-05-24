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

                        <div class="card-header">
                          <a href="/registro_de_ocorrencia/novo" class="btn btn-primary">
                            Novo Registro 
                            <i class="fas fa-plus"></i>
                          </a>
                          <br><br>
                    
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
                                <label for="origem" class="form-label">Origem:</label>
                                <input type="text" name="origem" class="form-control" required value="@if(isset($registro)){{$registro->origem}}@else{{ old('origem')}}@endif">
                            
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="data_de_abertura" class="form-label">Data de Abertura:</label>
                                <input type="date" name="data_de_abertura" class="form-control" required value="@if(isset($registro)){{$registro->data_de_abertura}}@else{{ old('data_de_abertura')}}@endif">
                            </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="identificacao_do_equipamento" class="form-label">Identificacao/Cod. Equipamento:</label>
                                <input type="text" name="identificacao_do_equipamento" class="form-control" required value="@if(isset($registro)){{$registro->identificacao_do_equipamento}}@else{{ old('identificacao_do_equipamento')}}@endif">
                            </div>
                        </div>
                        <div class="col-6">
                             <div class="form-group">
                             <label for="ocorrencia_e_um_trabalho_NC" class="form-label">Ocorrencia e um Trabalho NC:</label>
                             <input type="text" name="ocorrencia_e_um_trabalho_NC" class="form-control" required value="@if(isset($registro)){{$registro->ocorrencia_e_um_trabalho_NC}}@else{{ old('ocorrencia_e_um_trabalho_NC')}}@endif">
                        </div>
                 </div>
                </div>
                <div class="row">
                 <div class="col-6">
                        <div class="form-group">
                            <label for="necessario_correcao_imediata" class="form-label">Necessário correção imediata:</label>
                            <select name="necessario_correcao_imediata" id="necessario_correcao_imediata" class="form-control selecao">
                                <option value="">Selecione:</option>
                                @foreach ($necessario_correcao_imediata as $key => $t)
                                    <option value="{{ $t }}" @if(isset($registro) && $registro->necessario_correcao_imediata == $t)  selected @elseif(old('necessario_correcao_imediata') == $t) selected @endif >{{$t}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="registro_de_AC_n" class="form-label">Registro de AC n:</label>
                         <input type="text" name="registro_de_AC_n" class="form-control" required value="@if(isset($registro)){{$registro->registro_de_AC_n}}@else{{ old('registro_de_AC_n')}}@endif">
                 </div>
                </div>
              </div>
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="descrever_correcao">Descrição da ocorrência:</label>
                            <textarea class="form-control" name="descrever_correcao" id="descrever_correcao" rows="3" required> @if(isset($registro)){{$registro->descrever_correcao}}@else{{ old('descrever_correcao')}}@endif</textarea>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-12">
                        <div class="form-group">
                            <label for="descrever_correcao">Descrever correção:</label>
                            <textarea class="form-control" name="descrever_correcao" id="descrever_correcao" rows="3" required> @if(isset($registro)){{$registro->descrever_correcao}}@else{{ old('descrever_correcao')}}@endif</textarea>
                        </div>
                    </div>
                </div> 
                        <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="parecer_tecnico">Parecer tecnico:</label>
                            <textarea class="form-control" name="parecer_tecnico" id="parecer_tecnico" rows="3" required> @if(isset($registro)){{$registro->parecer_tecnico}}@else{{ old('parecer_tecnico')}}@endif</textarea>
                        </div>
                    </div>
                </div>
                        <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="observacoes">Observações:</label>
                            <textarea class="form-control" name="observacoes" id="observacoes" rows="3" required> @if(isset($registro)){{$registro->observacoes}}@else{{ old('observacoes')}}@endif</textarea>
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
        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                                    
@include('layout.footer')