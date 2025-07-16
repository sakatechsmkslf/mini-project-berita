<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::all();
        return view('tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "nama" => "required"
        ]);

        if($validator->fails())
        {
            return redirect()->route('tag.create')->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        Tag::create($validated);
        return redirect()->route('tag.index');
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
        $data = Tag::findOrFail($id);
        return view('tag.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Tag::findOrFail($id);
        $validator = Validator::make($request->all(),[
            "nama" => "required"
        ]);

        if($validator->fails())
        {
            return redirect()->route('tag.create')->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $target->update($validated);
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Tag::findOrFail($id);
        $target->delete();
        return redirect()->route('tag.index');
    }
}
