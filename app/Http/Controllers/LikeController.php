<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    /**
     * Like post.
     */
    public function like(Post $post): JsonResponse
    {
        $user = User::first();
        $like = $post->likes()->firstOrCreate(['user_id' => $user->id]);
        $alreadyLiked = ! $like->wasRecentlyCreated;

        $message = $alreadyLiked ? 'Post already liked' : 'Post liked successfully';

        return response()->json(['message' => $message, 'data' => $like]);
    }
}
