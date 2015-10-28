@extends('app')

@section('content')

    <div class="container">
        <h3>Produtos</h3>



        <a href="{{ route('admin.products.create') }}" class="btn btn-default">Novo produto</a>
        <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>categoria</th>
                <th>preço</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id  }}</td>
                <td>{{ $product->name  }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}" title="" class="btn btn-default btn-sm">edit</a>
                    <a href="{{ route('admin.products.destroy', ['id'=>$product->id]) }}" title="" class="btn btn-danger btn-sm">remover</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render()  !!}

    </div>

@stop
