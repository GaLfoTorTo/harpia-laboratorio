<style>
    table {
        border-collapse: collapse;
    }
    th, td {
      border: 1px solid #000;
    }
</style>
<h1 class="m-0">Clientes</h1>
<table>
<thead>
    <tr>
    <th scope="col">#</th>
    <th>Nome</th>
    <th>CPF/CNPJ</th>
    <th>E-mail</th>
    <th>Telefone</th>
    </tr>
</thead>
@foreach ($clientes as $item)
<tbody>
    <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nome }}</td>
        <td>{{ $item->cpf_cnpj }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->telefone }}</td>
    </tr>
</tbody>
@endforeach
</table>
<br>
@if(count($clientes) < 1)
<div class="alert alert-info" style="margin-left: 61px; margin-right: 61px;">
    Nenhum registro encontrado!
</div>
@endif
