{{-- resources/views/assessment/cyberbulling/overview/form/result.blade.php --}}
@extends('layouts.assessment.cyberbulling.overview.form.result')
@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8 pb-10">
        <div class="text-center mb-10 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">คัดกรองพฤติกรรมการรังแก</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">ผลการประเมินภาพรวม</p>
                </div>
            </div>
        </div>

        <div class="bg-white w-full max-w-2xl mx-auto rounded-t-[50px] px-2 pt-2 flex flex-col pb-10">
            <div class="border-b border-gray-300 mb-2"></div>

            <h2 class="text-base font-bold text-[#3E36AE] ">ส่วนที่ 1: ประสบการณ์การกระทำ</h2>
            <div class=" rounded-lg">
                <div class="flex justify-center">
                    <button id="togglePersonAction" class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                        รายละเอียดเพิ่มเติม
                    </button>
                </div>
            </div>
            
            <div id="personActionDetails" class="overflow-hidden transition-all duration-700 ease-in-out" style="max-height: 0; opacity: 0;">
                <div class="mt-4 bg-gray-100 rounded-lg p-4">
                    <div class="flex justify-center mb-2">
                        @if ($personActionPercentage == 0)
                            <div class="text-8xl">😊</div>
                        @elseif ($personActionPercentage < 25)
                            <div class="text-8xl">🙂</div>
                        @elseif($personActionPercentage < 50)
                            <div class="text-8xl">😐</div>
                        @elseif($personActionPercentage < 75)
                            <div class="text-8xl">😟</div>
                        @else
                            <div class="text-8xl">😥</div>
                        @endif
                    </div>

                    <div class="mb-6 mt-6 text-center">
                        <p class="text-xl font-medium text-gray-700">คะแนนของคุณ</p>
                        <p class="text-4xl font-bold text-[#3E36AE] mt-2">{{ $personActionScore }} / 36</p>
                    </div>

                    <div class="w-full max-w-md bg-white h-4 rounded-full overflow-hidden mb-4 mx-auto">
                        <div class="bg-[#3E36AE] h-full" style="width: {{ $personActionPercentage }}%"></div>
                    </div>

                    <p class="text-center text-gray-600 mb-2">
                        คะแนนของคุณคิดเป็น {{ number_format($personActionPercentage, 1) }}%
                    </p>

                    <div class="w-full pt-2">
                        <h3 class="text-lg font-medium text-[#3E36AE] mb-2">ผลการประเมิน</h3>
                        @if ($personActionPercentage == 0)
                            <p class="text-green-600 font-medium mb-2 text-center">ไม่มีพฤติกรรมการกลั่นแกล้ง</p>
                            <p class="text-gray-600">คำแนะนำ: ยินดีด้วย! คุณไม่มีพฤติกรรมการกลั่นแกล้งผู้อื่นทางอินเทอร์เน็ต</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @elseif ($personActionPercentage < 25)
                            <p class="text-green-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับต่ำ</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับต่ำ ควรระมัดระวังการสื่อสารออนไลน์ของคุณ</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @elseif($personActionPercentage < 50)
                            <p class="text-yellow-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับปานกลาง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับปานกลาง ควรพิจารณาปรับเปลี่ยนพฤติกรรมการใช้สื่อออนไลน์</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @elseif($personActionPercentage < 75)
                            <p class="text-orange-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับสูง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับสูง ควรปรึกษาผู้เชี่ยวชาญเพื่อช่วยจัดการพฤติกรรม</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @else
                            <p class="text-red-600 font-medium mb-2 text-center">มีพฤติกรรมการกลั่นแกล้ง ระดับสูงมาก</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีพฤติกรรมการกลั่นแกล้งในระดับสูงมาก ควรหาความช่วยเหลือจากผู้เชี่ยวชาญโดยเร็ว</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @endif
                    </div>
                    

                    <div class="flex justify-center mt-2">
                        <button id="hidePersonAction" class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                            ซ่อนรายละเอียด
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-300 my-2"></div>

            <h2 class="text-base font-bold text-[#3E36AE]">ส่วนที่ 2: ประสบการณ์การถูกกระทำ</h2>
            <div class=" rounded-lg">
                <div class="flex justify-center">
                    <button id="toggleVictim" class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                        รายละเอียดเพิ่มเติม
                    </button>
                </div>
            </div>
            
            <div id="victimDetails" class="overflow-hidden transition-all duration-700 ease-in-out" style="max-height: 0; opacity: 0;">
                <div class="mt-4 bg-gray-100 rounded-lg p-4">
                    <div class="flex justify-center mb-2">
                        @if ($victimPercentage == 0)
                            <div class="text-8xl">😊</div>
                        @elseif ($victimPercentage < 25)
                            <div class="text-8xl">🙂</div>
                        @elseif($victimPercentage < 50)
                            <div class="text-8xl">😐</div>
                        @elseif($victimPercentage < 75)
                            <div class="text-8xl">😟</div>
                        @else
                            <div class="text-8xl">😥</div>
                        @endif
                    </div>

                    <div class="mb-6 mt-6 text-center">
                        <p class="text-xl font-medium text-gray-700">คะแนนของคุณ</p>
                        <p class="text-4xl font-bold text-[#3E36AE] mt-2">{{ $victimScore }} / 36</p>
                    </div>

                    <div class="w-full max-w-md white h-4 rounded-full overflow-hidden mb-4 mx-auto">
                        <div class="bg-[#3E36AE] h-full" style="width: {{ $victimPercentage }}%"></div>
                    </div>

                    <p class="text-center text-gray-600 mb-2">
                        คะแนนของคุณคิดเป็น {{ number_format($victimPercentage, 1) }}%
                    </p>

                    <div class="w-full pt-2">
                        <h3 class="text-lg font-medium text-[#3E36AE] mb-2">ผลการประเมิน</h3>
                        @if ($victimPercentage == 0)
                            <p class="text-green-600 font-medium mb-2 text-center">ไม่มีประสบการณ์การถูกกลั่นแกล้ง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณไม่มีประสบการณ์การถูกกลั่นแกล้งทางอินเทอร์เน็ต</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @elseif ($victimPercentage < 25)
                            <p class="text-green-600 font-medium mb-2 text-center">มีประสบการณ์การถูกกลั่นแกล้ง ระดับต่ำ</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีประสบการณ์การถูกกลั่นแกล้งในระดับต่ำ ให้ระวังการใช้งานออนไลน์</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @elseif($victimPercentage < 50)
                            <p class="text-yellow-600 font-medium mb-2 text-center">มีประสบการณ์การถูกกลั่นแกล้ง ระดับปานกลาง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีประสบการณ์การถูกกลั่นแกล้งในระดับปานกลาง ควรพิจารณาปรับการใช้สื่อออนไลน์</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @elseif($victimPercentage < 75)
                            <p class="text-orange-600 font-medium mb-2 text-center">มีประสบการณ์การถูกกลั่นแกล้ง ระดับสูง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีประสบการณ์การถูกกลั่นแกล้งในระดับสูง ควรปรึกษาผู้ใหญ่ที่คุณไว้ใจ</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @else
                            <p class="text-red-600 font-medium mb-2 text-center">มีประสบการณ์การถูกกลั่นแกล้ง ระดับสูงมาก</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีประสบการณ์การถูกกลั่นแกล้งในระดับสูงมาก ควรรีบหาความช่วยเหลือจากผู้เชี่ยวชาญทันที</p>
                            <div class="flex justify-center mt-5 mb-5">
                                <a href="/assessment/cyberbulling/overview/form"
                                    class="text-base px-10 py-2 rounded-xl text-white font-medium shadow-md bg-[#929AFF] transition-all duration-300 hover:bg-[#7B84FC]">
                                    คำแนะนำเพิ่มเติม
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex justify-center mt-2">
                        <button id="hideVictim" class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                            ซ่อนรายละเอียด
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-300 w-full pt-6 mt-2">
                <h2 class="text-base font-bold text-[#3E36AE] mb-4">สรุปผลการประเมินภาพรวม</h2>
                <div class="bg-gray-100 p-4 rounded-lg">
                    @if ($personActionPercentage > $victimPercentage)
                        <p class="text-base font-bold mb-2">คุณมีแนวโน้มเป็นผู้กระทำการรังแกมากกว่าเป็นผู้ถูกกระทำ</p>
                    @elseif ($victimPercentage > $personActionPercentage)
                        <p class="text-base font-medium mb-2">คุณมีแนวโน้มเป็นผู้ถูกกระทำมากกว่าเป็นผู้กระทำการรังแก</p>
                    @else
                        <p class="text-base font-medium mb-2">คุณมีประสบการณ์ทั้งการกระทำและถูกกระทำในระดับที่ใกล้เคียงกัน</p>
                    @endif

                    @if ($personActionPercentage >= 50 || $victimPercentage >= 50)
                        <p class="text-red-600 text-base font-medium">ควรปรึกษาผู้เชี่ยวชาญเพื่อรับคำแนะนำเพิ่มเติม</p>
                    @elseif ($personActionPercentage >= 25 || $victimPercentage >= 25)
                        <p class="text-yellow-600 text-base font-medium">ควรปรับพฤติกรรมและระมัดระวังการใช้สื่อสังคมออนไลน์</p>
                    @else
                        <p class="text-green-600 text-base font-medium">คุณมีพฤติกรรมการใช้สื่อสังคมออนไลน์ที่ดี ควรรักษาไว้</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-b border-gray-300 mb-4"></div>
        <div class="flex justify-center mt-5">
            <a href="{{ route('main') }}" class="text-lg px-8 py-3 rounded-xl text-white font-medium shadow-md bg-[#c0c0c0] transition-all duration-300 hover:bg-gray-400">
                กลับหน้าหลัก
            </a>
        </div>
    </div>

    <style>
        .slide-in {
            max-height: 2000px !important;
            opacity: 1 !important;
            transition: all 0.7s ease-in-out !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePersonAction = document.getElementById('togglePersonAction');
            const hidePersonAction = document.getElementById('hidePersonAction');
            const personActionDetails = document.getElementById('personActionDetails');
            
            togglePersonAction.addEventListener('click', function() {
                togglePersonAction.style.display = 'none';
                
                personActionDetails.classList.add('slide-in');
            });
            
            hidePersonAction.addEventListener('click', function() {
                personActionDetails.classList.remove('slide-in');
                personActionDetails.style.maxHeight = '0';
                personActionDetails.style.opacity = '0';
                
                togglePersonAction.style.display = 'block';
            });
            
            const toggleVictim = document.getElementById('toggleVictim');
            const hideVictim = document.getElementById('hideVictim');
            const victimDetails = document.getElementById('victimDetails');
            
            toggleVictim.addEventListener('click', function() {
                toggleVictim.style.display = 'none';
                
                victimDetails.classList.add('slide-in');
            });
            
            hideVictim.addEventListener('click', function() {
                victimDetails.classList.remove('slide-in');
                victimDetails.style.maxHeight = '0';
                victimDetails.style.opacity = '0';
                
                toggleVictim.style.display = 'block';
            });
        });
    </script>
@endsection