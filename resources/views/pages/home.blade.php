@extends('layouts.main')
@section('title', 'Umbralchan')
@section('content')

<h1>Homepage</h1>

@foreach($threads as $thread)
<div class="thread">
    <a href="/thread/{{$thread->thread_id}}">{{$thread->text}}</a>
</div>
@endforeach

@endsection
