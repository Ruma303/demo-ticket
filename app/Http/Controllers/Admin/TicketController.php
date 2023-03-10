<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class TicketController extends Controller
{
    //TODO crea array validazioni.
    private $validations = [
        'subject' => 'required|string|max:100',
        'priority' => 'required|string|max:100',
        'message' => 'required|string',
        'file' => 'nullable'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(20);
        return view('admin.tickets.index', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = Str::random(40);
        $file = $request->file('file');
        $extension = $request->file('file')->getClientOriginalExtension();
        $newFileName = $name . '.' . $extension;
        $filePath = $request->file('file')->storeAs('uploads', $newFileName, 'public');
        //%Secondo Metodo
        //$filePath = Storage::disk('public')->putFileAs('uploads', $file, $newFileName);
        $request->validate($this->validations);
        $data = $request->all();
        $ticket = new Ticket;
        $ticket->subject  = $data['subject'];
        $ticket->priority  = $data['priority'];
        $ticket->message  = $data['message'];
        $ticket->file = $filePath;
        $ticket->save();
        return redirect()->route('admin.tickets.show', $ticket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate($this->validations);
        $data = $request->all();
        $ticket->subject  = $data['subject'];
        $ticket->priority  = $data['priority'];
        $ticket->message  = $data['message'];
        $ticket->update();
        return redirect()->route('admin.tickets.show', $ticket->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')->with('deleted', $ticket);
    }
}
