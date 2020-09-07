<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function index(){
        $todos=Todo::orderBy('complete')->get();
        return view('todo.index',compact('todos'));
    }

    function edit($id){
        $todo=Todo::find($id);
        return view('todo.edit',compact('todo'));
    }

    function create(){
        return view('todo.create');
    }

    function store(TodoCreateRequest $request){       
        Todo::create($request->all());
        return redirect()->back()->with('message','todolist created');
    }

    function update(TodoCreateRequest $request,Todo $todo){

        $todo->update(['title'=>$request->title]);

        return redirect(route('todo.index'))->with('message','successed update');
    }

    function complete(Todo $todo){
        $todo->update(['complete'=>true]);
        return redirect()->back()->with('message','Task complete');
    }
}
