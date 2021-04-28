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
                    <h1 class="m-0">{{ isset($procedimento) ? 'Editar' : 'Novo' }} Procedimento</h1>
                </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/procedimento">Procedimento</a></li>
                            <li class="breadcrumb-item active">{{ isset($procedimento) ? 'Editar' : 'Novo' }}</li>
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

                    <form action="/procedimento/salvar/" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@isset($procedimento){{$procedimento->id}}@endisset">
                        <div class="row">               
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="rev" class="form-label">Rev.</label>
                                    <input type="text" name="rev" class="form-control" required value="@if(isset($procedimento)){{$procedimento->rev}}@else{{ old('rev')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="data" class="form-label">Data:</label>
                                    <input type="date" name="data" class="form-control"  required value="@if(isset($procedimento)){{$procedimento->data}}@else{{ old('data')}}@endif">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="analista" class="form-label">Analista</label>
                                    <input type="text" name="analista" class="form-control" required value="@if(isset($procedimento)){{$procedimento->analista}}@else{{ old('analista')}}@endif">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lote" class="form-label">Lote:</label>
                                    <input type="number" name="lote" class="form-control" required value="@if(isset($procedimento)){{$procedimento->lote}}@else{{ old('lote')}}@endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="responsavel" class="form-label">Responsável</label>
                                    <input type="text" name="responsavel" class="form-control" required value="@if(isset($procedimento)){{$procedimento->responsavel}}@else{{ old('responsavel')}}@endif">
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
                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
     
@include('layout.footer')