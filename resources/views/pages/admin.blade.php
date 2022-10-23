@extends('layouts.main')
@section('title', 'Umbralchan')
@section('content')

<h1>Admin</h1>

<form action="/addBoard" method="post" class="posting-form" enctype="multipart/form-data">
    @csrf
    <label for="title">Nome:</label>
    <input type="text" name="board_name">
    <input type="submit" value="Adicionar">
</form>

<div class="admin-pannel">

<div class='boards-pannel'>
<p>Boards</p>
    @foreach($boards as $board)
        <ul>
            <li>
                <a href="/boards/{{$board->name}}">{{$board->name}}</a>
                <form action="/removeBoard/{{$board->name}}" method="post">
                    @csrf
                    <input type="submit" value="Remover">
                </form>
            </li>
        </ul>
    @endforeach
</div>

<div class="threads-pannel">
    <p>Posts</p>
    @foreach($threads as $thread)
        <ul>
            <li>
                <a href="/thread/{{$thread->thread_id}}">{{$thread->text}}</a> - 
                <a href="/thread/{{$thread->title}}">{{$thread->board_name}}</a>
                <form action="/removeThread/{{$thread->id}}" method="post">
                    @csrf
                    <input type="submit" value="Remover">
                </form>
            </li>
        </ul>
    @endforeach
</div>

@endsection
