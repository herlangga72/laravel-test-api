<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\Blog as ResourcesBlog;

class BlogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourceBlog::Blog->toArray(Blog::paginate(3));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return Response()->json($obj);
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
        return response()->json(['message' => 'Blog updated successfully'], 200);
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
        return response()->json(['message' => 'Blog deleted successfully'], 200);
    }
}
