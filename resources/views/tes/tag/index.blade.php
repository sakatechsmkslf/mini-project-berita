<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route(name: 'tag.create') }}">Create Data</a>
    <table>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <form action="{{ route('tag.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div>
                            <a href="{{ route('tag.edit', $item->id) }}">Edit</a>

                            <button type="submit">Hapus</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
