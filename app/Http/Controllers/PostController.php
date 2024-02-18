<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Session; #最新添加

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #$pt = Post::all()->sortByDesc('updated_at');
        $count = Post::all()->count();
        #return view('post.index')->with(['beitraege' => $pt, 'zahl' => $count]);
        
        #$count = Post::all()->where('parent_id','0')->count();
        $id = auth()->id();
        if($id) {
            $pt = Post::all()
        ->where('parent_id','0')
        #->whereNotIn('user_id', $id)#不显示自己的评论，只显示别人的
        ->sortByDesc('updated_at');
            #$count = Post::all()->whereNotIn('user_id', $id)->count();  #只显示别人评论的总数
                         
        } else {
            $pt = Post::all()->where('parent_id','0')->sortByDesc('updated_at');
        }

        return view('post.index')->with(['beitraege' => $pt, 'zahl' => $count]);
    }#ende index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'titel1' => 'required|min:3',
            'kommentar1' => 'required|min:5',
        ]);

        if(!isset($request['reply'])) {
            $request['reply'] = 0;
        }
        
        $post = new Post([
            //'nameDerSpalteInDB' => $request['nameDesFeldesInFormular']
            'titel' => $request['titel1'],
            'comment' => $request['kommentar1'],
            'user_id' => auth()->id(),
            'parent_id' => $request['reply'],
        ]);#ende new Post

        Session::flash('msg_success', 'Kommentar <b>'.$post->titel.'</b> wurde eingefügt');
        

        $post->save();
        return redirect('/post');
    }#ende store

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $alleTags = Tag::all();
        $usedTags = $post->tags;
        $availableTags = $alleTags->diff($usedTags);

        $reply = Post::all()->where('parent_id','=', $post->id);

        return view('post.show', ['post' => $post, 'replies' => $reply, 'availableTags' =>  $availableTags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $request->validate([
            'titel1' => 'required|min:3',
            'kommentar1' => 'required|min:5',
        ]);

        $post->update([
            'titel' => $request->titel1,
            'comment' => $request->kommentar1,
        ]);

        return redirect('/post');
    }#ende update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/post');
    }

    public function showDelete($id) {
        /* return 'show before delete'; */
        $id = Post::find($id);
        return view('post.delete')->with('post', $id);
    }
}
