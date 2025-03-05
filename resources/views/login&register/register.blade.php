@extends('layouts.login&register.index')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-10 pt-8 flex flex-col mt-16">
        <h1 class="text-center mb-6 text-[#3F359E] text-[24px] font-bold">
            ลงทะเบียน
        </h1>

        <!-- Role Dropdown -->
        <div class="mb-4">
            <label for="role" class="block text-left text-[16px] font-medium mb-1">บทบาท</label>
            <div class="relative">
                <select id="role" name="role" 
                    class="w-full px-6 pr-14 py-3 border border-gray-400 rounded-2xl text-gray-700 focus:outline-none focus:border-[#929AFF] appearance-none">
                    <option value="" disabled selected>--บทบาท--</option>
                    <option value="teacher">คุณครู</option>
                    <option value="researcher">นักวิจัย</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-6 flex items-center">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>
        
        <!-- School Dropdown -->
        <div class="mb-4" id="school-container">
            <label for="school" class="block text-left text-[16px] font-medium mb-1">โรงเรียน</label>
            <div class="relative">
                <select id="school" name="school" 
                    class="w-full px-6 pr-14 py-3 border border-gray-400 rounded-2xl text-gray-700 focus:outline-none focus:border-[#929AFF] appearance-none">
                    <option value="" disabled selected>--โรงเรียน--</option>
                    <option value="school1">โรงเรียน 1</option>
                    <option value="school2">โรงเรียน 2</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-6 flex items-center">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-left text-[16px] font-medium mb-1">ชื่อ</label>
            <input type="text" id="name" name="name" placeholder="กรุณากรอกชื่อ"
                class="w-full px-6 py-3 border border-gray-400 rounded-2xl text-gray-700 placeholder-gray-500 focus:outline-none focus:border-[#929AFF]">
        </div>

        <!-- Lastname Input -->
        <div class="mb-4">
            <label for="lastname" class="block text-left text-[16px] font-medium mb-1">นามสกุล</label>
            <input type="text" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล"
                class="w-full px-6 py-3 border border-gray-400 rounded-2xl text-gray-700 placeholder-gray-500 focus:outline-none focus:border-[#929AFF]">
        </div>

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

        <!-- Confirmmpassword Input -->
        <div class="mb-4">
            <label for="confirmmpassword" class="block text-left text-[16px] font-medium mb-1">ยืนยันรหัสผ่าน</label>
            <input type="password" id="confirmmpassword" name="confirmmpassword" placeholder="กรุณากรอกยืนยันรหัสผ่าน"
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
            <p class=" text-[16px]">เข้าสู่ระบบสำหรับใช้งาน <a href="{{ route('login') }}"
                    class="text-[#3F359E] text-[16px] active:text-[#827ea4]">เข้าสู่ระบบ</a>
            </p>
        </div>
    </div>
    @extends('layouts.login&register.script')
@endsection