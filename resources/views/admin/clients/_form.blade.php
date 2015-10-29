
 		<div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name', isset($client)?$client->user->name:'', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email', isset($client)?$client->user->email:'', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('repassword', 'Repita sua Password:') !!}
            {!! Form::password('repassword', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Telefone:') !!}
            {!! Form::text('phone', isset($client)?$client->phone:'', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Logradouro:') !!}
            {!! Form::text('address', isset($client)?$client->address:'', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Cidade:') !!}
            {!! Form::text('city', isset($client)?$client->city:'', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado:') !!}
            {!! Form::text('state', isset($client)?$client->state:'', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('zipcode', 'CEP:') !!}
            {!! Form::text('zipcode', isset($client)?$client->zipcode:'', ['class'=>'form-control']) !!}
        </div>
