<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penulis</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; padding: 40px 20px; }
        .card { max-width: 800px; margin: auto; background: white; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); padding: 20px; }
        h2 { color: #2c3e50; border-left: 5px solid #2c3e50; padding-left: 15px; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #f8f9fa; color: #7f8c8d; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 1px; text-align: left; padding: 15px; }
        td { padding: 15px; border-bottom: 1px solid #eee; color: #34495e; }
        tr:hover { background-color: #fcfcfc; }
        .no-col { width: 50px; font-weight: bold; color: #bdc3c7; }
        .name-col { font-weight: 600; color: #2980b9; }
        .city-tag { background: #f0f0f0; padding: 3px 8px; border-radius: 4px; font-size: 0.85rem; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Daftar Penulis</h2>
        <table>
            <thead>
                <tr>
                    <th class="no-col">No</th>
                    <th>Nama Lengkap</th>
                    <th>Asal Kota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td class="no-col">{{ $loop->iteration }}</td>
                    <td class="name-col">{{ $author['name'] }}</td>
                    <td>
                        <span class="city-tag">{{ $author['city'] }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
