<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($blog_id)
    {
        try {
            $comment = Comment::with(['user:id,name','comments','comments.user:id,name'])->whereNull('comments_id')->whereBlogId($blog_id)->get();
        } catch (\Exception $exception) {

            return response()->json([
                'error' => $exception->getMessage()
            ], 401);

        }

        return response()->json([
            'data' => $comment
        ], 200);
    }
}
