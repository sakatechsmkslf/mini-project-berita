@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-secondary text-white">
        <h3>Tambah Data Kategori</h3>
        <form action="{{route('category.store')}}" method="POST" class="">
            <div>
                @csrf
                <label for="">Masukan Nama</label>
                <input type="t" placeholder="Nama Kategori" name="nama">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection
