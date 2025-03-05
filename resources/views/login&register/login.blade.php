@extends('layouts.login&register.index')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-10 pt-8 flex flex-col mt-16">
        <h1 class="text-center mb-6 text-[#3F359E] text-[24px] font-bold">
            เข้าสู่ระบบ
        </h1>

        <!-- Username Input -->
        <div class="mb-4">
            <label for="username" class="block text-left text-[16px] font-medium mb-1">ชื่อผู้ใช้</label>
            <input type="text" id="username" name="username" placeholder="กรุณากรอกชื่อผู้ใช้"
                class="w-full px-6 py-3 border border-gray-400 rounded-2xl text-gray-700 placeholder-gray-500 focus:outline-none focus:border-[#929AFF]">
        </div>

        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-left text-[16px] font-medium mb-1">รหัสผ่าน</label>
            <input type="password" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน"
                class="w-full px-6 py-3 border border-gray-400 rounded-2xl text-gray-700 placeholder-gray-500 focus:outline-none focus:border-[#929AFF]">
        </div>

        <!-- Submit Button -->
        <a href="{{ route('main') }}"
            class="bg-[#929AFF] hover:bg-[#7B84EA] text-white py-2.5 px-6 rounded-2xl text-center transition mt-6 duration-300 w-[100%] mx-auto text-[20px] font-bold">
            เข้าสู่ระบบ
        </a>

        <!-- Cancel Button -->
        <a href="{{ route('home') }}"
            class="bg-[#ffffff] py-2.5 px-6 rounded-2xl text-center transition duration-300 w-[100%] mx-auto text-[20px] mt-8 mb-8 text-gray-400 border border-gray-400 font-bold active:border-white">
            ยกเลิก
        </a>

        <div class="py-3 text-center text-sm mt-auto ">
            <p class=" text-[16px]">ลงทะเบียนสำหรับใช้งาน <a href="{{ route('register') }}"
                    class="text-[#3F359E] text-[16px] active:text-[#827ea4]">ลงทะเบียน</a>
            </p>
        </div>
    </div>
@endsection