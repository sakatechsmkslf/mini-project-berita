@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-dark">
        <div class="row">
            @foreach ($berita as $item)
                <div class="col">
                    <div class="card m-2" style="width: 15rem;">
                        <img src="{{ asset('images/' . $item->path_file) }}" class="img-thumbnail img-fluid"
                            style="max-height: 240px; max-width: 240px; object-fit:contain " alt="Gambar Berita">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul_berita }}</h5>
                            <p class="card-title">{{ $item->category->nama }}</p>
                            <sub>
                                @foreach ($item->tag as $k)
                                    {{ $k->nama }},
                                @endforeach
                            </sub>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <h3 class="text-white">Hai</h3>
        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis animi rem odit quam velit,
            commodi architecto earum quos eos quo! Suscipit iure, mollitia quo quae deserunt reprehenderit. Sunt, at odio!
        </p> --}}
    </div>
@endsection
