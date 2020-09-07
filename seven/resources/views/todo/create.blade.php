@extends('todo.layout')



@section('content')
    <h1 class="border-b border-gray-500 p-2">the things you need todo<h1>

    <form method="post" action="/todo/create">
        @csrf
        <x-alert/>
        <input type="text" name="title" class="py-2 px-5 border">
        <input type="submit" value="confirm" class="p-1 border">
    </form>

    <a href="/todo" class="m-5 py-1 px-1 bg-black corsor-pointer rounded-lg text-white">back</a>


@endsection