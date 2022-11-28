<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function firstPost()
    {
        $post = Post:: all()->toArray();

        return response()->json(
            [
                'code' => 200,
                'status' => 'true',
                'data' => $post
            ]
        );
    }

    public function store(Request $request)
    {
        dd($request->all());
        $Post = new Post();

        $Post->name = $request->name;
        $Post->description = $request->description;
        $Post->state= $request->state;
        $Post->category_id=$request->category_id;

        $Post->save();

        Post::create($request->all());

    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->description = 'Pizzas y pastas';

        $post->save();
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }


}
