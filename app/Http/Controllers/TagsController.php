<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\TagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tags::paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        //
        
        $data = $request->all();
        //slug
        $data['slug'] = Str::slug($request->name);
        //create
        Tags::create($data);

        return redirect()->route('tags.index')->with('status', 'data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $tags = Tags::findOrFail($id);
        return view('admin.tags.edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
        //
        
        $data = $request->all();
        //slug
        $data['slug'] = Str::slug($request->name);
        //temukan id
        $tags = Tags::findOrFail($id);
        //lalu update
        $tags->update($data);

        
        return redirect()->route('tags.index')->with('status', 'data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tags = Tags::findOrFail($id);
        $tags->delete();

        return redirect()->route('tags.index')->with('status', 'data berhasil di hapus');
    }
}
