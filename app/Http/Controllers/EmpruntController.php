<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Examplaire;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpruntRequest;
use App\Http\Requests\UpdateEmpruntRequest;
use \Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emprunt.index', [
            'emprunts' => Emprunt::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprunt.create', [
            'students' => student::latest()->get(),
            'books' => book::where('status', true)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpruntRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpruntRequest $request)
    {
        $emprunt_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime("+" . $request->return_date) . " days");
        $emprunt = Emprunt::create($request->validated() + [
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'emprunt_date' => $issue_date,
            'return_date' => $return_date,
            'status' => 1 // 1 veut dire true c'est à dire emprunté
        ]);

        $emprunt->save();
        $exemplaire = Examplaire::find($request->book_id);
        $exemplaire->nombre_exemplaires = $exemplaire->nombre_exemplaires - 1;
        $exemplaire->save();

        $book =Book::find($exemplaire->book_id);
        if($book->examplaire->nombre_exemplaires == 0) {
            $book->status = 0; // 0 veut dire que le livre n'est pas disponible
        } else {
            $book->status = 1; //1 veut dire que le livre est disponible
        }
        $book->save();

        return redirect()->route('emprunts')->with('info', 'Emprunt bien pris en compte');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprunt  $emprunt
     * @return \Illuminate\Http\Response
     */
    public function show(Emprunt $emprunt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emprunt  $emprunt
     * @return \Illuminate\Http\Response
     */
    public function edit(Emprunt $emprunt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpruntRequest  $request
     * @param  \App\Models\Emprunt  $emprunt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprunt $emprunt)
    {
        
        $emprunt->status = 0; //// 0 veut dire false c'est à dire retourné
        $emprunt->return_day = now();
        $emprunt->save();
        $exemplaire = Examplaire::find($emprunt->book_id);
        $exemplaire->nombre_exemplaires = $exemplaire->nombre_exemplaires + 1;
        $exemplaire->save();

        $book =Book::find($emprunt->book_id);
        $book->status = 1; //1 veut dire que le livre est disponible
        $book->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emprunt  $emprunt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emprunt $emprunt)
    {
        //
    }
}
