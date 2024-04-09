<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'author' => 'required|string|min:3|max:255',
            'publication_year' => 'required|integer|max:9999',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->author = $request->author;
        $post->publication_year = $request->publication_year;
        $post->save();

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'author' => 'required|string|min:3|max:255',
            'publication_year' => 'required|integer|max:9999',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->publication_year = $request->publication_year;
        $post->save();

        return response()->json($post, 201);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }
}
