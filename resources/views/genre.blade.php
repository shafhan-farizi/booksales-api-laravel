<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Genre</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 40px auto; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); overflow: hidden; }
        .header { background-color: #3498db; color: white; padding: 20px; text-align: center; }
        .header h2 { margin: 0; font-size: 1.5rem; }
        .list-group { list-style: none; padding: 0; margin: 0; }
        .list-item { padding: 15px 20px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; }
        .list-item:last-child { border-bottom: none; }
        .list-item:hover { background-color: #f9f9f9; }
        .index { font-weight: bold; color: #7f8c8d; margin-right: 10px; }
        .badge { background: #e1f5fe; color: #0288d1; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; }
        .footer { background: #fdfdfd; padding: 15px; text-align: center; font-size: 0.9rem; color: #95a5a6; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Koleksi Genre</h2>
        </div>
        <ul class="list-group">
            @foreach ($genres as $genre)
                <li class="list-item">
                    <span>
                        <span class="index">#{{ $loop->iteration }}</span>
                        {{ $genre['name'] }}
                    </span>
                    <span class="badge">ID: {{ $genre['id'] }}</span>
                </li>
            @endforeach
        </ul>
        <div class="footer">
            Total: {{ count($genres) }} Genre
        </div>
    </div>
</body>
</html>
