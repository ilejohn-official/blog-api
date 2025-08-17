<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Blog $blog): JsonResponse
    {
        return response()->json($blog->posts()->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Blog $blog): JsonResponse
    {
        $post = $blog->posts()->create($request->validated());

        return response()->json($post, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog, Post $post): JsonResponse
    {
        return response()->json($post->load(['likes', 'comments']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Blog $blog, Post $post): JsonResponse
    {
        $post->update($request->validated());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog, Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
