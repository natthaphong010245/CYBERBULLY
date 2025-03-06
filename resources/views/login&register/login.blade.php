@extends('layouts.login&register.index')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-10 pt-8 flex flex-col mt-16">
        <h1 class="text-center mb-6 text-[#3F359E] text-[24px] font-bold">
            เข้าสู่ระบบ
        </h1>

        <!-- Modal แจ้งเตือนข้อผิดพลาด -->
        @if($errors->has('username') && $errors->first('username') == 'คุณไม่มีสิทธิ์เข้าถึงระบบ')
        <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-2xl p-6 max-w-sm mx-4 text-center">
                <div class="text-red-500 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-800">ขออภัย</h3>
                <p class="mb-2 text-gray-600">คุณไม่มีสิทธิ์เข้าถึงระบบ</p>
                <p class="mb-6 text-gray-600">รอเจ้าหน้าที่ตรวจสอบคำขอ</p>
                <button id="closeErrorModal" class="bg-[#929AFF] hover:bg-[#7B84EA] text-white py-2 px-6 rounded-xl text-center transition duration-300 w-full font-bold">
                    ตกลง
                </button>
            </div>
        </div>
        @endif

        <!-- Modal แจ้งเตือนสำเร็จ (จากหน้าลงทะเบียน) -->
        @if(session('success'))
        <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-2xl p-6 max-w-sm mx-4 text-center">
                <div class="text-green-500 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-800">ลงทะเบียนสำเร็จ!</h3>
                <p class="mb-6 text-gray-600">{{ session('success') }}</p>
                <button id="closeSuccessModal" class="bg-[#929AFF] hover:bg-[#7B84EA] text-white py-2 px-6 rounded-xl text-center transition duration-300 w-full font-bold">
                    ตกลง
                </button>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf

            <!-- Username Input -->
            <div class="mb-4">
                <label for="username" class="block text-left text-[16px] font-medium mb-1">ชื่อผู้ใช้</label>
                <input type="text" id="username" name="username" placeholder="กรุณากรอกชื่อผู้ใช้" value="{{ old('username') }}"
                    class="w-full px-6 py-3 border {{ $errors->has('username') ? 'border-red-500' : 'border-gray-400' }} rounded-2xl text-gray-700 placeholder-gray-500 focus:outline-none focus:border-[#929AFF]">
                @if($errors->has('username') && $errors->first('username') != 'คุณไม่มีสิทธิ์เข้าถึงระบบ')
                    <div class="flex items-center mt-1 text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm">{{ $errors->first('username') }}</span>
                    </div>
                @endif
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-left text-[16px] font-medium mb-1">รหัสผ่าน</label>
                <input type="password" id="password" name="password" placeholder="กรุณากรอกรหัสผ่าน"
                    class="w-full px-6 py-3 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-400' }} rounded-2xl text-gray-700 placeholder-gray-500 focus:outline-none focus:border-[#929AFF]">
                @if($errors->has('password'))
                    <div class="flex items-center mt-1 text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm">{{ $errors->first('password') }}</span>
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-[#929AFF] hover:bg-[#7B84EA] text-white py-2.5 px-6 rounded-2xl text-center transition mt-6 duration-300 w-[100%] mx-auto text-[20px] font-bold">
                เข้าสู่ระบบ
            </button>
        </form>

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

    <!-- JavaScript for modal control -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // สำหรับ modal แจ้งเตือนข้อผิดพลาด
            const errorModal = document.getElementById('errorModal');
            const closeErrorButton = document.getElementById('closeErrorModal');
            
            if (closeErrorButton) {
                closeErrorButton.addEventListener('click', function() {
                    errorModal.classList.add('hidden');
                });
            }
            
            // สำหรับ modal แจ้งเตือนสำเร็จ
            const successModal = document.getElementById('successModal');
            const closeSuccessButton = document.getElementById('closeSuccessModal');
            
            if (closeSuccessButton) {
                closeSuccessButton.addEventListener('click', function() {
                    successModal.classList.add('hidden');
                });
            }
        });
    </script>
@endsection