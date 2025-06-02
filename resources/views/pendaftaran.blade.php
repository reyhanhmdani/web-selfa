<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pendaftaran Ponpes Selfa</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="bg-gray-100 font-sans">
        <div class="max-w-xl mx-auto my-12 p-8 bg-white rounded-xl shadow-md">
            <h1 class="text-3xl font-bold text-center text-green-600 mb-6">
                Pendaftaran Ponpes Selfa
            </h1>

            @if (session("success"))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => (show = false), 10000)"
                    x-show="show"
                    x-transition
                    class="mb-6 px-4 py-3 rounded-md bg-green-100 text-green-800 border border-green-300 shadow"
                >
                    {{ session("success") }}
                </div>
            @endif

            <form
                action="{{ route("pendaftaran.submit") }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-4"
            >
                @csrf

                <div>
                    <label class="block mb-1 font-semibold">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        required
                        class="w-full px-4 py-2 border rounded-md"
                    />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">
                        Tanggal Lahir
                    </label>
                    <input
                        type="date"
                        name="tanggal_lahir"
                        required
                        class="w-full px-4 py-2 border rounded-md"
                    />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">
                        Jenis Kelamin
                    </label>
                    <select
                        name="jenis_kelamin"
                        required
                        class="w-full px-4 py-2 border rounded-md"
                    >
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Alamat</label>
                    <textarea
                        name="alamat"
                        required
                        class="w-full px-4 py-2 border rounded-md"
                    ></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Nama Wali</label>
                    <input
                        type="text"
                        name="nama_wali"
                        class="w-full px-4 py-2 border rounded-md"
                    />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">
                        No HP Orang Tua
                    </label>
                    <input
                        type="text"
                        name="no_hp_wali"
                        class="w-full px-4 py-2 border rounded-md"
                    />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">
                        Hafalan (Juz)
                    </label>
                    <input
                        type="number"
                        name="hafalan"
                        min="0"
                        max="30"
                        value="0"
                        class="w-full px-4 py-2 border rounded-md"
                    />
                </div>

                <div>
                    <label class="block mb-1 font-semibold">
                        Foto / Dokumen
                    </label>
                    <input
                        type="file"
                        name="images[]"
                        accept="image/*,application/pdf"
                        multiple
                        class="w-full px-4 py-2 border rounded-md"
                    />
                    <p class="text-sm text-gray-500 mt-1">
                        Maksimal 10 file. Format yang didukung: jpg, png, jpeg,
                        pdf.
                    </p>
                </div>

                <div class="text-center">
                    <button
                        type="submit"
                        class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-blue-600"
                    >
                        Daftar
                    </button>
                </div>
            </form>
        </div>

        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>
    </body>
</html>
