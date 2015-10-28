@extends('app')

@section('content')

    <div class="container">
        <h3>Clientes</h3>



        <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo cliente</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>E-mail</th>
                <th>Cidade</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id  }}</td>
                <td>{{ $client->user->name  }}</td>
                <td>{{ $client->user->email }}</td>
                <td>{{ $client->city }}</td>
                <td>
                    <a href="{{ route('admin.clients.edit', ['id'=>$client->id]) }}" title="" class="btn btn-default btn-sm">edit</a>
                    <a href="{{ route('admin.clients.destroy', ['id'=>$client->id]) }}" title="" class="btn btn-danger btn-sm">remover</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $clients->render()  !!}

    </div>

@stop
