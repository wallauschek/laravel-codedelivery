@extends('app')

@section('content')

    <div class="container">
        <h3>cupoms</h3>



        <a href="{{ route('admin.cupoms.create') }}" class="btn btn-default">Novo cupom</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Codigo</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cupoms as $cupom)
            <tr>
                <td>{{ $cupom->id  }}</td>
                <td>{{ $cupom->code  }}</td>
                <td>{{ $cupom->value  }}</td>
                <td>
                    <a href="{{ route('admin.cupoms.edit', ['id'=>$cupom->id]) }}" title="" class="btn btn-default btn-sm">edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $cupoms->render()  !!}

    </div>

@stop
