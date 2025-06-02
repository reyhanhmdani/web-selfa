<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Biodata Santri - {{ $santri->name }}</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 40px;
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
            }

            .header h2 {
                margin: 0;
            }

            .biodata {
                width: 100%;
                border-collapse: collapse;
            }

            .biodata td {
                padding: 8px 10px;
                vertical-align: top;
            }

            .label {
                width: 180px;
                font-weight: bold;
            }

            .photo {
                width: 150px;
                text-align: center;
            }

            .photo img {
                width: 120px;
                height: 150px;
                object-fit: cover;
                border: 1px solid #ccc;
            }

            .footer {
                margin-top: 60px;
                text-align: right;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>BIODATA SANTRI</h2>
            <p>Pondok Pesantren Sayf El-Falah</p>
            <hr style="margin-top: 10px" />
        </div>

        <table class="biodata">
            <tr>
                <td class="label">Nama Lengkap</td>
                <td>: {{ $santri->name }}</td>
                {{-- <td class="photo" rowspan="6">
                    @if ($santri->photo)
                        <img
                            src="{{ public_path("storage/" . $santri->photo) }}"
                            alt="Foto Santri"
                        />
                    @else
                        <img
                            src="{{ public_path("assets/img/default-photo.png") }}"
                            alt="Foto Santri"
                        />
                    @endif
                </td> --}}
            </tr>
            <tr>
                <td class="label">Tanggal Lahir</td>
                <td>
                    :
                    {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format("d F Y") }}
                </td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td>: {{ ucfirst($santri->kelamin) }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td>: {{ $santri->alamat }}</td>
            </tr>
            <tr>
                <td class="label">Nama Wali</td>
                <td>: {{ $santri->nama_wali }}</td>
            </tr>
            <tr>
                <td class="label">No HP Wali</td>
                <td>: {{ $santri->no_hp_wali ?? "-" }}</td>
            </tr>
        </table>

        <div class="footer">
            Dicetak pada: {{ \Carbon\Carbon::now()->format("d F Y") }}
        </div>
    </body>
</html>
