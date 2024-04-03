<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('blog.admin.listForm', ['blogs' => Blog::all()]);
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
            'cover' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);
        Blog::create($request->all());
        return View('blog.admin.listForm', ['blogs' => Blog::all(), 'message' => ['type'=>'success' ,'title'=>'Action Completed', 'content'=>'Blog created successfully']]);
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
        $blog = Blog::find($id)->update($request->all());
        return View('blog.admin.listForm', ['blogs' => Blog::all(), 'message' => ['type'=>'success' ,'title'=>'Action Completed', 'content'=>'Blog updated successfully']]);
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
        return View('blog.admin.listForm', ['blogs' => Blog::all(), 'message' => ['type'=>'danger' ,'title'=>'Action Completed', 'content'=>'Blog deleted successfully']]);
    }
}
