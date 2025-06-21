{{-- resources/views/assessment/cyberbullying/person_action/form/result.blade.php --}}
@extends('layouts.assessment.cyberbullying.person_action.form.result')
@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8 pb-10">
        <div class="text-center mb-2 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">แบบคัดกรองพฤติกรรมการรังแก</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">ประสบการณ์การกระทำ</p>
                </div>
            </div>
        </div>

        <div class="bg-white w-full max-w-2xl mx-auto rounded-t-[50px] px-6 pt-8 flex flex-col mt-2 pb-6">


            <div class="flex flex-col items-center">
                <div class="flex justify-center mb-4">
                    @if ($percentage == 0)
                        <div class="text-8xl">😊</div>
                    @elseif ($percentage < 25)
                        <div class="text-8xl">🙂</div>
                    @elseif($percentage < 50)
                        <div class="text-8xl">😐</div>
                    @elseif($percentage < 75)
                        <div class="text-8xl">😟</div>
                    @else
                        <div class="text-8xl">😥</div>
                    @endif
                </div>
                
                <div class="mb-8 text-center">
                    <p class="text-xl font-medium text-gray-700">คะแนนของคุณ</p>
                    <p class="text-4xl font-bold text-[#3E36AE] mt-2">{{ $score }} / 36</p>
                </div>

                <div class="w-full max-w-md bg-gray-100 h-4 rounded-full overflow-hidden mb-2">
                    <div class="bg-[#3E36AE] h-full" style="width: {{ $percentage }}%"></div>
                </div>

                <p class="text-center text-gray-600 mb-4">
                    คะแนนของคุณคิดเป็น {{ number_format($percentage, 1) }}%
                </p>

                <div class="border-t border-gray-300 w-full pt-4">
                    <h2 class="text-xl font-medium text-[#3E36AE] mb-2">ผลการประเมิน</h2>
                    @if ($percentage == 0)
                        <p class="text-green-600 font-medium mb-2 text-center">ไม่มีพฤติกรรมการกลั่นแกล้ง</p>
                        <p class="text-gray-600">คำแนะนำ: ยินดีด้วย! คุณไม่มีพฤติกรรมการกลั่นแกล้งผู้อื่นทางอินเทอร์เน็ต</p>
                    @elseif ($percentage < 25)
                        <p class="text-green-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับต่ำ</p>
                        <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับต่ำ ควรระมัดระวังการสื่อสารออนไลน์ของคุณ</p>
                    @elseif($percentage < 50)
                        <p class="text-yellow-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับปานกลาง</p>
                        <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับปานกลาง ควรพิจารณาปรับเปลี่ยนพฤติกรรมการใช้สื่อออนไลน์</p>
                    @elseif($percentage < 75)
                        <p class="text-orange-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับสูง</p>
                        <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับสูง ควรปรึกษาผู้เชี่ยวชาญเพื่อช่วยจัดการพฤติกรรม</p>
                    @else
                        <p class="text-red-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับสูงมาก</p>
                        <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับสูงมาก ควรหาความช่วยเหลือจากผู้เชี่ยวชาญโดยเร็ว</p>
                    @endif
                </div>

                <div class="flex justify-center mt-2">
                    <a href="/assessment/cyberbullying/person_action/form"
                        class="text-base px-6 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF]">
                        ดูรายละเอียดเพิ่มเติม
                    </a>
                </div>
            </div>
        </div>
        <div class="border-b border-gray-300"></div>
        <div class="flex justify-center mt-6">
            <a href="{{ route('main') }}" class="text-lg px-6 py-2 rounded-xl text-white font-medium shadow-md bg-[#c0c0c0]">
                หน้าหลัก
            </a>
        </div>
    </div>
@endsection