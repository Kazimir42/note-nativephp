<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $note = Note::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user->id,
        ]);
        $note->save();

        return Redirect::to(route('dashboard'));
    }
}
