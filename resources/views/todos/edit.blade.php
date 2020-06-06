@extends('layouts.app')

@section('title')
Create a Todo
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card card-default my-5">
            <div class="card-header">
                Update Todo
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                        <li class="list-group-item">
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="/update-todo/{{$todo->id}}">
                    <div class="form-group">
                        @csrf
                    <input type="text" name="name" placeholder="Name" style="width:100%" value="{{$todo->name}}"/>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" cols="20" name="description" style="width:100%" placeholder="Description" >{{$todo->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

