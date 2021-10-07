<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentStoreController extends Controller
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = new CommentRepository($comment);
    }

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreCommentRequest $request)
    {

        $form = $request->validated();
        $comment = $this->comment->create($form);

        return response()->json([
            'blogs' => $comment,
            'message' => 'Comment created Successfully'
        ], 200);
    }
}
