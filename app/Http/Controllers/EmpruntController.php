<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Student;
use App\Models\Examplaire;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpruntRequest;
use App\Http\Requests\UpdateEmpruntRequest;
use \Illuminate\Http\Request;
use Auth;

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
            'students' => Student::latest()->get(),
            'books' => book::where('status', true)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpruntRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emprunt_date = date('Y-m-d');
        $return_date = $request->return_date;
        $emprunt = Emprunt::create([
            'user_id' => Auth::user()->id,
            'book_id' => $request->book_id,
            'emprunt_date' => $emprunt_date,
            'return_date' => $return_date,
            'status' => 1 // 1 veut dire true c'est à dire emprunté
        ]);

        $exemplaire = Examplaire::select('*')->where('book_id', $emprunt->book_id)->first();
        if ($exemplaire->nombre_exemplaires > 0) {

            $exemplaire->nombre_exemplaires = $exemplaire->nombre_exemplaires - 1;
            $exemplaire->save();

            $book =Book::find($exemplaire->book_id);
            $book->status = 1; 
            
            $book->save();
            $emprunt->save();

            return redirect()->route('home')->with('info', 'Emprunt bien pris en compte');
        } else {
            return back()->with('error', 'Ce livre n\'est pas disponible pour un emprunt');
        }

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
  
    public function detail(Request $request,Emprunt $emprunt)
    {
        $detemprunt = Emprunt::find($emprunt->id);
        return view('emprunt.detail', [
            'detemprunt' => $detemprunt]);
        
    }
}
