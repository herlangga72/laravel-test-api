<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return View('blog.admin.listForm', ['blogs' => Blog::paginate(config('pagination.pageSize')), 'message' => $request->message ?? null]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('blog.admin.createForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'desc' => 'required',
            'author' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);
        $blog = new Blog($request->except(['cover']));
        $blog->setCoverAttribute($request->file('cover'));
        $blog->save();
        return Redirect::route('blogsAdmin.list', ['message' => ['type'=>'success' ,'title'=>'Action Completed', 'content'=>'Blog created successfully']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $blog = Blog::find($id);
        return View('blog.admin.showItems', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $blog = Blog::find($id);
        return View('blog.admin.editForm', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $blog = Blog::find($id);
        $blog->update($request->except(['cover']));
        if ($request->hasFile('cover')) {
            $blog->setCoverAttribute($request->file('cover'));
        }
        return Redirect::route('blogsAdmin.list', ['message' => ['type'=>'success' ,'title'=>'Action Completed', 'content'=>'Blog updated successfully']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $blog = Blog::destroy($id);
        return Redirect::route('blogsAdmin.list', ['message' => ['type'=>'danger' ,'title'=>'Action Completed', 'content'=>'Blog deleted successfully']]);
    }
}
