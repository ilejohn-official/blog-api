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

        return response()->json(['message' => 'Post liked successfully', 'like' => $like]);
    }
}
