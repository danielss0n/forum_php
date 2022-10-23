<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Board;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use File;

class PostController extends Controller
{
    //PAGINA HOME
    public function home() {
        $search = request('search');
        if($search) {
            $threads = Thread::where([['title', 'like', '%'.$search.'%']])->get();
        } else {
            $threads = Thread::where(['is_thread' => 1])->get();
        }
        return view('pages.home', [ 'threads' => $threads, 'search' => $search]);
    }

    //MOSTRAR BOARD
    public function showBoardThreads($name) {
        $board_name = $name;
        $threads = Thread::where(['board_name' => $name, 'is_thread' => 1])->paginate(4);
        
        return view('pages.boardthreads', ['threads' => $threads, 'board_name' => $board_name]);
    }

    //MOSTRAR THREAD
    public function showThread($thread_id) {
        $thread = Thread::where(['thread_id' => $thread_id])->first();
        $comments = Thread::where(['thread_id' => $thread_id, 'is_thread' => 0])->get();
        return view('pages.thread', ['thread' => $thread, 'comments' => $comments]);
    }

    public function createThreadPage() {
        $boards = Board::all();
        return view('pages.createThread', ['boards'=> $boards]);
    }

    



    

    

    public function storeThread($board_name, Request $request) {

        $thread = new Thread;

        $textThread = $request->text;
        $textLength = Str::length($textThread);

        if(!$request->password){
            return redirect('/thread/'.$comment_id)->with('msg', 'Senha obrigatoria');
        }

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = strtotime("now").$requestImage->getClientOriginalName();
            $requestImage->move(public_path('img/boards/'.$board_name), $imageName);
            $thread->img = $imageName;
        }

        $randomId =  random_int(10000, 99999);
        $thread->thread_id = $randomId;
        $thread->board_name = $board_name;
        $thread->password = $request->password;
        $thread->text = $textThread;        
        $thread->is_thread = 1;
        $thread->save();
        
        return redirect('/boards/'.$board_name)->with('msg', 'Artigo postado');
    }

    public function createComment($comment_id, Request $request) {

        $thread = Thread::where(['thread_id' => $comment_id, 'is_thread' => 1])->first();
        $comment = new Thread;

        if(!$request->password){
            return redirect('/thread/'.$comment_id)->with('msg', 'Senha obrigatoria');
        }
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = strtotime("now").$requestImage->getClientOriginalName();
            $requestImage->move(public_path('img/boards/'.$thread->board_name), $imageName);
            $comment->img = $imageName;
        }
        
        $text =  utf_encode($request->text);
        
        $comment->thread_id = $comment_id;
        //$comment->text = $request->text;
        $comment->text = 
        $comment->is_thread = 0;
        $comment->response_to = $request->response_to;
        $comment->password = $request->password;
        $comment->board_name = $thread->board_name;

        $comment->save();
        return redirect('/thread/'.$comment_id);
    }

}
