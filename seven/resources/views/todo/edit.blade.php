@extends('todo.layout')



@section('content')
    <h1 class="border-b border-gray-500 p-4">update this list<h1>

    <form method="post" action="{{route('todo.update',$todo->id)}}">
        @csrf
        @method('patch')
        <x-alert/>
        <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-5 border">
        <input type="submit" value="Update" class="p-1 border">
    </form>

    <a href="/todo" class="m-5 py-1 px-1 bg-black corsor-pointer rounded-lg text-white">back</a>


@endsection