<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('tag.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <input name="nama" type="text">
        <button type="submit">create</button>
    </form>
</body>
</html>
