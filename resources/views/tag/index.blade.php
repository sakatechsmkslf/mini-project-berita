@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-secondary text-white">
        <h3>CRUD tag</h3>
        <div class="">
            <a href="{{ route('tag.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table table-dark table-striped-columns mt-3">
                <thead>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Aksi</td>
                </thead>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="d-flex">
                            <a href="{{ route('tag.edit', $item->id) }}" class="btn btn-primary">edit</a>
                            <form action="{{ route('tag.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
