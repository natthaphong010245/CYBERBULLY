@extends('layouts.main_video.index')

@section('content')
<!-- Card section with padding and side borders -->
<div class="relative px-6 md:px-10 lg:px-16 py-6 mx-auto max-w-5xl">
  <!-- Left border -->
  <div class="absolute left-0 top-0 bottom-0 w-4 md:w-6"></div>
  
  <!-- Right border -->
  <div class="absolute right-0 top-0 bottom-0 w-4 md:w-6"></div>
  
  <!-- Content with padding -->
  <div class="card-container px-6 sm:px-8 md:px-10">
    <!-- Page Title -->
    <div class="text-center mb-6">
      <h1 class="text-2xl font-bold" style="color: rgba(62, 54, 174, 1)">VDO ชื่อหมวดหมู่วิดีโอ 3</h1>
      <p class="text-sm" style="color: rgba(62, 54, 174, 0.8)">ภาษา อาข่า</p>
    </div>
  
    <!-- Video List -->
    <div>
      <!-- Video Item 1 -->
      <a href="https://www.youtube.com/watch?v=v2Ctdi93SbM" target="_blank" class="block hover:bg-gray-50 rounded-md">
        <div class="py-5 border-b-2" style="border-color: rgba(189, 195, 255, 1)">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0 w-36 h-24 rounded-md overflow-hidden">
              <img src="https://img.youtube.com/vi/v2Ctdi93SbM/mqdefault.jpg" alt="thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
              <h3 class="text-lg md:text-xl font-medium text-gray-800">วิธีใดๆชาวมุมช้อ</h3>
            </div>
          </div>
        </div>
      </a>
      
      <!-- Video Item 2 -->
      <a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" target="_blank" class="block hover:bg-gray-50 rounded-md">
        <div class="py-5 border-b-2" style="border-color: rgba(189, 195, 255, 1)">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0 w-36 h-24 rounded-md overflow-hidden">
              <img src="https://img.youtube.com/vi/oHg5SJYRHA0/mqdefault.jpg" alt="thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
              <h3 class="text-lg md:text-xl font-medium text-gray-800">สารพลอยได้ชนิดใด ห้ามใช้กับชาวมุมช้อ</h3>
            </div>
          </div>
        </div>
      </a>
      
      <!-- Video Item 3 -->
      <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="block hover:bg-gray-50 rounded-md">
        <div class="py-5 border-b-2" style="border-color: rgba(189, 195, 255, 1)">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0 w-36 h-24 rounded-md overflow-hidden">
              <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
              <h3 class="text-lg md:text-xl font-medium text-gray-800">รวมฮิตจอย่า-หา-ค่า</h3>
            </div>
          </div>
        </div>
      </a>
      
      <!-- Video Item 4 -->
      <a href="https://www.youtube.com/watch?v=UxxajLWwzqY" target="_blank" class="block hover:bg-gray-50 rounded-md">
        <div class="py-5 border-b-2" style="border-color: rgba(189, 195, 255, 1)">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0 w-36 h-24 rounded-md overflow-hidden">
              <img src="https://img.youtube.com/vi/UxxajLWwzqY/mqdefault.jpg" alt="thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
              <h3 class="text-lg md:text-xl font-medium text-gray-800">การดูแก้แน้ของผู้หญิง</h3>
            </div>
          </div>
        </div>
      </a>
      
      <!-- Video Item 5 -->
      <a href="https://www.youtube.com/watch?v=9bZkp7q19f0" target="_blank" class="block hover:bg-gray-50 rounded-md">
        <div class="py-5 border-b-2" style="border-color: rgba(189, 195, 255, 1)">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0 w-36 h-24 rounded-md overflow-hidden">
              <img src="https://img.youtube.com/vi/9bZkp7q19f0/mqdefault.jpg" alt="thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
              <h3 class="text-lg md:text-xl font-medium text-gray-800">กินยาเม็ดคุมกำเนิดอย่างไร... สุขใจไร้กังวล</h3>
            </div>
          </div>
        </div>
      </a>
      
      <!-- Video Item 6 -->
      <a href="https://www.youtube.com/watch?v=M7FIvfx5J10" target="_blank" class="block hover:bg-gray-50 rounded-md">
        <div class="py-5 border-b-2" style="border-color: rgba(189, 195, 255, 1)">
          <div class="flex items-center space-x-5">
            <div class="flex-shrink-0 w-36 h-24 rounded-md overflow-hidden">
              <img src="https://img.youtube.com/vi/M7FIvfx5J10/mqdefault.jpg" alt="thumbnail" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
              <h3 class="text-lg md:text-xl font-medium text-gray-800">ยาคุมฉุกเฉินมีผลข้างเคียงอะไร</h3>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection