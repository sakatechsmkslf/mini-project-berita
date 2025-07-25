<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all();
        $tag = Tag::all();
        return view('berita.tambah', compact('kategori','tag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'path_file' => 'required',
            'status' => 'required',
            // 'tag' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('berita.create')->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->path_file->extension();

        $request->path_file->move(public_path('images'), $imageName);

        $berita = Berita::create([
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'path_file' => $imageName,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);

        $berita->tag()->attach($request->tag_id);

        return redirect()->route('berita.index');
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
        $berita = Berita::find($id);
        $kategori = Category::all();
        $tag = Tag::all();
        return view('berita.edit', compact('berita', 'kategori','tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Berita::find($id);
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'path_file' => 'required',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {                  
            return redirect()->route('berita.edit')->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->path_file->extension();

        $request->path_file->move(public_path('images'), $imageName);

        $target->update([
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'path_file' => $imageName,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);

        $target->tag()->sync($request->tag_id);

        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Berita::find($id);
        $target->delete();
        return redirect()->route('berita.index');
    }
}
