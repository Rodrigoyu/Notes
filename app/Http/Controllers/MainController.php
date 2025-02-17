<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
        //validade request
        $request->validate(
            [
                'text_title'=>'required|min:1|max:200', 
                'text_note'=>'required|min:1|max:5000'
            ],
            [
                'text_title.required'=>'O título é obrigadorio',
                'text_title.min'=>'O título deve ter no minimo :min caractere',
                'text_title.max'=>'O título deve ter no Maximo :max caractere',
                'text_note.required'=>'A nota é obrigadorio',
                'text_note.min'=>'Minimo de caracteres é :min',
                'text_note.max'=>'O maximo de caracteres é :max',

            ]
        );
        //get user id
        $id = session('user.id');
        //create new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();
        //redirect to home
        return redirect()->route('home');

    }

    public function editNote($id){
       
        $id = Operations::decryptId($id);
       
        //load note
        $note = Note::find($id);
        //show edit note view
        return view('edit_note', ['note' => $note]);
    }

    public function deleteNote($id){

       $id = Operations::decryptId($id);
       echo "I'm deleting note with id = $id";
    }

}
