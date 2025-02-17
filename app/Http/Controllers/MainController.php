<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(){
        //load user's notes
        $id = session('user.id');
        
        $notes = User::find($id)->notes()->get()->toArray();

        //show home view
        return view('home',['notes' => $notes]);
    }

    public function newNote(){
        return view('new_note');
    }

    public function newNoteSubmit(Request $request){
        echo 'hellow new Notes';
    }

    public function editNote($id){
       
        $id = Operations::decryptId($id);
       echo "I'm editing note with id = $id";
    }

    public function deleteNote($id){

       $id = Operations::decryptId($id);
       echo "I'm deleting note with id = $id";
    }

}
