@extends('app')

@section('content')

    <div class="container">
        <h3>Novo Pedido</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'customer.orders.store','class'=>'form']) !!}

        <div class="form-group">
            <label>Total:</label>
            <p id="total"></p>

            <a href="#" id="btnNewItem" class="btn btn-default">Novo Item</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="items[0][product_id]" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }} - R${{ $product->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}

                            
                        </td>
                        <td><a href="#" name="items[0][remove]" class="removeItem">X</td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="form-group">
            {!! Form::submit('Criar pedido', ['class'=>'btn btn-primary']) !!}
        </div>
       
        
        {!! Form::close() !!}

    </div>

@stop

@section('post-script')
    <script>
    $('#btnNewItem').click(function(){

        var row = $('table tbody > tr:last'),
                    newRow = row.clone(),
                    length = $('table tbody tr').length;

        newRow.find('td').each(function(){

            var td = $(this),
                        input = td.find('input,select,a'),
                        name = input.attr('name');

            input.attr('name', name.replace((length-1) + "", length + ""));

        });

        newRow.find('input').val(1);
        newRow.insertAfter(row);
        calculateTotal();

    });

    $(document.body).on('click','select', function(){
        calculateTotal();
    });

    $(document.body).on('blur','input', function(){
        calculateTotal();
    });

    $(document.body).on('click','.removeItem', function(){
        if ($('table tbody tr').length>1) {
            $(this).parent().parent('tr').remove();
            calculateTotal();
        };
        
    });


    function calculateTotal(){
        var total =0,
                trLen = $('table tbody tr').length,
                tr = null, price, qtd;

        for (var i = 0; i < trLen; i++) {
            tr = $('table tbody tr').eq(i);
            price = tr.find(':selected').data('price');
            qtd = tr.find('input').val();
            total += price * qtd;
        };
        $('#total').html('R$ '+total);
    };
    </script>
@stop