<?php

namespace App\Http\Controllers\User;

use App\Models\Livre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres = Livre::all();
        return view('user.livres.index', compact('livres'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$livres = Livre::all();

        return view('user.livres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
    $validator = Validator::make($request->all(),
        [
            "title" => ["required", "string", "max:255"],
            "name" => ["required", "string","max:255" ],
            "content" => ["required", "string"],
            "note" => ["required","integer","between:0,20"],
        ],
        [
            "title.required" => "Le titre est obligatoire",
            "title.string" => "Veuillez entrer une chaine de caractéres .",
            "title.max" => "Veuillez entrer 255 caracteres au maximum",

            
            "name.required" => "Le nom est obligatoire",
            "name.string" => "Veuillez entrer une chaine de caractéres .",
            "name.max" => "Veuillez entrer 255 caracteres au maximum",

            "content.required" => "L'avis est obligatoire",
            "content.string" => "Veuillez entrer une chaine de caractéres .",

            "note.required" => "La note est obligatoire",
            "note.integer" => "Ceci doit etre un entier",
            "note.between" => "La note doit etre comprise entre 0 et 20",
        ]);
        
        if($validator->fails())


        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        Livre::create([
            "title" =>$request->title,
            "name" =>$request->name,
            "content" =>$request->content,
            "note" =>$request->note,
        ]);
        return redirect()->route("user.livres.index")->with([
            "success" =>"votre livre vient d'etre sauvgardé"
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livre = Livre::find($id);
        //$livre = Livre::all();

        return view("user.livres.edit", compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    
        {  
            $livre = Livre::where("id", $id)->first();

            //dd($livre);
            $validator = Validator::make($request->all(),
                [
                    "title" => ["required", "string", "max:255"],
                    "name" => ["required", "string","max:255" ],
                    "content" => ["required", "string"],
                    "note" => ["required","integer","between:0,20"],
                ],
                [
                    "title.required" => "Le titre est obligatoire",
                    "title.string" => "Veuillez entrer une chaine de caractéres .",
                    "title.max" => "Veuillez entrer 255 caracteres au maximum",
        
                    
                    "name.required" => "Le nom est obligatoire",
                    "name.string" => "Veuillez entrer une chaine de caractéres .",
                    "name.max" => "Veuillez entrer 255 caracteres au maximum",
        
                    "content.required" => "L'avis est obligatoire",
                    "content.string" => "Veuillez entrer une chaine de caractéres .",
        
                    "note.required" => "la note est obligatoire",
                    "note.integer" => "Ceci doit etre un entier",
                    "note.between" => "La note doit être comprise entre 0 et 20",
                ]);
                
                if($validator->fails())
        
        
                {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                
                $livre->update([
                    "title" =>$request->title,
                    "name" =>$request->name,
                    "content" =>$request->content,
                    "note" =>$request->note,
                ]);
                return redirect()->route("user.livres.index")->with([
                    "success" =>"Votre livre vient d'être modifié."
                ]);
            }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livre = Livre::find($id);

        $livre->delete();

        return redirect()->back()->with([
            "success" => "Votre livre a été supprimé avec succès."
        ]);
    }
}