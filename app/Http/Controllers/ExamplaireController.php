<?php

namespace App\Http\Controllers;

use App\Models\Examplaire;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamplaireRequest;
use App\Http\Requests\UpdateExamplaireRequest;
use \Illuminate\Http\Request;

class ExamplaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exemplaires = Examplaire::OrderBy('created_at', 'desc')->paginate(10);
        return view('exemplaire.index', compact('exemplaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $books = Book::all();
        return view('exemplaire.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamplaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamplaireRequest $request)
    {
        //
        $validated = $request->validated();
        $examplaire = new Examplaire;
        $examplaire->nombre_exemplaires = $request->nombre_exemplaires;
        $examplaire->book_id = $request->book_id;

        $examplaire->save();
        return redirect()->route('exemplaire.index')->with("info", "L'exemplaire est sauvegardé avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examplaire  $examplaire
     * @return \Illuminate\Http\Response
     */
    public function show(Examplaire $examplaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examplaire  $examplaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Examplaire $examplaire)
    {
        //
        $books = Book::all();
        return view('exemplaire.edit', compact('examplaire', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamplaireRequest  $request
     * @param  \App\Models\Examplaire  $examplaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamplaireRequest $request, Examplaire $examplaire)
    {
        //
        $validated = $request->validated();

        $examplaire->nombre_exemplaires = $request->nombre_exemplaires;
        $examplaire->book_id = $request->book_id;

        $examplaire->save();
        return redirect()->route('exemplaire.index')->with("info", "L'exemplaire est sauvegardé avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examplaire  $examplaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examplaire $examplaire)
    {
        //
    }
}
