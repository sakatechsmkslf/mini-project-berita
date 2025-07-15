@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-secondary text-white">
        <h3>CRUD tag</h3>
        <div class="">
            <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table table-dark table-striped-columns mt-3">
                <thead>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Aksi</td>
                </thead>
                <tr>
                    {{-- @foreach ($data as $item)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="d-flex">
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary">edit</a>
                            <form action="{{route('category.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">hapus</button>
                            </form>
                        </td>
                    @endforeach --}}
                </tr>
            </table>
        </div>
    </div>
@endsection
