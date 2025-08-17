<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Store a newly created comment.
     */
    public function comment(StoreCommentRequest $request, Post $post): JsonResponse
    {
        $user = User::first();

        $comment = $post->comments()->create([
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

        return response()->json(['message' => 'Comment added successfully', 'data' => $comment], JsonResponse::HTTP_CREATED);
    }
}
