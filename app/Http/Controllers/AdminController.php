<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use File;

//IMPORT MODELS
use App\Models\Thread;
use App\Models\Board;
use App\Models\Comment;

class AdminController extends Controller
{
    //PAGINA ADMIN
    public function adminPage() {
        $threads = Thread::all();
        $boards = Board::all();
        return view('pages.admin', ['threads' => $threads, 'boards' => $boards]);
    }

    //ADMIN ADICIONAR BOARD//
    public function addBoard(Request $request) {
        $board = new Board;
        $board_name = $request->board_name;
        $board->name = $board_name;
        $path = public_path('img/boards/'.$board_name); 
        File::makeDirectory($path, 0777, true, true);
        $board->save();
        return redirect('/admin')->with('msg', 'Board criado');
    }

    //ADMIN REMOVER BOARD//
    public function removeBoard($board_name){
        Board::where(['name' => $board_name])->delete();
        File::deleteDirectory(public_path('img/boards/'.$board_name));
        return redirect('/admin')->with('msg', `Board removido`);
    }
}
