@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-blend-saturation text-black">
        <h3>BERITA</h3>
        <div class="">
            <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table table-dark table-striped-columns mt-3" id="table_berita">
                <thead>
                    <td class="text-center">NO</td>
                    <td class="text-center">Judul Berita</td>
                    <td class="text-center">Gambar</td>
                    <td class="text-center">Status</td>
                    <td class="text-center">Kategori</td>
                    <td class="text-center">Aksi</td>
                </thead>
                <tr>
                    @foreach ($data as $item)
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $item->judul_berita }}</td>
                        <td class="text-center">{{ $item->path_file }}</td>
                        <td class="text-center">{{ $item->status }}</td>
                        <td class="text-center">{{ $item->category->nama}}</td>
                        <td class="d-flex text-center">
                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-primary">edit</a>
                            <form action="{{route('berita.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">hapus</button>
                            </form>
                        </td>
                    @endforeach 
                </tr>
            </table>
        </div>
    </div>
    @push('script')
        <script>new DataTable('#table_berita')</script>
    @endpush
@endsection

