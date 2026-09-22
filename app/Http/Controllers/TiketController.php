<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\View\View;

class TiketController extends Controller
{
    public function show(Event $event): View
    {
        return view('tiket.show', compact('event'));
    }
}
