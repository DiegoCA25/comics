<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Escritor;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    public function index()
    {
        return Inertia::render('Comics/Index',[
            'comics' => Comic::paginate(10)
        ]);
    }
    public function create()
    {
        return Inertia::render('Comics/Create',[
            'escritors' => Escritor::all()
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'isbn' =>'required|max:13',
            'description' =>'required|max:200',
            'title' =>'required|max:100',
            'publisher' =>'required|max:100',
            'release_date' =>'required|date',
            'pages' =>'required|numeric',
            'image' =>'required|file|mimes:png,jpg,gif',
            'escritors' => 'required|array'
        ]);
        $comic = Comic::create($request->all());
        if ($request->hasFile('image')) {
            $imgName = microtime(true).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('img',$imgName, 'public');
            $comic->image = '/img/'.$imgName;
            $comic->save();
        }
        $comic->escritors()->sync($request->escritors);
        return redirect('comics')->with('success', 'Comic creado');

    }
    public function updateComic(Request $request){
        $request->validate([
            'isbn' =>'required|max:13',
            'description' =>'required|max:200',
            'title' =>'required|max:100',
            'publisher' =>'required|max:100',
            'release_date' =>'required|date',
            'pages' =>'required|numeric',
            'id' =>'required|numeric',
            'escritors' => 'required|array'
        ]);
        $comic = Comic::find($request->id);
        $comic->update($request->input());
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($comic->image);
            $imgName = microtime(true).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('img',$imgName, 'public');
            $comic->image = '/img/'.$imgName;
            $comic->save();
        }
        $comic->escritors()->sync($request->escritors);
        return redirect('comics')->with('success', 'Comic actualizado');
    }
    public function show(Comic $comic)
    {
        return Inertia::render('Comics/Show',[
            'comic' => $comic, 'escritors' => $comic->escritors
        ]);
    }
    public function edit(Comic $comic)
    {
        return Inertia::render('Comics/Edit',[
            'escritors' => Escritor::all(),
            'comic' => $comic,
            'escritorsOfComic' => $comic->escritors
        ]);
    }
    public function update(Request $request, Comic $comic)
    {
        //
    }
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect('comics')->with('success', 'Comic eliminado');
    }
}
