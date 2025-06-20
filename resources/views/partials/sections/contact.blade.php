<section id="contact" class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12 text-center">
            @if (isset($sections['Contact']))
            <h1 class="title-section mb-4 text-3xl font-bold text-gray-800" ...>
                {{ $sections['Contact']->title }}
            </h1>
            <p class="mb-5 text-xl text-gray-600" ...>
                {{ $sections['Contact']->subtitle }}
            </p>
            <div class="mx-auto h-1 w-20 garis-judul"></div>
            @endif
        </div>

        <div class="flex flex-col gap-6 md:flex-row md:items-stretch">
            <!-- Kolom Kiri: Hubungi Kami -->
            <div class="md:w-1/2">
                <div class="contact-info h-full rounded-xl bg-white p-6 shadow-md">
                    <h3 class="mb-4 font-semibold">{{ $section->subtitle }}</h3>

                    <!-- Alamat -->
                    <div class="mb-4 flex items-start">
                        <div class="mr-4 mt-1">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Alamat</h4>
                            <p class="text-gray-600">{!! nl2br(e($kontak['alamat']->value)) !!}</p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="mb-4 flex items-start">
                        <div class="mr-4 mt-1">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Telepon</h4>
                            <p class="text-gray-600">{!! nl2br(e($kontak['telepon']->value)) !!}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4 flex items-start">
                        <div class="mr-4 mt-1">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Email</h4>
                            <p class="text-gray-600">{{ $kontak['email']->value}}</p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="flex items-start">
                        <div class="mr-4 mt-1">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-medium">Jam Operasional</h4>
                            <p class="text-gray-600">{!! nl2br(e($kontak['jam']->value)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Google Maps -->
            <div class="md:w-1/2">
                <div class="h-full rounded-xl bg-white p-6 shadow-md">
                    <h3 class="mb-4 font-semibold">Lokasi Kami</h3>
                    <div class="relative h-0 w-full overflow-hidden rounded-lg pb-[56%]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1222.7013959293104!2d110.60411067090085!3d-7.692333357861694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a43f01ae7ca55%3A0x3052ee63172a145f!2sMasjid%20Al-Muhajirin!5e0!3m2!1sid!2sid!4v1743005025922!5m2!1sid!2sid"
                            class="absolute left-0 top-0 h-full w-full border-0" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
