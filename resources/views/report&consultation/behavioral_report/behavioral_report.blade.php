@extends('layouts.main_category')

@php
    $backUrl = '/report_consultation';
    $mainUrl = '/main';
@endphp

@section('content')
<style>
    .leaflet-tile-container img { filter: hue-rotate(25deg) saturate(0.8) brightness(1.05); }
    .leaflet-control-zoom { border: none !important; box-shadow: 0 1px 5px rgba(0,0,0,0.2) !important; }
    .leaflet-control-zoom a { border-radius: 10px !important; color: #666 !important; background-color: white !important; }
    .custom-marker { display: flex; align-items: center; justify-content: center; }
    
    /* Mobile responsive styles */
    @media (max-width: 768px) {
        .mobile-select {
            font-size: 16px; /* ป้องกันการ zoom บน iOS */
            height: 44px; /* ความสูงที่เหมาะสมสำหรับการแตะ */
        }
        
        .dropdown-container {
            position: relative;
        }
        
        .dropdown-list {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 50;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .dropdown-list.show {
            display: block;
        }
        
        .dropdown-item {
            padding: 12px 16px;
            border-bottom: 1px solid #f3f4f6;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .dropdown-item:hover,
        .dropdown-item.selected {
            background-color: #f3f4f6;
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .select-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background: white;
            cursor: pointer;
            min-height: 44px;
        }
        
        .select-display.disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
        }
        
        .arrow-icon {
            transition: transform 0.2s;
        }
        
        .arrow-icon.rotate {
            transform: rotate(180deg);
        }
    }
</style>

<div class="card-container space-y-6 px-4 md:px-10 mr-4 ml-4">
    <!-- Page Title -->
    <div class="text-center mb-6 relative">
        <div class="flex items-center justify-center">
            <div class="relative">
                <h1 class="text-2xl md:text-3xl font-bold text-[#3E36AE] inline-block">รายงานพฤติกรรม</h1>
                <p class="text-sm md:text-base text-[#3E36AE] absolute -bottom-6 right-0">การรังแก</p>
            </div>
        </div>
    </div>

    <!-- Report Form -->
    <form method="POST" action="{{ route('behavioral-report.store') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Report To Field -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-[#3E36AE] mb-2">ต้องการรายงานกับใคร</label>
            <div class="dropdown-container">
                <div id="reportToDisplay" class="select-display">
                    <span id="reportToText" class="text-gray-500">กรุณาเลือก</span>
                    <svg class="arrow-icon w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div id="reportToList" class="dropdown-list">
                    <div class="dropdown-item" data-value="teacher">ครู</div>
                    <div class="dropdown-item" data-value="researcher">นักวิจัย</div>
                </div>
                <input type="hidden" name="report_to" id="report_to" required>
            </div>
        </div>

        <!-- School Field -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-[#3E36AE] mb-2">โรงเรียน</label>
            <div class="dropdown-container">
                <div id="schoolDisplay" class="select-display">
                    <span id="schoolText" class="text-gray-500">กรุณาเลือก</span>
                    <svg class="arrow-icon w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div id="schoolList" class="dropdown-list">
                    <div class="dropdown-item" data-value="โรงเรียน1">โรงเรียน1</div>
                    <div class="dropdown-item" data-value="โรงเรียน2">โรงเรียน2</div>
                    <div class="dropdown-item" data-value="โรงเรียน3">โรงเรียน3</div>
                    <div class="dropdown-item" data-value="โรงเรียน4">โรงเรียน4</div>
                </div>
                <input type="hidden" name="school" id="school">
            </div>
        </div>

        <!-- Message Field -->
        <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-[#3E36AE] mb-2">ข้อความ</label>
            <textarea id="message" name="message" rows="4" required
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3E36AE] resize-none text-base"
                      style="font-size: 16px;"></textarea>
        </div>

        <!-- Voice Recording -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-[#3E36AE] mb-2">บันทึกเสียง</label>
            <div class="flex items-center space-x-3">
                <button type="button" id="recordButton" class="w-12 h-12 bg-[#7F77E0] rounded-xl flex items-center justify-center touch-manipulation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                </button>
                <div id="audioPlayer" class="flex-1">
                    <audio id="recordedAudio" controls class="w-full h-10">
                        <source src="" type="audio/mpeg">
                    </audio>
                </div>
            </div>
            <input type="hidden" name="audio_recording" id="audio_recording">
        </div>

        <!-- Photos -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-[#3E36AE] mb-2">รูปภาพ</label>
            <div id="imagePreviewContainer" class="flex flex-wrap gap-2 mb-3">
                <div id="imagePreview" class="flex flex-wrap gap-2"></div>
                <div id="uploadMoreContainer" class="flex flex-col items-center justify-center w-20 h-20 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer touch-manipulation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span class="text-xs text-gray-500 mt-1">อัพรูปเพิ่ม</span>
                </div>
            </div>
            <input type="file" id="photos" name="photos[]" multiple accept="image/*" class="hidden">
        </div>

        <!-- Location -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-[#3E36AE] mb-2">ตำแหน่งที่ตั้ง</label>
            <div id="mapContainer" class="w-full h-48 rounded-lg overflow-hidden relative">
                <div id="map" class="w-full h-full"></div>
                <div id="mapLoading" class="absolute inset-0 bg-gray-100 flex flex-col items-center justify-center">
                    <svg class="animate-spin h-8 w-8 text-[#3E36AE] mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="text-sm text-gray-600 text-center px-4">กำลังโหลดแผนที่...</p>
                    <p class="text-xs text-gray-500 text-center px-4 mt-1">แตะบนแผนที่เพื่อระบุตำแหน่ง</p>
                </div>
                <div id="locationPrompt" class="absolute inset-0 bg-white bg-opacity-95 flex flex-col items-center justify-center hidden">
                    <svg class="h-12 w-12 text-[#3E36AE] mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="text-sm font-medium text-[#3E36AE] text-center px-4 mb-2">แตะบนแผนที่เพื่อระบุตำแหน่ง</p>
                    <p class="text-xs text-gray-500 text-center px-4">จำเป็นต้องระบุตำแหน่งก่อนส่งรายงาน</p>
                </div>
            </div>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
        </div>

        <!-- Buttons -->
        <div class="flex justify-center gap-4 mt-8 px-4">
            <button type="button" onclick="window.history.back()" class="flex-1 max-w-36 px-6 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3E36AE] touch-manipulation">
                ยกเลิก
            </button>
            <button type="submit" class="flex-1 max-w-36 px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#7F77E0] hover:bg-[#3E36AE] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#3E36AE] touch-manipulation">
                ส่ง
            </button>
        </div>
    </form>
</div>

<!-- Modals -->
<div id="imagePreviewModal" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden">
    <button id="closeImagePreviewModal" class="absolute top-4 right-4 text-white z-10 touch-manipulation">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div class="w-full h-full flex items-center justify-center p-4">
        <img id="fullSizeImage" src="" alt="Full size image" class="max-w-full max-h-full object-contain">
    </div>
</div>

<div id="customAlert" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
    <div class="bg-white rounded-lg max-w-sm w-4/5 p-5 text-center shadow-lg">
        <div class="w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4">
            <img src="/images/material/correct.png" alt="Success" class="w-24 h-24 rounded-full">
        </div>
        <div id="alertMessage" class="text-gray-800 mb-4">รายงานพฤติกรรมของคุณ ส่งเรียบร้อยแล้ว</div>
        <button id="alertButton" class="bg-[#7F77E0] text-white border-0 rounded px-6 py-2 w-full cursor-pointer font-medium touch-manipulation">ตกลง</button>
    </div>
</div>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initCustomSelects();
    initFormValidation();
    initVoiceRecording();
    initImagePreview();
    initMap();
    initSuccessAlert();
});

// Custom mobile-friendly select dropdowns
function initCustomSelects() {
    const reportToDisplay = document.getElementById('reportToDisplay');
    const reportToList = document.getElementById('reportToList');
    const reportToText = document.getElementById('reportToText');
    const reportToInput = document.getElementById('report_to');
    
    const schoolDisplay = document.getElementById('schoolDisplay');
    const schoolList = document.getElementById('schoolList');
    const schoolText = document.getElementById('schoolText');
    const schoolInput = document.getElementById('school');

    // Report To dropdown
    reportToDisplay.addEventListener('click', function() {
        if (!this.classList.contains('disabled')) {
            toggleDropdown(reportToList, this.querySelector('.arrow-icon'));
            closeDropdown(schoolList, schoolDisplay.querySelector('.arrow-icon'));
        }
    });

    reportToList.addEventListener('click', function(e) {
        if (e.target.classList.contains('dropdown-item')) {
            const value = e.target.getAttribute('data-value');
            const text = e.target.textContent;
            
            reportToInput.value = value;
            reportToText.textContent = text;
            reportToText.classList.remove('text-gray-500');
            reportToText.classList.add('text-gray-900');
            
            closeDropdown(reportToList, reportToDisplay.querySelector('.arrow-icon'));
            
            // Handle school field based on selection
            if (value === 'researcher') {
                schoolDisplay.classList.add('disabled');
                schoolInput.value = '';
                schoolText.textContent = 'กรุณาเลือก';
                schoolText.classList.remove('text-gray-900');
                schoolText.classList.add('text-gray-500');
            } else {
                schoolDisplay.classList.remove('disabled');
            }
        }
    });

    // School dropdown
    schoolDisplay.addEventListener('click', function() {
        if (!this.classList.contains('disabled')) {
            toggleDropdown(schoolList, this.querySelector('.arrow-icon'));
            closeDropdown(reportToList, reportToDisplay.querySelector('.arrow-icon'));
        }
    });

    schoolList.addEventListener('click', function(e) {
        if (e.target.classList.contains('dropdown-item')) {
            const value = e.target.getAttribute('data-value');
            const text = e.target.textContent;
            
            schoolInput.value = value;
            schoolText.textContent = text;
            schoolText.classList.remove('text-gray-500');
            schoolText.classList.add('text-gray-900');
            
            closeDropdown(schoolList, schoolDisplay.querySelector('.arrow-icon'));
        }
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!reportToDisplay.contains(e.target) && !reportToList.contains(e.target)) {
            closeDropdown(reportToList, reportToDisplay.querySelector('.arrow-icon'));
        }
        if (!schoolDisplay.contains(e.target) && !schoolList.contains(e.target)) {
            closeDropdown(schoolList, schoolDisplay.querySelector('.arrow-icon'));
        }
    });

    function toggleDropdown(list, arrow) {
        list.classList.toggle('show');
        arrow.classList.toggle('rotate');
    }

    function closeDropdown(list, arrow) {
        list.classList.remove('show');
        arrow.classList.remove('rotate');
    }
}

// Form validation and behavior
function initFormValidation() {
    // Form submission validation
    document.querySelector('form').addEventListener('submit', function(event) {
        const latitude = document.getElementById('latitude').value;
        const longitude = document.getElementById('longitude').value;
        
        if (!latitude || !longitude) {
            event.preventDefault();
            
            // Show location prompt
            const locationPrompt = document.getElementById('locationPrompt');
            locationPrompt.classList.remove('hidden');
            
            // Scroll to map
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.scrollIntoView({ behavior: 'smooth' });
            mapContainer.classList.add('ring', 'ring-red-500', 'ring-2');
            
            // Hide prompt and remove ring after 3 seconds
            setTimeout(() => {
                locationPrompt.classList.add('hidden');
                mapContainer.classList.remove('ring', 'ring-red-500', 'ring-2');
            }, 3000);
        }
    });
}

// Voice recording functionality
function initVoiceRecording() {
    const recordButton = document.getElementById('recordButton');
    const recordedAudio = document.getElementById('recordedAudio');
    let mediaRecorder, audioChunks = [], isRecording = false;

    const micIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
    </svg>`;
    const stopIcon = `<div class="w-4 h-4 bg-red-600 rounded-sm"></div>`;

    recordButton.addEventListener('click', function() {
        if (isRecording) {
            stopRecording();
            updateRecordButton(micIcon, 'bg-[#7F77E0]', ['bg-white', 'border-gray-300']);
        } else {
            startRecording();
            updateRecordButton(stopIcon, 'bg-white border border-gray-300', ['bg-[#7F77E0]']);
        }
        isRecording = !isRecording;
    });

    function updateRecordButton(html, addClasses, removeClasses) {
        recordButton.innerHTML = html;
        recordButton.classList.remove(...removeClasses);
        recordButton.classList.add(...addClasses.split(' '));
    }

    function startRecording() {
        audioChunks = [];
        navigator.mediaDevices.getUserMedia({ audio: true })
            .then(stream => {
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();

                mediaRecorder.addEventListener('dataavailable', event => audioChunks.push(event.data));
                mediaRecorder.addEventListener('stop', () => {
                    const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                    recordedAudio.src = URL.createObjectURL(audioBlob);

                    const reader = new FileReader();
                    reader.onloadend = () => document.getElementById('audio_recording').value = reader.result;
                    reader.readAsDataURL(audioBlob);
                });
            })
            .catch(error => {
                console.error('Error accessing microphone:', error);
                alert('ไม่สามารถเข้าถึงไมโครโฟนได้ กรุณาตรวจสอบการอนุญาตการใช้ไมโครโฟน');
                isRecording = false;
                updateRecordButton(micIcon, 'bg-[#7F77E0]', ['bg-white', 'border-gray-300']);
            });
    }

    function stopRecording() {
        if (mediaRecorder && mediaRecorder.state !== 'inactive') {
            mediaRecorder.stop();
            mediaRecorder.stream.getTracks().forEach(track => track.stop());
        }
    }
}

// Image preview functionality
function initImagePreview() {
    const uploadMoreContainer = document.getElementById('uploadMoreContainer');
    const photosInput = document.getElementById('photos');
    const imagePreview = document.getElementById('imagePreview');
    const imagePreviewModal = document.getElementById('imagePreviewModal');
    const fullSizeImage = document.getElementById('fullSizeImage');

    uploadMoreContainer.addEventListener('click', () => photosInput.click());
    document.getElementById('closeImagePreviewModal').addEventListener('click', () => {
        imagePreviewModal.classList.add('hidden');
        document.getElementById('mapContainer').style.display = 'block';
    });

    photosInput.addEventListener('change', function() {
        const fileCount = this.files.length;
        if (imagePreview.children.length + fileCount > 3) {
            alert('คุณสามารถอัปโหลดได้สูงสุด 3 รูป');
            this.value = '';
            return;
        }

        Array.from(this.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'relative';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-20 h-20 object-cover rounded-lg cursor-pointer touch-manipulation';
                img.onclick = () => {
                    fullSizeImage.src = e.target.result;
                    imagePreviewModal.classList.remove('hidden');
                    document.getElementById('mapContainer').style.display = 'none';
                };

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-md z-20 touch-manipulation';
                removeBtn.innerHTML = '×';
                removeBtn.style.fontSize = '16px';
                removeBtn.style.fontWeight = 'bold';
                removeBtn.onclick = (event) => {
                    event.stopPropagation();
                    imagePreview.removeChild(imgContainer);
                    if (imagePreview.children.length < 3) {
                        uploadMoreContainer.classList.remove('hidden');
                    }
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(removeBtn);
                imagePreview.appendChild(imgContainer);

                if (imagePreview.children.length >= 3) {
                    uploadMoreContainer.classList.add('hidden');
                }
            };
            reader.readAsDataURL(file);
        });
    });
}

// Map functionality
function initMap() {
    const mapLoading = document.getElementById('mapLoading');
    const locationPrompt = document.getElementById('locationPrompt');
    let map, marker;
    let locationSelected = false;

    try {
        // Initialize map without default location
        map = L.map('map', {
            zoomControl: true,
            scrollWheelZoom: true,
            doubleClickZoom: true,
            touchZoom: true,
            dragging: true
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        const redMarkerIcon = L.divIcon({
            className: 'custom-marker',
            html: '<div style="background-color: #ea4335; width: 16px; height: 16px; border-radius: 50%; border: 2px solid white; box-shadow: 0 0 5px rgba(0,0,0,0.3);"></div>',
            iconSize: [24, 24],
            iconAnchor: [12, 12]
        });

        // Try to get user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const userLocation = [position.coords.latitude, position.coords.longitude];
                    map.setView(userLocation, 15);
                    
                    // Add marker at current location
                    marker = L.marker(userLocation, { icon: redMarkerIcon }).addTo(map);
                    document.getElementById('latitude').value = userLocation[0];
                    document.getElementById('longitude').value = userLocation[1];
                    locationSelected = true;
                    
                    mapLoading.style.display = 'none';
                },
                function(error) {
                    console.error("Geolocation error:", error);
                    // Fall back to default location if geolocation fails
                    const defaultLocation = [13.7563, 100.5018]; // Bangkok
                    map.setView(defaultLocation, 10);
                    mapLoading.style.display = 'none';
                    locationPrompt.classList.remove('hidden');
                },
                { 
                    enableHighAccuracy: true, 
                    timeout: 10000, 
                    maximumAge: 300000 
                }
            );
        } else {
            // Geolocation not supported
            const defaultLocation = [13.7563, 100.5018]; // Bangkok
            map.setView(defaultLocation, 10);
            mapLoading.style.display = 'none';
            locationPrompt.classList.remove('hidden');
        }

        // Handle map clicks
        map.on('click', function(e) {
            const clickedLocation = [e.latlng.lat, e.latlng.lng];
            
            // Remove existing marker
            if (marker) {
                map.removeLayer(marker);
            }
            
            // Add new marker
            marker = L.marker(clickedLocation, { icon: redMarkerIcon }).addTo(map);
            document.getElementById('latitude').value = clickedLocation[0];
            document.getElementById('longitude').value = clickedLocation[1];
            locationSelected = true;
            
            // Hide location prompt
            locationPrompt.classList.add('hidden');
        });

    } catch (error) {
        console.error("Error initializing map:", error);
        if (mapLoading) mapLoading.style.display = 'none';
        document.getElementById('map').innerHTML = '<div class="w-full h-full flex flex-col items-center justify-center bg-gray-200 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg><p class="text-sm text-gray-600 text-center px-4">ไม่สามารถโหลดแผนที่ได้ กรุณาลองใหม่อีกครั้งในภายหลัง</p></div>';
    }
}

// Success alert functionality
function initSuccessAlert() {
    @if (session('success'))
        document.getElementById('alertMessage').textContent = "{{ session('success') }}";
        document.getElementById('customAlert').classList.remove('hidden');
    @endif

    document.getElementById('alertButton').addEventListener('click', function() {
        document.getElementById('customAlert').classList.add('hidden');
        window.location.href = "{{ route('result_report') }}";
    });
}
</script>
@endsection