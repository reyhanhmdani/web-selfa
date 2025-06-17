<!DOCTYPE html>
<html lang="id">
<head>
    <title>{{ $title ?? 'Dokumen Santri' }}</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 250px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .caption {
            padding: 10px;
            font-size: 14px;
            text-align: center;
            background-color: #f0f0f0;
        }

        @media print {
            body {
                margin: 10mm;
                background: #fff;
            }

            .card:hover {
                transform: none;
            }

            .card {
                box-shadow: none;
                border: 1px solid #999;
            }
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
