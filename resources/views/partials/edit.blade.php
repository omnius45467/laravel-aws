@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! Form::model($user, ['route' => ['home.update', $user->id], 'method' => 'PUT']) !!}
                <div class="well entity-update col-md-12">
                    <div class="form-group col-md-6">
                        {!! Form::label('name') !!}
                        {!! Form::text('name', '', ['class' => 'form-control user-name', 'placeholder' =>
                        $user->name]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('email') !!}
                        {!! Form::text('email', '', ['class' => 'form-control user-email', 'placeholder' =>
                        $user->email]) !!}
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('img') !!}
                        {!! Form::file('img', '', ['class' => 'form-control', 'placeholder' =>'']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}

                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection