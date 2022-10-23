@extends('layouts.main')
@section('title', 'Umbralchan')
@section('content')

<h1 class="title-board">{{$board_name}}</h1>
<div class="comment-area">
    <div class="form-comment">
        <form action="/boards/{{$board_name}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="password" name="password" placeholder="senha">
            <input type="text" name="response_to" value="" id="response_to" placeholder="Id do post">
            <textarea name="text" cols="30" rows="10" id="form-text" class="form-text"></textarea>
            <input name="image" type="file" value="Escolher imagem">
            <input type="submit" value="Postar">
        </form>
    </div>
</div>

@foreach($threads as $thread)
<div class="comments-area">
    <div class="comment-container">
        <div class="comment_nav">
            <p class="anonimo">anonimo</p>
            <p>{{$thread->created_at}}</p>
            <p class="thread-id">Id: {{$thread->id}}</p>
        </div>
        <div class="thread-content">
            @if($thread->img)
                <img class="thread-img" src="/img/boards/{{$thread->board_name}}/{{$thread->img}}">
            @endif
            <p class="comment-text">{{$thread->text}}</p>
        </div>
    </div>
    <a href="/thread/{{$thread->thread_id}}"><button>Entrar no thread</button></a>
</div>
@endforeach
{{$threads->links()}}
@endsection
