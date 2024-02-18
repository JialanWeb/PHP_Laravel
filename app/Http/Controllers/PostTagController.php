<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostTagController extends Controller
{
    public function filteredPosts($tag_id) {
        #echo 'ich filtere Daten nach tag ' . $tag_id;
        $count = Post::all()->count();
        $id = auth()->id();
        if($id) {
            $pt = Post::all()
                        ->where('parent_id','0')
                        #->whereNotIn('user_id', $id)
                        ->sortByDesc('updated_at');
       } else {
            $pt = Post::all()->where('parent_id','0')->sortByDesc('updated_at');
       }

       $tag = new Tag();
       $filter = $tag::findOrFail($tag_id);
       $pt = $filter->filteredKommentare;
       return view('post.index')->with(['beitraege' => $pt,'tag' => $filter ,'zahl' => $count]);
    }

    public function attachTag($post_id, $tag_id) {
        #echo $post_id. ' ' .$tag_id;
        #         19           4
        $post = Post::findOrFail($post_id);
        $post->tags()->attach($tag_id);

        return back();
    }

    public function detachTag($post_id, $tag_id) {
        #echo $post_id. ' ' .$tag_id;
        $post = Post::findOrFail($post_id);
        $post->tags()->detach($tag_id);

        return back();
    }
}
