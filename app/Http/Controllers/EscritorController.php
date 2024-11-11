<?php

namespace App\Http\Controllers;

use App\Models\Escritor;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EscritorController extends Controller
{
    public function index()
    {
        $escritors = Escritor::with('comics:title')->get();
        return Inertia::render('Escritors/Index',[
            'escritors' => $escritors
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
            'last_name' => 'required|max:80'
        ]);
        $escritor = new Escritor($request->input());
        $escritor->save();
        return redirect('escritors');
    }

    public function show(Escritor $escritor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escritor $escritor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escritor $escritor)
    {
        $request->validate([
            'name' => 'required|max:80',
            'last_name' => 'required|max:80'
        ]);
        $escritor->update($request->input());
        return redirect('escritors');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escritor $escritor)
    {
        $escritor->delete();
        return redirect('escritors');
    }
}
