<!DOCTYPE html>
@extends('layouts.app')
@section('title')
Todo:{{$todo->name}}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card card-default my-5">
            <div class="card-header">
                {{$todo->name}}
            </div>
            <div class="card-body">
                <p>{{$todo->description}}</p>
            </div>

        </div>
        <div class="form-group">
            <a href="/todos/{{$todo->id}}/edit" class="btn btn-success">Edit</a>
            <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>
@endsection
