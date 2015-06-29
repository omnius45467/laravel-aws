@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>You are home</h1>
                @foreach($users as $user)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <h2>{{$user->name}}</h2>
                                <h3>{{$user->email}}</h3>
                                <img src="" alt=""/>
                                <button><a href="/home/{{$user->id}}/edit">Edit</a></button>
                            </div>
                            <div class="col-md-6">
                                <img src="" alt=""/>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection