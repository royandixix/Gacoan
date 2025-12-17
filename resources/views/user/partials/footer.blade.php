 {{-- FOOTER --}}
    <footer class="bg-white border-t mt-10">
        <div class="container mx-auto px-4 sm:px-6 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                <!-- About -->
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <i data-lucide="flame" class="w-5 h-5 text-gacoan-600"></i>
                        <h3 class="font-bold text-lg">GACOAN</h3>
                    </div>
                    <p class="text-sm text-gray-600">
                        Platform pemesanan makanan pedas terbaik di Indonesia. Pedasnya bikin nagih!
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-bold mb-3">Menu Cepat</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-gacoan-600 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-gacoan-600 transition">Menu</a></li>
                        <li><a href="#" class="hover:text-gacoan-600 transition">Promo</a></li>
                        <li><a href="#" class="hover:text-gacoan-600 transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-bold mb-3">Hubungi Kami</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            info@gacoan.com
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            +62 812-3456-7890
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                            Jakarta, Indonesia
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t pt-6 text-center">
                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} Gacoan. Semua Hak Dilindungi.
                </p>
            </div>
        </div>
    </footer>