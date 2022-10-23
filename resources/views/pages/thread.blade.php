@extends('layouts.main')
@section('title', 'Umbralchan')
@section('content')
<script>
    function getId(id) {
        var input = document.getElementById(`response_to`).value = id
    }
</script>
<div class="comments-area">
    <div class="container">
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
        <div class="comments-area">
        <button onclick="getId({{$thread->id}})">Resposta Rápida</button>

        <div class="comments-box">
            @foreach($comments as $comment)
            <div class="comment">
                <div class="comment_nav">
                    <p class="anonimo">anonimo</p>
                    <p>{{$comment->created_at}}</p>
                    <p class="thread-id">Id: {{$comment->id}}</p>
                </div>
                    <div class="thread-content">
                        @if($comment->img)
                            <img  class="thread-img" src="/img/boards/{{$comment->board_name}}/{{$comment->img}}" >
                        @endif
                        <div class="comment-text">
                            <p>>> {{$comment->response_to}}</p> <br>
                            <p class="comment-text">{{$comment->text}}</p>
                        </div>
                    </div>
                <button onclick="getId({{$comment->id}})">Resposta Rápida</button>
            </div>
        @endforeach
    </div>
</div>
<div class="form-comment">
    <form action="/thread/{{$thread->thread_id}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="password" name="password" placeholder="senha">
        <input type="text" name="response_to" value="{{$thread->id}}" id="response_to" placeholder="Id do post">
        <textarea name="text" cols="30" rows="10" id="form-text" class="form-text"></textarea>
        <input name="image" type="file" value="Escolher imagem">
        <input type="submit" value="Postar">
    </form>
</div>
@endsection
