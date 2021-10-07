<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogIndexController extends Controller
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = new BlogRepository($blog);
    }

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $blogs = BlogResource::collection($this->blog->with(['categories', 'tags','user'])->active()->paginate(10));
        } catch (\Exception $exception) {

            return response()->json([
                'error' => $exception->getMessage()
            ], 401);

        }

        return response()->json([
            'Found' => count($blogs),
            'blogs' => $blogs
        ], 200);
    }
}
