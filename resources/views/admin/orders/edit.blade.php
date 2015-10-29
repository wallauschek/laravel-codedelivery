@extends('app')

@section('content')

	<div class="container">
		<h3>Pedido # {{$order->id }} - R$ {{$order->total }}</h3>
		<h3>Clente: {{$order->client->user->name }}</h3>
		<h4>Data: {{ $order->created_at }}</h4>

		<p>
			<b>Entrega em: </b><br />
			{{ $order->client->address}} - {{ $order->client->city}} - {{ $order->client->state}}
		</p>

		{!! Form::model($order, ['route' => ['admin.orders.update', $order->id]]) !!}
		
			<div class="form-group">
				{!! Form::label('status', 'Status:') !!}
				{!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('ser_deliveryman_id', 'Entregador:') !!}
				{!! Form::select('user_deliveryman_id', $deliveryman, null, ['class'=>'form-control']) !!}
			</div>

			<div class="form-group">
            {!! Form::submit('Criar categoria', ['class'=>'btn btn-primary']) !!}
        	</div>

		{!! Form::close() !!}
			
	</div>

	

@stop