@extends('layout.main')
@section('konten')
    <div class="card p-3 bg-secondary text-white">
        <h3>Tambah Data Tag</h3>
        <form action="{{route('tag.store')}}" method="POST" class="">
            <div>
                @csrf
                <label for="">Masukan tag</label>
                <input type="t" placeholder="Masukan tag" name="nama">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
@endsection
