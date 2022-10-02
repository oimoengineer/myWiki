<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Inertia\inertia;
use Redirect;

class NoteController extends Controller
{
    public function index(Note $note)
    {
        return inertia('Index', ['notes' => $note->get()]);
    }

    public function store(NoteRequest $request, Note $note)
    {
        $input = $request->all();
        $note->fill($input)->save();
        return Redirect::route('note.index');
    }
}
