@extends('layout.main')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('konten')
    <div class="card p-3  text-black">
        <h3>Edit Data Berita</h3>
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="">
                
                <div class="mb-3">
                    <label>judul berita</label>
                    <input type="text" placeholder="Judul Berita" name="judul_berita" class="form-control" value="{{ $berita->judul_berita }}">
                </div>

                <div class="mb-3">
                    <label>isi berita</label>
                    <textarea class="form-control" name="isi_berita" id="summernote">{{ $berita->isi_berita }}</textarea>
                </div>
                <div class="mb-3">
                    <label>gambar</label>
                    <img src="{{ asset('images/'. $berita->path_file ) }}" alt="" srcset="" width="90px">
                    <input type="file" name="path_file" class=" form-control">
                </div>

                <div class="mb-3">
                    <label>status</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" value="not published"
                        {{ old('status', $berita->status) == 'not published' ? 'checked': ''}}>
                        <label>not published</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" value="pending"
                        {{ old('status', $berita->status) == 'pending' ? 'checked': ''}}>
                        <label>pending</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" value="published"
                        {{ old('status', $berita->status) == 'published' ? 'checked': ''}}>
                        <label>published</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Kategori</label><br>
                    <select name="category_id" id="">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id }}" 
                                {{ old('category_id', $berita->category_id) == $item->id ? 'selected': ''}}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tag</label><br>
                    @foreach ($tag as $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $item->id }}"
                            {{ in_array($item->id, old('tag_id', $berita->tag->pluck('id')->toArray())) ? 'checked': '' }}>
                            <label class="form-check-label">{{ $item->nama }}</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary" class="form-control mb-3">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 250
            });
        });
    </script>
@endpush
