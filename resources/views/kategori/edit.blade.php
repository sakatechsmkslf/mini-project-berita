@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-secondary text-white">
        <h3>Edit Data Kategori</h3>
        <form action="{{route('category.update',$data->id)}}" method="POST" class="form-input">
            @csrf
            @method('put')
            <div>
                <label for="">Masukan Nama</label>
                <input type="text" placeholder="Nama Kategori" name="nama" value="{{$data ->nama}}">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection
