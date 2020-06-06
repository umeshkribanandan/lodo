<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }


    public function create()
    {
        return view('todos.create');
    }

    function sanitizeTodo()
    {
        $this->validate(request(), [
            'name' => 'required|min:10|max:100',
            'description' => 'required'
        ]);
        return request()->all();
    }

    public function store()
    {
        $data = $this->sanitizeTodo();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', "Todo has been created successfully");

        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $data = $this->sanitizeTodo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();
        session()->flash('success', "Todo has been updated successfully");

        return redirect('/todos');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        session()->flash('success', "Todo has been deleted successfully");
        return redirect('/todos');
    }

    public function completed(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash('success', "Todo has been updated successfully");
        return redirect('/todos');
    }
}
