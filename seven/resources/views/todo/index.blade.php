@extends('todo.layout')



@section('content')
<div class="flex justify-center border-b border-gray-500">
    <h1 class="text-2xl">Todo list<h1>
    <a href="/todo/create" class="mx-5 py-1 px-1 bg-blue-400 corsor-pointer rounded-lg text-white">New List</a>
</div>
    
    <ul>
    <x-alert/>
    @foreach($todos as $todo)   
        <li  class="flex justify-between p-2">
        @if($todo->complete)
            <p class="line-through">{{$todo->title}}</p>
        @else
            <p>{{$todo->title}}</p>
        @endif
        <div>
            <a href="{{'/todo/'.$todo->id.'/edit'}}" class="mx-5 py-1 px-1 text-blue-400 cursor-pointer ">
                <span class="fas fa-edit ">
            </a>
            @if($todo->complete)
                <span class="fas fa-check text-red-700 cursor-pointer" />
            @else
                <span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="fas fa-check text-gray-400 cursor-pointer" />
                <form id="{{'form-complete-'.$todo->id}}" style="display:none" method="post" action="{{route('todo.complete',$todo->id)}}" >
                    @csrf
                    @method('put');
                </form>
            @endif
        </div>
        </li>

       
    @endforeach
    </ul>

@endsection