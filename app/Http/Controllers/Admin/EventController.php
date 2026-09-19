<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('tanggal_tanding')->get();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tim_tuan_rumah' => ['required', 'string', 'max:255'],
            'tim_tamu' => ['required', 'string', 'max:255'],
            'tanggal_tanding' => ['required', 'date'],
            'stok_tiket' => ['required', 'integer', 'min:0'],
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('status', 'Pertandingan berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'tim_tuan_rumah' => ['required', 'string', 'max:255'],
            'tim_tamu' => ['required', 'string', 'max:255'],
            'tanggal_tanding' => ['required', 'date'],
            'stok_tiket' => ['required', 'integer', 'min:0'],
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('status', 'Pertandingan berhasil diupdate.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', 'Pertandingan berhasil dihapus.');
    }
}