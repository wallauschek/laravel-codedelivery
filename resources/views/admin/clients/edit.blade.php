@extends('app')

@section('content')

    <div class="container">
        <h3>Editando cliente: {{ $client->user->name }}</h3>

        @include('errors._check')

        {!! Form::open( ['route'=>['admin.clients.update', $client->id]]) !!}

        @include('admin.clients._form')
        <div class="form-group">
            {!! Form::submit('Editar cliente', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop
