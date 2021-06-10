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
                    <h1 class="m-0">{{ isset($analise_criticas) ? 'Editar' : 'Nova' }} Análise Crítica de Pedidos, Propostas e Contratos</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/analise_critica">Análise Crítica</a></li>
                            <li class="breadcrumb-item active">{{ isset($analise_criticass) ? 'Editar' : 'Novo' }}</li>
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
                    <form action="/analise_critica/salvar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($analise_criticas){{$analise_criticas->id}}@endisset">

                        <div class="row">
                            <div class="col-12 formu">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">Os métodos estão adequadamente definidos, documentados e entendidos pelo 
                                        pessoal do laboratório?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="metodos_definidos" value="sim" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas)&& $analise_criticas->metodos_definidos == "sim") checked @elseif(old("metodos_definidos") == "sim" ) checked @endif>
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="metodos_definidos" value="nao" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->metodos_definidos == "nao") checked @elseif(old("metodos_definidos") == "nao" )checked @endif>
                                </div>
                            </div>                            
                            <div class="col-12 formu">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">O laboratório possui pessoal qualificado para a realização dos ensaios?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" name="pessoal_qualificado" value="sim" style="
																				margin-left: 3px;
																				margin-right: 14px"  @if(isset($analise_criticas) && $analise_criticas->pessoal_qualificado == "sim") checked @elseif(old("pessoal_qualificado") == "sim") checked @endif>
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="pessoal_qualificado" value="nao" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->pessoal_qualificado == "nao") checked @elseif(old("pessoal_qualificado") == "nao" ) checked @endif>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-12 formu">
                                <div class="form-group">
                                    <label for="codigo" class="form-label">O laboratório possui capacidade e recursos para atender aos requisitos do cliente?</label>
                                        <br>
                                        <label for="sim">SIM</label>
                                        <input type="radio" class="tipo" name="capacidade_recursos" value="sim" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->capacidade_recursos == "sim") checked @elseif(old("capacidade_recursos") == "sim") checked @endif>
                                        <label for="nao">NÃO</label>
                                        <input type="radio" class="tipo" name="capacidade_recursos" value="nao" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->capacidade_recursos == "nao") checked @elseif(old("capacidade_recursos") == "nao" ) checked @endif>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group formu">
                                    <label for="codigo" class="form-label">O método de ensaio é adequado às necessidades do cliente?</label>
                                        <br>
                                        <label for="sim"  >SIM</label>
                                        <input type="radio" class="tipo" name="metodo_ensaio" value="sim" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->metodo_ensaio == "sim") checked @elseif(old("metodo_ensaio") == "sim") checked @endif>
                                        <label for="nao" class="si">NÃO</label>
                                        <input type="radio" class="tipo" name="metodo_ensaio" value="nao" style="
																				margin-left: 3px;
																				margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->metodo_ensaio == "nao") checked @elseif(old("metodo_ensaio") == "nao" ) checked @endif>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="card w-50">
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="codigo" class="form-label">Aprovado ?   </label>                                                
                                                <label for="sim">SIM</label>'
                                                <input type="radio" class="moto" name="aprovado" id="sim" value="sim"style="
																				'				margin-left: 3px;
																								margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->aprovado == "sim") checked @elseif(old("aprovado") == "1") checked @endif>
                                                <label for="nao">NÃO</label>
                                                <input type="radio" class="moto" name="aprovado" id="nao" value="nao" style="
																								margin-left: 3px;
																								margin-right: 14px" @if(isset($analise_criticas) && $analise_criticas->aprovado == "nao") checked @elseif(old("aprovado") == "nao") checked @endif>
                                                <textarea  readonly name="justificativa_reprovacao" class="form-control justificativa" placeholder="Justificativa da Reprovação" rows="3" >@if(isset($analise_criticas)){{$analise_criticas->justificativa_reprovacao}}@else{{ old('justificativa_reprovacao')}}@endif</textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="card w-50">
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="responsavel">Responsável</label>
                                        <select name="colaborador_id" id="colaborador_id" class="form-control" required>
                                            <option value="">Selecione</option>
                                            @foreach($colaboradores as $colaborador)
                                                <option value="{{ $colaborador->id }}"@if(isset($analise_criticas) && $analise_criticas->colaborador_id == $colaborador->id)selected @elseif(old('colaborador_id') == $colaborador->id) selected  
                                                @endif>{{  $colaborador->nome }}</option>
                                            @endforeach
                                            </select>
                                        <br>
                                        	<div class="input-group mb-3">														
                                            <input type="date" name="data" class="form-control" value="@if(isset($analise_criticas)){{$analise_criticas->data}}@else{{ old('data')}}@endif">
                                         </div>
                                      </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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

<script>
  $(document).ready(function(){
    var justValor = $('.moto').attr('value');
    if(justValor != ''){
      $(".justificativa").removeAttr("readonly");
    }
    $(".moto").click(function () {
        var valor = $(this).attr('id')
        //var valor = document.getElementById('nao');
        if(valor == "nao") {
            $(".justificativa").removeAttr("readonly");
        }else{
            $(".justificativa").attr("readonly",true);
            $(".justificativa").vol("");
        }
    });
  })

</script>