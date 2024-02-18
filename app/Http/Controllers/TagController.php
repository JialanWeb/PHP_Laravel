<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $count = Tag::all()->count();
        return view('tag.index')->with(['beitraege' => $tags, 'zahl' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'style' => ['required','min:3','regex:/^(primary|danger|success|info|warning|secondary)$/i']
        ]);
        
        $tag = new Tag([
            //'nameDerSpalteInDB' => $request['nameDesFeldesInFormular']
            'name' => $request['name'],
            'style' => $request['style'],
        ]);#ende new Post

        $tag->save();
        return redirect('/tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $request->validate(
            [
            'name' => 'required|min:3',
            'style' => ['required','min:3','regex:/^(primary|danger|success|info|warning|secondary)$/i']
            ], 
            [
                'name.required' => 'Bitte <b>Name</b> des Styles eingeben ',
                'name.min' => 'Name muss min. 3 Zeichen haben'
            ]);
        
        $tag->update([
            //'nameDerSpalteInDB' => $request['nameDesFeldesInFormular']
            'name' => $request['name'],
            'style' => $request['style'],
        ]);#ende new Post

        $tag->save();
        return redirect('/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/tag');
    }
}
