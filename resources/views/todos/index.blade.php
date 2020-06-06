@extends('layouts.app')

@section('title')
Todos
@endsection
@section('content')
<style>
    .list-group-item a{
        margin:0px 5px;
    }
    </style>
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card card-default my-5">
            <div class="card-header">
                List of Todos
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($todos as $todo)
                    <li class="list-group-item">
                        {{$todo->name}}
                       @if(!$todo->completed)
                        <a href="/todos/{{$todo->id}}/completed" class="btn btn-primary btn-sm float-right">Complete</a>
                       @endif

                        <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right">View</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

