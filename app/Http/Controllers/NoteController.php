<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\inertia;

class NoteController extends Controller
{
    public function index()
    {
        return inertia('Index');
    }

    public function store()
    {

    }
}
