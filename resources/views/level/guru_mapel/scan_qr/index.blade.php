<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            Scan QR untuk Absensi
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-2xl p-6 text-center space-y-6">

                {{-- Notifikasi --}}
                @if (session('success'))
                    <div class="p-3 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100 rounded-lg text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="p-3 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-100 rounded-lg text-sm font-medium">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2">
                        Arahkan kamera ke QR Code
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        Pastikan pencahayaan cukup dan QR terlihat jelas.
                    </p>
                </div>

                {{-- Area Kamera (Responsive Wrapper) --}}
                <div id="camera-container" class="relative w-full max-w-sm mx-auto overflow-hidden rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 shadow-inner flex items-center justify-center min-h-[250px]">
                    <div id="reader" class="w-full"></div>
                </div>

                {{-- Area Loading GPS (Tengah Sempurna) --}}
                <div id="loadingGps" class="hidden flex-col items-center justify-center w-full max-w-sm mx-auto min-h-[250px] bg-gray-50 dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700">
                    <svg class="w-12 h-12 text-blue-500 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="mt-4 text-sm font-semibold text-gray-700 dark:text-gray-300 animate-pulse">
                        Memproses lokasi GPS Anda...
                    </p>
                </div>

                <div id="result" class="text-center text-sm text-gray-700 dark:text-gray-300 font-medium"></div>

                <div class="text-xs text-gray-400 dark:text-gray-500">
                    Kamera tidak muncul? Izinkan akses kamera di browser Anda.
                </div>

                {{-- Form Hidden --}}
                <form id="formAbsen" action="{{ route('guru-mapel.absen') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="qr_token" id="qr_token">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </form>

            </div>
        </div>
    </div>

    {{-- Script Tambahan CSS untuk memaksa UI Scanner bawaan agar rapi --}}
    <style>
        /* Menghilangkan styling default HTML5-QRCode yang jelek */
        #reader__dashboard_section_csr span,
        #reader__dashboard_section_swaplink {
            color: #3b82f6 !important; /* Warna biru tailwind */
            text-decoration: none !important;
            font-size: 14px !important;
        }
        #reader__dashboard_section_csr button {
            background-color: #3b82f6 !important;
            color: white !important;
            border: none !important;
            padding: 8px 16px !important;
            border-radius: 8px !important;
            margin-top: 10px !important;
        }
        /* Memaksa video menyesuaikan wadah */
        #reader video {
            object-fit: cover !important;
            border-radius: 1rem !important;
        }
    </style>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const html5QrCode = new Html5Qrcode("reader");
            const resultBox = document.getElementById('result');
            const loadingGps = document.getElementById('loadingGps');
            const cameraContainer = document.getElementById('camera-container');
            const formAbsen = document.getElementById('formAbsen');

            function fetchLocationAndSubmit(token) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            document.getElementById('qr_token').value = token;
                            document.getElementById('latitude').value = position.coords.latitude;
                            document.getElementById('longitude').value = position.coords.longitude;
                            
                            resultBox.innerText = "Lokasi terkonfirmasi! Menyimpan absen...";
                            resultBox.classList.add('text-green-600', 'dark:text-green-400');
                            formAbsen.submit();
                        },
                        function(error) {
                            resultBox.innerText = "Gagal mendapatkan lokasi. Pastikan GPS HP Anda menyala.";
                            resultBox.classList.add('text-red-600', 'dark:text-red-400');
                            loadingGps.classList.add('hidden');
                            cameraContainer.classList.remove('hidden'); // Munculkan kamera lagi jika gagal
                        },
                        { enableHighAccuracy: true, timeout: 10000, maximumAge: 0 }
                    );
                } else {
                    resultBox.innerText = "Browser tidak mendukung pelacakan lokasi.";
                }
            }

            function onScanSuccess(decodedText) {
                html5QrCode.stop().then(() => {
                    cameraContainer.classList.add('hidden');
                    loadingGps.classList.remove('hidden');
                    loadingGps.classList.add('flex'); // Pastikan menggunakan flex saat muncul
                    resultBox.innerText = "QR terbaca! Memeriksa radius lokasi...";
                    
                    let token = decodedText;
                    if(decodedText.includes('?token=')) {
                        token = new URL(decodedText).searchParams.get('token');
                    }
                    
                    fetchLocationAndSubmit(token);
                }).catch((err) => {
                    console.log("Gagal mematikan kamera", err);
                });
            }

            Html5Qrcode.getCameras().then(devices => {
                if (devices.length) {
                    let cameraId = devices.length > 1 ? devices[1].id : devices[0].id;
                    html5QrCode.start(
                        cameraId,
                        // Config responsif (aspectRatio 1.0 membuatnya kotak rapi di HP)
                        { fps: 10, qrbox: { width: 250, height: 250 }, aspectRatio: 1.0 },
                        onScanSuccess
                    );
                } else {
                    resultBox.innerText = "Kamera tidak terdeteksi.";
                }
            }).catch(err => {
                resultBox.innerText = "Gagal mengakses kamera: " + err;
            });
        });
    </script>
</x-app-layout>