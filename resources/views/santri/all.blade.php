<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Data Seluruh Santri</title>
        <style>
            body {
                font-family: sans-serif;
                font-size: 12px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th,
            td {
                border: 1px solid #000;
                padding: 6px;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align: center">Data Seluruh Santri</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Kelamin</th>
                    <th>Nama Wali</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santris as $i => $santri)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $santri->name }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format("d M Y") }}
                        </td>
                        <td>{{ $santri->alamat }}</td>
                        <td>{{ $santri->kelamin }}</td>
                        <td>{{ $santri->nama_wali }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
