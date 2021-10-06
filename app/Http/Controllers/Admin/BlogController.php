<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Traits\HasFile;
use App\Enums\BlogStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogRepository;
use App\Http\Requests\StoreBlogRequest;

class BlogController extends Controller
{
    use HasFile;

    protected $model;

    public function __construct(Blog $blog)
    {
        $this->model = new BlogRepository($blog);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create', [
            'blogStatus' => BlogStatus::asSelectArray(),
            'categories' => \App\Models\Category::Active()->pluck('title', 'id'),
            'tags' => \App\Models\Tag::Active()->pluck('title', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        try {
            \DB::transaction((function () use ($request) {
                $form = $request->validated();

                unset($form['tags_id']);
                unset($form['categories_id']);
                unset($form['banner_url']);

                $upload = $this->upload('banner_url', 'blog', $request);
                if ($upload->hasFile()) {
                    $form['banner_url'] = $upload->getBaseUrl() . '/storage/' . $upload->filePaths()->first();
                }

                $blog = $this->model->create($form);

                $blog->categories()->attach($request->categories_id);
                $blog->tags()->attach($request->tags_id);
            }));

            \Toastr::success('Blog has been saved successfully.', '', ["progressBar" => true, "closeButton" => true,]);
            return redirect()->back();

        } catch (\Exception $exception) {
            \Toastr::error('Something went to wrong.', '', ["progressBar" => true, "closeButton" => true,]);
            return back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.blog.edit', [
            'blog' => Blog::find($id),
            'blogStatus' => BlogStatus::asSelectArray(),
            'tags' => \App\Models\Tag::Active()->pluck('title', 'id'),
            'categories' => \App\Models\Category::Active()->pluck('title', 'id'),
            'selectedTag' => BlogTag::whereBlogId($id)->pluck('tag_id')->toArray(),
            'selectedCategory' => BlogCategory::whereBlogId($id)->pluck('category_id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        try {
            \DB::transaction((function () use ($request,$id) {
                $form = $request->validated();

                unset($form['tags_id']);
                unset($form['categories_id']);
                unset($form['banner_url']);

                $upload = $this->upload('banner_url', 'blog', $request);
                if ($upload->hasFile()) {
                    $form['banner_url'] = $upload->getBaseUrl() . '/storage/' . $upload->filePaths()->first();
                }

                $blog = $this->model->find($id);
                $blog->update($form);

                $blog->categories()->sync($request->categories_id);
                $blog->tags()->sync($request->tags_id);
            }));

            \Toastr::success('Blog has been updated successfully.', '', ["progressBar" => true, "closeButton" => true,]);
            return redirect()->back();

        } catch (\Exception $exception) {
            \Toastr::error('Something went to wrong.', '', ["progressBar" => true, "closeButton" => true,]);
            return back()->withErrors($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
