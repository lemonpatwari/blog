<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogShowController extends Controller
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
    public function __invoke($slug)
    {
        try {
            $blog = Blog::with(['categories', 'tags', 'user'])->active()->whereSlug($slug)->first();
        } catch (\Exception $exception) {

            return response()->json([
                'error' => $exception->getMessage()
            ], 401);

        }

        return response()->json([
            'blog' => $blog
        ], 200);
    }
}
