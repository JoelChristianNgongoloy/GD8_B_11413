<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Movie;
use Illuminate\Http\Request;
use Exception;

class TicketController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get ticket
        $ticket = Ticket::latest()->paginate(5);
        //render view with posts
        return view('ticket.index', compact('ticket'));
    }

    public function create()
    {
        $movies = Movie::all();
        return view('ticket.create', ['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'movie_id' => 'required|integer',
            'class' => 'required',
            'price' => 'required',
        ]);

        Ticket::create([
            'id_movie' => $request->input('movie_id'),
            'class' => $request->class,
            'price' => $request->price,
        ]);

        try {
            return redirect()->route('ticket.index');
        } catch (Exception $e) {
            return redirect()->route('ticket.index');
        }
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $movies = Movie::all();
       return view('ticket.edit', compact('ticket', 'movies'));
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        //validate form
        $this->validate($request, [
            'movie_id' => 'required|integer',
            'class' => 'required',
            'price' => 'required',
        ]);

        $ticket->update([
            'id_movie' => $request->input('movie_id'),
            'class' => $request->class,
            'price' => $request->price,
        ]);
        return redirect()->route('ticket.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('ticket.index')->with(['success' => 'Data
Berhasil Dihapus!']);
    }
}
