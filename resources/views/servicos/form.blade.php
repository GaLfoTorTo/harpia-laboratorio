@include('layout.header')
@include('layout.menu')
<div class="container corpo">
  <h2>{{ isset($servico) ? 'Editar' : 'Novo' }} serviço</h2>

  <form action="/servicos/salvar" method="POST">
    @csrf
    <input type="hidden" name="id" value="@isset($servico){{$servico->id}}@endisset">
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <input type="text" name="descricao" class="form-control" required value="@isset($servico){{$servico->descricao}}@endisset">
                <label for="descricao" class="form-label">Descrição:</label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <select name="tipo_material" id="tipo_material" class="form-select">
                    <option value="">Selecione tipo material</option>
                    @foreach ($tipo_material as $key => $item)
                    <option value="{{ $item }}" {{ isset($servico) && $servico->tipo_material == $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-outline">
                <select name="tipo_servico" id="tipo_servico" class="form-select">
                    <option value="">Selecione o tipo do serviço</option>
                    @foreach ($tipo_servico as $key => $item)
                        <option value="{{ $item }}" {{ isset($servico) && $servico->tipo_servico == $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-outline">
                <select name="servico_critico" id="servico_critico" class="form-select">
                    <option value="">Serviço crítico?</option>
                    <option value="Sim" {{ isset($servico) && $servico->servico_critico == 'Sim' ? 'selected' : '' }}>Sim</option>
                    <option value="Não" {{ isset($servico) && $servico->servico_critico == 'Não' ? 'selected' : '' }}>Não</option>
                    
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" align="end">
            <button type="submit" class="btn btn-success w-25 hover-shadow">
                Salvar 
                <i class="fas fa-save"></i>
            </button>
        </div>
    </div>
  </form>
</div>
@include('layout.footer')