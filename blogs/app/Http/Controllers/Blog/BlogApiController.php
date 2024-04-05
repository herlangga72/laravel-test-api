<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Blog::paginate(config('pagination.pageSize')), 200);
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
        return response()->json(['message' => 'Blog created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $obj = Blog::find($blog);
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
        $blog->update($request->except(['cover']));
        if ($request->hasFile('cover')) {
            Storage::delete($blog->cover);
            $blog->setCoverAttribute($request->file('cover'));
        }
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
