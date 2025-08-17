<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCommentRequest;

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

        return response()->json(['message' => 'Comment added successfully', 'comment' => $comment], JsonResponse::HTTP_CREATED);
    }
}
