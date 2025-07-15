<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
        $data = Berita::all();
        return view('', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'path_file' => 'required|mimes:png,jpg',
            'status' => 'required',
            'tag' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tag.create')->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $berita = Berita::create([
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'path_file' => $imageName,
            'status' => $request->status
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
        $data = Berita::find($id);
        return view('', compact('data'));
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
            'path_file' => 'required|mimes:png,jpg',
            'status' => 'required',
            'tag' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tag.create')->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $target->update([
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'path_file' => $imageName,
            'status' => $request->status
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
