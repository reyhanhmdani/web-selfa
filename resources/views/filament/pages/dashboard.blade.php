<x-filament::page>
    <div class="space-y-6">
        <div class="text-2xl font-bold text-gray-800">
            Selamat datang, {{ auth()->user()->name }} 👋
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Santri -->
            <div class="p-6 bg-white rounded-xl shadow-md">
                <div class="text-sm text-gray-500">Jumlah Santri</div>
                <div class="text-3xl font-bold text-green-600">
                    {{ $this->getSantriCount() }}
                </div>
            </div>

            <!-- Galeri Foto -->
            <div class="p-6 bg-white rounded-xl shadow-md">
                <div class="text-sm text-gray-500">Foto di Galeri</div>
                <div class="text-3xl font-bold text-blue-600">
                    {{ $this->getFotoCount() }}
                </div>
            </div>

            <!-- Ucapan / Info -->
            <div class="p-6 bg-white rounded-xl shadow-md">
                <div class="text-sm text-gray-500">Informasi</div>
                <div class="text-lg font-medium text-gray-700">
                    Anda sedang mengakses dashboard admin Ponpes Selfa.
                </div>
            </div>
        </div>
    </div>
</x-filament::page>
