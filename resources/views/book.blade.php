<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookSales - Katalog Buku</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; margin: 0; padding: 40px 20px; }
        .header { text-align: center; margin-bottom: 40px; }
        .header h1 { color: #1a73e8; margin-bottom: 5px; }
        .header p { color: #5f6368; }
        .book-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
            gap: 25px; 
            max-width: 1200px; 
            margin: 0 auto; 
        }
        .book-card { 
            background: white; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.08); 
            padding: 20px; 
            display: flex; 
            flex-direction: column;
            transition: transform 0.2s;
        }
        .book-card:hover { transform: translateY(-5px); }

        .book-title { font-size: 1.25rem; font-weight: bold; color: #202124; margin-bottom: 10px; }
        .book-desc { color: #5f6368; font-size: 0.9rem; line-height: 1.5; flex-grow: 1; margin-bottom: 15px; }
        
        .book-footer { 
            border-top: 1px solid #eee; 
            padding-top: 15px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .price { color: #e67e22; font-weight: bold; font-size: 1.1rem; }
        .stock { font-size: 0.8rem; padding: 4px 8px; background: #e8f0fe; color: #1967d2; border-radius: 4px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Hello World!</h1>
        <p>Selamat datang di toko <strong>BookSales</strong>!</p>
    </div>

    <div class="book-grid">
        @foreach ($books as $book)
            <div class="book-card">
                <div class="book-title">{{ $book['title'] }}</div>
                <div class="book-desc">{{ $book['description'] }}</div>
                
                <div class="book-footer">
                    <span class="price">Rp {{ number_format($book['price'], 0, ',', '.') }}</span>
                    <span class="stock">Stok: {{ $book['stock'] }}</span>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
