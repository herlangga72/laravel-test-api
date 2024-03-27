<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Polls::all();
        return response()->json($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pool = new Polls();
        $pool->question = $request->question;
        $pool->save();
        return response()->json(["message" => "Poll created successfully", "poll" => $pool], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function show(Polls $poll)
    {
        $poll = Polls::find($Poll);
        if (!$poll) {
            return response()->json(["message" => "Poll not found"], 404);
        }
        return response()->json($poll);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function edit(Polls $polls)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $poll)
    {
        $_poll = Polls::findOrFail($poll);
        // return response()->json(["message" => "Poll updated successfully", "request" => $request], 200);
        $_poll->question = $request->input("question", $_poll->question);
        $_poll->save();
        return response()->json(["message" => "Poll updated successfully", "poll" => $_poll], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $poll = Polls::findOrFail($id);
        $poll->delete();
        return response()->json(["message" => "Poll deleted successfully"], 204);
    }
}
