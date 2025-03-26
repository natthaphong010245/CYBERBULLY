{{-- resources/views/report&consultation/behavioral_report/report&consultation/behavioral_report.blade.php --}}
@extends('layouts.main_category.index')
@section('content')
    <div class="card-container space-y-10 px-10 md:px-0">
        <!-- Page Title -->
        <div class="text-center mb-4 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-3xl font-bold text-[#3E36AE] inline-block">รายงานพฤติกรรม</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">การรังแก</p>
                </div>
            </div>
        </div>

        <!-- Report Form -->
        <form method="POST" action="{{ route('behavioral-report.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- 1. Report To -->
            <div class="mb-4">
                <label for="report_to" class="block text-sm font-medium text-[#3E36AE] mb-1">ต้องการรายงานกับใคร</label>
                <select id="report_to" name="report_to"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3E36AE]"
                    required>
                    <option value="" disabled selected>กรุณาเลือก</option>
                    <option value="teacher">ครู</option>
                    <option value="researcher">นักวิจัย</option>
                </select>
            </div>

            <!-- 2. School -->
            <div class="mb-4">
                <label for="school" class="block text-sm font-medium text-[#3E36AE] mb-1">โรงเรียน</label>
                <select id="school" name="school"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3E36AE]">
                    <option value="" disabled selected>กรุณาเลือก</option>
                    <option value="โรงเรียน1">โรงเรียน1</option>
                    <option value="โรงเรียน2">โรงเรียน2</option>
                    <option value="โรงเรียน3">โรงเรียน3</option>
                    <option value="โรงเรียน4">โรงเรียน4</option>
                </select>
            </div>

            <!-- 3. Message -->
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-[#3E36AE] mb-1">ข้อความ</label>
                <textarea id="message" name="message" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3E36AE]"
                    required></textarea>
            </div>

            <!-- 4. Voice Recording -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-[#3E36AE] mb-1">บันทึกเสียง</label>
                <div class="flex items-center space-x-2">
                    <button type="button" id="recordButton"
                        class="w-12 h-12 bg-[#7F77E0] rounded-xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    </button>
                    <div id="audioPlayer" class="flex-1">
                        <audio id="recordedAudio" controls class="w-full">
                            <source src="" type="audio/mpeg">
                        </audio>
                    </div>
                </div>
                <input type="hidden" name="audio_recording" id="audio_recording">
            </div>

            <!-- 5. Photos -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-[#3E36AE] mb-1">รูปภาพ</label>
                <div id="imagePreviewContainer" class="flex flex-wrap mb-2">
                    <div id="imagePreview" class="flex flex-wrap">
                        <!-- Preview images will be inserted here -->
                    </div>
                    <div id="uploadMoreContainer"
                        class="flex flex-col items-center justify-center w-20 h-20 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-xs text-gray-500">อัพรูปเพิ่ม</span>
                    </div>
                </div>
                <input type="file" id="photos" name="photos[]" multiple accept="image/*" class="hidden"
                    onchange="previewImages(this)">
            </div>

            <!-- 6. Location -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-[#3E36AE] mb-1">ตำแหน่งที่ตั้ง</label>
                <div id="mapContainer" class="w-full h-40 rounded-lg overflow-hidden relative">
                    <!-- Map will be rendered here -->
                    <div id="map" class="w-full h-full"></div>
                    <!-- Map Loading Indicator -->
                    <div id="mapLoading" class="absolute inset-0 bg-gray-200 flex items-center justify-center">
                        <svg class="animate-spin h-8 w-8 text-[#3E36AE]" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>
                </div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
            </div>

            <!-- Buttons -->
            <div class="flex justify-center gap-8 mt-10 px-12">
                <button type="button" onclick="window.history.back()"
                    class="w-36 px-6 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3E36AE]">
                    ยกเลิก
                </button>
                <button type="submit"
                    class="w-36 px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#7F77E0] hover:bg-[#3E36AE] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3E36AE]">
                    ส่ง
                </button>
            </div>
        </form>

    </div>

    <!-- Image Preview Modal -->
    <div id="imagePreviewModal" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden">
        <button id="closeImagePreviewModal" class="absolute top-4 right-4 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="w-full h-full flex items-center justify-center p-4">
            <img id="fullSizeImage" src="" alt="Full size image" class="max-w-full max-h-full object-contain">
        </div>
    </div>

    <!-- Location Permission Modal -->
    <div id="locationPermissionModal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg w-80 text-center">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-medium text-gray-900">ตำแหน่งที่ตั้ง</h3>
            <p class="mt-2 text-sm text-gray-500">โปรดอนุญาตให้เว็บไซต์เข้าถึงตำแหน่งของคุณ เพื่อระบุตำแหน่งที่ตั้งของคุณ
            </p>
            <div class="mt-4">
                <button id="closeLocationPermissionModal"
                    class="w-full bg-[#7F77E0] py-2 rounded-md text-white font-medium">
                    ตกลง
                </button>
            </div>
        </div>
    </div>


    <div id="customAlert" class="custom-alert-overlay"
        style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 9999; display: none;">
        <div class="custom-alert-box"
            style="background-color: white; border-radius: 10px; max-width: 300px; width: 85%; padding: 20px 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
            <div class="custom-alert-icon"
                style="width: 60px; height: 60px; border-radius: 50%; background-color: #4CAF50; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                    fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <div id="alertMessage" class="custom-alert-message"
                style="font-size: 16px; color: #333; margin-bottom: 20px;">รายงานพฤติกรรมของคุณถูกส่งเรียบร้อยแล้ว</div>
            <button id="alertButton" class="custom-alert-button"
                style="background-color: #7F77E0; color: white; border: none; border-radius: 5px; padding: 10px 0; width: 100%; cursor: pointer; font-weight: 500;">ตกลง</button>
        </div>
    </div>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        // Toggle school field based on report_to selection
        const reportToSelect = document.getElementById('report_to');
        const schoolSelect = document.getElementById('school');

        reportToSelect.addEventListener('change', function() {
            if (this.value === 'researcher') {
                schoolSelect.disabled = true;
                schoolSelect.value = '';
                schoolSelect.classList.add('bg-gray-200');
            } else {
                schoolSelect.disabled = false;
                schoolSelect.classList.remove('bg-gray-200');
            }
        });

        // Voice recording functionality
        const recordButton = document.getElementById('recordButton');
        const audioPlayer = document.getElementById('audioPlayer');
        const recordedAudio = document.getElementById('recordedAudio');

        let mediaRecorder;
        let audioChunks = [];
        let isRecording = false;

        // Toggle recording state
        function toggleRecording() {
            if (isRecording) {
                stopRecording();
                // Change button back to original state
                recordButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                `;
                recordButton.classList.remove('bg-white', 'border-gray-300');
                recordButton.classList.add('bg-[#7F77E0]');
            } else {
                startRecording();
                // Change button to white background with red square for stop
                recordButton.innerHTML = `
                    <div class="w-4 h-4 bg-red-600 rounded-sm"></div>
                `;
                recordButton.classList.remove('bg-[#7F77E0]');
                recordButton.classList.add('bg-white', 'border', 'border-gray-300');
            }
            isRecording = !isRecording;
        }

        // Start recording
        function startRecording() {
            audioChunks = [];

            // Request microphone access
            navigator.mediaDevices.getUserMedia({
                    audio: true
                })
                .then(stream => {
                    // Start recording
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();

                    mediaRecorder.addEventListener('dataavailable', event => {
                        audioChunks.push(event.data);
                    });

                    mediaRecorder.addEventListener('stop', () => {
                        const audioBlob = new Blob(audioChunks, {
                            type: 'audio/mp3'
                        });
                        const audioUrl = URL.createObjectURL(audioBlob);
                        recordedAudio.src = audioUrl;

                        // Convert blob to base64 data URL for form submission
                        const reader = new FileReader();
                        reader.readAsDataURL(audioBlob);
                        reader.onloadend = function() {
                            document.getElementById('audio_recording').value = reader.result;
                        };
                    });
                })
                .catch(error => {
                    console.error('Error accessing microphone:', error);
                    alert('ไม่สามารถเข้าถึงไมโครโฟนได้ กรุณาตรวจสอบการอนุญาตการใช้ไมโครโฟน');
                    isRecording = false;
                    recordButton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                    `;
                    recordButton.classList.remove('bg-white', 'border-gray-300');
                    recordButton.classList.add('bg-[#7F77E0]');
                });
        }

        // Stop recording
        function stopRecording() {
            if (mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();

                // Stop all audio tracks
                mediaRecorder.stream.getTracks().forEach(track => track.stop());
            }
        }

        // Event listeners
        recordButton.addEventListener('click', toggleRecording);

        // Image preview functionality
        const uploadMoreContainer = document.getElementById('uploadMoreContainer');
        const photosInput = document.getElementById('photos');
        const imagePreviewModal = document.getElementById('imagePreviewModal');
        const closeImagePreviewModal = document.getElementById('closeImagePreviewModal');
        const fullSizeImage = document.getElementById('fullSizeImage');

        uploadMoreContainer.addEventListener('click', function() {
            photosInput.click();
        });

        function previewImages(input) {
            const imagePreview = document.getElementById('imagePreview');
            const uploadMoreContainer = document.getElementById('uploadMoreContainer');
            const fileCount = input.files.length;

            // Limit to 3 images
            if (imagePreview.children.length + fileCount > 3) {
                alert('คุณสามารถอัปโหลดได้สูงสุด 3 รูป');
                input.value = '';
                return;
            }

            for (let i = 0; i < fileCount; i++) {
                const file = input.files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'relative mr-2 mb-2';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'w-20 h-20 object-cover rounded-lg cursor-pointer';

                    // Open image in fullscreen modal when clicked
                    img.onclick = function() {
                        fullSizeImage.src = e.target.result;
                        imagePreviewModal.classList.remove('hidden');

                        // Hide everything except the image preview modal
                        document.getElementById('mapContainer').style.display = 'none';
                    };

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className =
                        'absolute -top-3 -right-3 bg-red-500 text-white rounded-full w-7 h-7 flex items-center justify-center shadow-md z-20';
                    removeBtn.innerHTML = '×';
                    removeBtn.style.fontSize = '18px';
                    removeBtn.style.fontWeight = 'bold';
                    removeBtn.onclick = function(event) {
                        event.stopPropagation();
                        imagePreview.removeChild(imgContainer);

                        // Show upload more button if less than 3 images
                        if (imagePreview.children.length < 3) {
                            uploadMoreContainer.classList.remove('hidden');
                        }
                    };

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(removeBtn);
                    imagePreview.appendChild(imgContainer);

                    // Hide upload more button if 3 images are reached
                    if (imagePreview.children.length >= 3) {
                        uploadMoreContainer.classList.add('hidden');
                    }
                };

                reader.readAsDataURL(file);
            }
        }

        // Close image preview modal
        closeImagePreviewModal.addEventListener('click', function() {
            imagePreviewModal.classList.add('hidden');
            // Show map container again
            document.getElementById('mapContainer').style.display = 'block';
        });

        // OpenStreetMap Implementation with Leaflet
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });

        let map, marker;

        function initMap() {
            const mapLoading = document.getElementById('mapLoading');
            const locationPermissionModal = document.getElementById('locationPermissionModal');
            const closeLocationPermissionModal = document.getElementById('closeLocationPermissionModal');

            // Default location (Thailand)
            const defaultLocation = [19.9071, 99.8308];  // [latitude, longitude]

            
            try {
                // Initialize the map with default location
                map = L.map('map').setView(defaultLocation, 15);

                // Add OpenStreetMap tiles with green style similar to Google Maps
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 19
                }).addTo(map);

                // Add custom CSS to make the map look more like Google Maps
                document.head.insertAdjacentHTML('beforeend', `
            <style>
                .leaflet-tile-container img {
                    filter: hue-rotate(25deg) saturate(0.8) brightness(1.05);
                }
                .leaflet-control-zoom {
                    border: none !important;
                    box-shadow: 0 1px 5px rgba(0,0,0,0.2) !important;
                }
                .leaflet-control-zoom a {
                    border-radius: 10px !important;
                    color: #666 !important;
                    background-color: white !important;
                }
                .custom-marker {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            </style>
        `);

                // Create a custom marker icon (red circle like Google Maps)
                const redMarkerIcon = L.divIcon({
                    className: 'custom-marker',
                    html: '<div style="background-color: #ea4335; width: 16px; height: 16px; border-radius: 50%; border: 2px solid white; box-shadow: 0 0 5px rgba(0,0,0,0.3);"></div>',
                    iconSize: [24, 24],
                    iconAnchor: [12, 12]
                });

                // Add marker at default location
                marker = L.marker(defaultLocation, {
                    icon: redMarkerIcon
                }).addTo(map);

                // หาตำแหน่งโค้ดนี้ในฟังก์ชัน initMap()
                if (navigator.geolocation) {
                    // Show permission modal instead of automatically requesting
                    locationPermissionModal.classList.remove('hidden');

                    // เพิ่มบรรทัดนี้เพื่อซ่อนแผนที่
                    document.getElementById('map').style.visibility = 'hidden';

                    // Set default coordinates for now
                    document.getElementById('latitude').value = defaultLocation[0];
                    document.getElementById('longitude').value = defaultLocation[1];
                }

                // Show position when map is clicked
                map.on('click', function(e) {
                    const clickedLocation = [e.latlng.lat, e.latlng.lng];

                    // Update marker position
                    marker.setLatLng(clickedLocation);

                    // Store coordinates in form
                    document.getElementById('latitude').value = clickedLocation[0];
                    document.getElementById('longitude').value = clickedLocation[1];
                });

                // หา event listener ของปุ่มตกลง
                closeLocationPermissionModal.addEventListener('click', function() {
                    locationPermissionModal.classList.add('hidden');

                    // เพิ่มบรรทัดนี้เพื่อแสดงแผนที่กลับมา
                    document.getElementById('map').style.visibility = 'visible';

                    // Show loading again
                    if (mapLoading) mapLoading.style.display = 'flex';

                    // Request location
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const userLocation = [
                                position.coords.latitude,
                                position.coords.longitude
                            ];

                            // Update map center and marker position
                            map.setView(userLocation, 15);
                            marker.setLatLng(userLocation);

                            // Store coordinates in form
                            document.getElementById('latitude').value = userLocation[0];
                            document.getElementById('longitude').value = userLocation[1];

                            // Hide loading
                            if (mapLoading) mapLoading.style.display = 'none';
                        },
                        function(error) {
                            console.error("Geolocation error:", error);

                            // Still show map with default location
                            document.getElementById('latitude').value = defaultLocation[0];
                            document.getElementById('longitude').value = defaultLocation[1];

                            // Hide loading
                            if (mapLoading) mapLoading.style.display = 'none';
                        }, {
                            enableHighAccuracy: true,
                            timeout: 5000,
                            maximumAge: 0
                        }
                    );
                });

            } catch (error) {
                console.error("Error initializing map:", error);
                if (mapLoading) mapLoading.style.display = 'none';
                document.getElementById('map').innerHTML =
                    '<div class="w-full h-full flex flex-col items-center justify-center bg-gray-200 rounded-lg">' +
                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />' +
                    '</svg>' +
                    '<p class="text-sm text-gray-600 text-center px-4">ไม่สามารถโหลดแผนที่ได้ กรุณาลองใหม่อีกครั้งในภายหลัง</p>' +
                    '</div>';
            }
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ตรวจสอบว่ามีข้อความแจ้งเตือนความสำเร็จหรือไม่
            @if (session('success'))
                // แสดงป๊อปอัพ
                showCustomAlert("{{ session('success') }}");
            @endif

            // เพิ่ม event listener สำหรับปุ่มตกลง
            document.getElementById('alertButton').addEventListener('click', function() {
                document.getElementById('customAlert').style.display = 'none';

                window.location.href = "{{ route('result_report') }}";
            });
        });

        function showCustomAlert(message) {
            document.getElementById('alertMessage').textContent = message;

            document.getElementById('customAlert').style.display = 'flex';
        }
    </script>
@endsection
