<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Dokumen Santri</title>
</head>
<body>
<h2>Dokumen {{ $santri->name }}</h2>
<div style="display: flex; flex-wrap: wrap; gap: 10px;">
    @foreach ($files as $file)
        <div>
            <img src="{{ asset('storage/' . $file) }}" alt="Dokumen" style="width: 200px; height: auto;">
        </div>
    @endforeach
</div>
</body>
</html>
