@extends('layout.main')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">
@endpush

@section('konten')
    <div class="card p-3  text-black">
        <h3>Tambah Data Berita</h3>
        <form action="{{ route('berita.store') }}" method="POST">
            <div class="">
                @csrf
                <div class="mb-3">
                    <label>judul berita</label>
                    <input type="text" placeholder="Judul Berita" name="judul_berita" class="form-control">
                </div>

                <div class="mb-3">
                    <label>isi berita</label>
                    <textarea class="form-control" name="content" id="summernote"></textarea>
                </div>
                <div class="mb-3">
                    <label>gambar</label>
                    <input type="file" name="path_file" class=" form-control">
                </div>

                <div class="mb-3">
                    <label>status</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" value="pending">
                        <label>pending</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" value="published">
                        <label>published</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Kategori</label><br>
                    {{-- @foreach ($data as $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tag_id[]" value="{{ $item->id }}"
                                {{ collect(old('tag_id'))->contains($item->id) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $item->nama_tag }}</label>
                        </div>
                    @endforeach --}}
                </div>

                <div class="mb-3">
                    <label>Tag</label><br>
                    {{-- @foreach ($data as $item)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tag_id[]" value="{{ $item->id }}"
                                {{ collect(old('tag_id'))->contains($item->id) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $item->nama_tag }}</label>
                        </div>
                    @endforeach --}}
                </div>

                <button type="submit" class="btn btn-primary" class="form-control mb-3">Tambah</button>
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
