<?php

namespace App\Http\Controllers\ApiPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostDash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postDashes = PostDash::all();
        return response()->json(['postDashes' => $postDashes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postDashes->validate([
            'text' => 'required',
            'title' => 'required',
            'image' => 'required',
            'link'=>'required'
        ]);

        $postDashes = PostDash::create([
            'text' => $request->text,
            'title' => $request->title,
            'image' => $request->image,
            'link' => $request->link,
            
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
