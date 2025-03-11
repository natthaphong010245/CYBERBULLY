@extends('layouts.main_video.index')

@section('content')

<!-- Card section - Always in a single column -->
<div class="card-container space-y-10 px-4 md:px-0">
  <!-- Page Title -->
  <div class="text-center ">
    <h1 class="text-3xl font-bold" style="color: rgba(62, 54, 174, 1)">VIDEO</h1>
    <p class="text-sm" style="color: rgba(62, 54, 174, 0.8)">หมวดหมู่</p>
  </div>
  
  <!-- Video Cards -->
  <a href="video_category1_select_language" class="block relative">
    <div class="py-3 pl-24 pr-6 flex items-center h-20 rounded-[10px]" style="background-color: rgba(146, 154, 255, 1)">
      <div class="absolute left-4 -top-6">
        <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
      </div>
      <div class="font-medium text-white text-lg ml-12">หมวดหมู่ VDO</div>
    </div>
  </a>
  
  <a href="video_category2_select_language" class="block relative">
    <div class="py-3 pl-24 pr-6 flex items-center h-20 rounded-[10px]" style="background-color: rgba(146, 154, 255, 1)">
      <div class="absolute left-4 -top-6">
        <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
      </div>
      <div class="font-medium text-white text-lg ml-12">หมวดหมู่ VDO</div>
    </div>
  </a>
  
  <a href="video_category3_select_language" class="block relative">
    <div class="py-3 pl-24 pr-6 flex items-center h-20 rounded-[10px]" style="background-color: rgba(146, 154, 255, 1)">
      <div class="absolute left-4 -top-6">
        <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
      </div>
      <div class="font-medium text-white text-lg ml-12">หมวดหมู่ VDO</div>
    </div>
  </a>
  
  <a href="video_category4_select_language" class="block relative">
    <div class="py-3 pl-24 pr-6 flex items-center h-20 rounded-[10px]" style="background-color: rgba(146, 154, 255, 1)">
      <div class="absolute left-4 -top-6">
        <img src="{{ asset('images/teen-1.png') }}" alt="Teen Icon" class="w-24 h-24 object-contain">
      </div>
      <div class="font-medium text-white text-lg ml-12">หมวดหมู่ VDO</div>
    </div>
  </a>
</div>
@endsection