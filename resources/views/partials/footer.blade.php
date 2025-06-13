<!-- Footer -->
<footer class="bg-gray-800 pb-6 pt-12 text-white">
    <div class="container mx-auto px-4">
        <div class="mb-8 grid grid-cols-1 gap-8 md:grid-cols-4">
            <div>
                <h3 class="mb-4 text-xl font-bold">{{ $footer->title }}</h3>
                <p class="mb-4 text-gray-400">
                    {{ $footer->description }}
                </p>
                <div class="flex space-x-4">
                    @foreach ($footer->social_links as $link)
                        @php
                            $iconClass = '';
                            switch ($link['platform']) {
                                case 'facebook':
                                    $iconClass = 'fab fa-facebook-f';
                                    break;
                                case 'instagram':
                                    $iconClass = 'fab fa-instagram';
                                    break;
                                case 'twitter':
                                    $iconClass = 'fab fa-twitter';
                                    break;
                                case 'youtube':
                                    $iconClass = 'fab fa-youtube';
                                    break;
                                case 'linkedin':
                                    $iconClass = 'fab fa-linkedin-in';
                                    break;
                                case 'github':
                                    $iconClass = 'fab fa-github';
                                    break;
                                case 'tiktok':
                                    $iconClass = 'fab fa-tiktok';
                                    break;
                                // Tambahkan kasus lain jika ada platform baru
                                default:
                                    $iconClass = 'fas fa-link'; // Icon default
                                    break;
                            }
                        @endphp
                        <a href="{{ $link['url'] }}" target="_blank" class="text-gray-400 transition hover:text-white">
                            <i class="{{ $iconClass }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="mb-4 text-lg font-semibold">Info Pondok</h3>
                <ul class="space-y-2">
                    @foreach ($footer->pondok_info_links as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-gray-400 transition hover:text-white">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-lg font-semibold">Informasi</h3>
                <ul class="space-y-2">
                    @foreach ($footer->information_links as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-gray-400 transition hover:text-white">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="mb-4 text-lg font-semibold">Kontak Kami</h3>
                <ul class="space-y-2">
                    @if ($footer->address)
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mr-2 mt-1 text-gray-400"></i>
                            <span class="text-gray-400">{{ $footer->address }}</span>
                        </li>
                    @endif
                    @if ($footer->phone)
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-gray-400"></i>
                            <span class="text-gray-400">
                                <a href="https://wa.me/{{ $footer->phone }}">Ustad Furqan (Mudir)</a>
                            </span>
                        </li>
                    @endif
                    @if ($footer->email)
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-gray-400"></i>
                            <span class="text-gray-400">{{ $footer->email }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 pt-6 text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Ponpes Selfa, By Raihan Hamdani</p>
        </div>
    </div>
</footer>
