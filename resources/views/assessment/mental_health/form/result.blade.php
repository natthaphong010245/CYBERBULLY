@extends('layouts.assessment.mental_health.form.result')
@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-8 pb-10">
        <div class="text-center mb-10 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">ผลการประเมินสุขภาพจิต</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">ภาวะสุขภาพจิตภาพรวม</p>
                </div>
            </div>
        </div>

        <div class="bg-white w-full max-w-2xl mx-auto rounded-t-[50px] px-2 pt-2 flex flex-col pb-10">
            <div class="border-b border-gray-300 mb-2"></div>

            <h2 class="text-base font-bold text-[#3E36AE]">ส่วนที่ 1: ด้านความเครียด</h2>
            <div class="rounded-lg">
                <div class="flex justify-center">
                    <button id="toggleStress"
                        class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                        รายละเอียดเพิ่มเติม
                    </button>
                </div>
            </div>

            <div id="stressDetails" class="overflow-hidden transition-all duration-700 ease-in-out"
                style="max-height: 0; opacity: 0;">
                <div class="mt-4 bg-gray-100 rounded-lg p-4">
                    <div class="flex justify-center mb-2">
                        @if ($stressScore <= 7)
                            <div class="text-8xl">😊</div>
                        @elseif ($stressScore <= 9)
                            <div class="text-8xl">🙂</div>
                        @elseif($stressScore <= 12)
                            <div class="text-8xl">😐</div>
                        @elseif($stressScore <= 16)
                            <div class="text-8xl">😟</div>
                        @else
                            <div class="text-8xl">😥</div>
                        @endif
                    </div>

                    <div class="mb-6 mt-6 text-center">
                        <p class="text-xl font-medium text-gray-700">คะแนนด้านความเครียด</p>
                        <p class="text-4xl font-bold text-[#3E36AE] mt-2">{{ $stressScore }} / 21</p>
                    </div>

                    <div class="w-full max-w-md bg-white h-4 rounded-full overflow-hidden mb-4 mx-auto">
                        <div class="bg-[#3E36AE] h-full" style="width: {{ min(($stressScore / 21) * 100, 100) }}%"></div>
                    </div>

                    <div class="w-full pt-2">
                        <h3 class="text-lg font-medium text-[#3E36AE] mb-2">ผลการประเมิน</h3>
                        @if ($stressScore <= 7)
                            <p class="text-green-600 font-medium mb-2 text-center">ระดับปกติ</p>
                            <p class="text-gray-600">คำแนะนำ: ภาวะความเครียดของคุณอยู่ในระดับปกติ</p>
                        @elseif ($stressScore <= 9)
                            <p class="text-green-600 font-medium mb-2 text-center">ระดับเล็กน้อย</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะความเครียดในระดับเล็กน้อย ควรหาเวลาผ่อนคลาย</p>
                        @elseif($stressScore <= 12)
                            <p class="text-yellow-600 font-medium mb-2 text-center">ระดับปานกลาง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะความเครียดในระดับปานกลาง ควรฝึกการจัดการความเครียด
                            </p>
                        @elseif($stressScore <= 16)
                            <p class="text-orange-600 font-medium mb-2 text-center">ระดับรุนแรง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะความเครียดในระดับรุนแรง ควรปรึกษาผู้เชี่ยวชาญ</p>
                        @else
                            <p class="text-red-600 font-medium mb-2 text-center">ระดับรุนแรงมาก</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะความเครียดในระดับรุนแรงมาก ควรพบผู้เชี่ยวชาญโดยเร็ว
                            </p>
                        @endif
                    </div>

                    <div class="flex justify-center mt-2">
                        <button id="hideStress"
                            class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                            ซ่อนรายละเอียด
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-300 my-2"></div>

            <h2 class="text-base font-bold text-[#3E36AE]">ส่วนที่ 2: ภาวะวิตกกังวล</h2>
            <div class="rounded-lg">
                <div class="flex justify-center">
                    <button id="toggleAnxiety"
                        class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                        รายละเอียดเพิ่มเติม
                    </button>
                </div>
            </div>

            <div id="anxietyDetails" class="overflow-hidden transition-all duration-700 ease-in-out"
                style="max-height: 0; opacity: 0;">
                <div class="mt-4 bg-gray-100 rounded-lg p-4">
                    <div class="flex justify-center mb-2">
                        @if ($anxietyScore <= 3)
                            <div class="text-8xl">😊</div>
                        @elseif ($anxietyScore <= 5)
                            <div class="text-8xl">🙂</div>
                        @elseif($anxietyScore <= 7)
                            <div class="text-8xl">😐</div>
                        @elseif($anxietyScore <= 9)
                            <div class="text-8xl">😟</div>
                        @else
                            <div class="text-8xl">😥</div>
                        @endif
                    </div>

                    <div class="mb-6 mt-6 text-center">
                        <p class="text-xl font-medium text-gray-700">คะแนนภาวะวิตกกังวล</p>
                        <p class="text-4xl font-bold text-[#3E36AE] mt-2">{{ $anxietyScore }} / 21</p>
                    </div>

                    <div class="w-full max-w-md white h-4 rounded-full overflow-hidden mb-4 mx-auto">
                        <div class="bg-[#3E36AE] h-full" style="width: {{ min(($anxietyScore / 21) * 100, 100) }}%"></div>
                    </div>

                    <div class="w-full pt-2">
                        <h3 class="text-lg font-medium text-[#3E36AE] mb-2">ผลการประเมิน</h3>
                        @if ($anxietyScore <= 3)
                            <p class="text-green-600 font-medium mb-2 text-center">ระดับปกติ</p>
                            <p class="text-gray-600">คำแนะนำ: ภาวะวิตกกังวลของคุณอยู่ในระดับปกติ</p>
                        @elseif ($anxietyScore <= 5)
                            <p class="text-green-600 font-medium mb-2 text-center">ระดับเล็กน้อย</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะวิตกกังวลในระดับเล็กน้อย ควรหาเวลาผ่อนคลาย</p>
                        @elseif($anxietyScore <= 7)
                            <p class="text-yellow-600 font-medium mb-2 text-center">ระดับปานกลาง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะวิตกกังวลในระดับปานกลาง ควรฝึกการจัดการความวิตกกังวล
                            </p>
                        @elseif($anxietyScore <= 9)
                            <p class="text-orange-600 font-medium mb-2 text-center">ระดับรุนแรง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะวิตกกังวลในระดับรุนแรง ควรปรึกษาผู้เชี่ยวชาญ</p>
                        @else
                            <p class="text-red-600 font-medium mb-2 text-center">ระดับรุนแรงมาก</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะวิตกกังวลในระดับรุนแรงมาก ควรพบผู้เชี่ยวชาญโดยเร็ว
                            </p>
                        @endif
                    </div>

                    <div class="flex justify-center mt-2">
                        <button id="hideAnxiety" 
                            class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                            ซ่อนรายละเอียด
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-300 my-2"></div>

            <h2 class="text-base font-bold text-[#3E36AE]">ส่วนที่ 3: ภาวะซึมเศร้า</h2>
            <div class="rounded-lg">
                <div class="flex justify-center">
                    <button id="toggleDepression"
                        class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                        รายละเอียดเพิ่มเติม
                    </button>
                </div>
            </div>

            <div id="depressionDetails" class="overflow-hidden transition-all duration-700 ease-in-out"
                style="max-height: 0; opacity: 0;">
                <div class="mt-4 bg-gray-100 rounded-lg p-4">
                    <div class="flex justify-center mb-2">
                        @if ($depressionScore <= 4)
                            <div class="text-8xl">😊</div>
                        @elseif ($depressionScore <= 6)
                            <div class="text-8xl">🙂</div>
                        @elseif($depressionScore <= 10)
                            <div class="text-8xl">😐</div>
                        @elseif($depressionScore <= 13)
                            <div class="text-8xl">😟</div>
                        @else
                            <div class="text-8xl">😥</div>
                        @endif
                    </div>

                    <div class="mb-6 mt-6 text-center">
                        <p class="text-xl font-medium text-gray-700">คะแนนภาวะซึมเศร้า</p>
                        <p class="text-4xl font-bold text-[#3E36AE] mt-2">{{ $depressionScore }} / 21</p>
                    </div>

                    <div class="w-full max-w-md bg-white h-4 rounded-full overflow-hidden mb-4 mx-auto">
                        <div class="bg-[#3E36AE] h-full" style="width: {{ min(($depressionScore / 21) * 100, 100) }}%">
                        </div>
                    </div>

                    <div class="w-full pt-2">
                        <h3 class="text-lg font-medium text-[#3E36AE] mb-2">ผลการประเมิน</h3>
                        @if ($depressionScore <= 4)
                            <p class="text-green-600 font-medium mb-2 text-center">ระดับปกติ</p>
                            <p class="text-gray-600">คำแนะนำ: ภาวะซึมเศร้าของคุณอยู่ในระดับปกติ</p>
                        @elseif ($depressionScore <= 6)
                            <p class="text-green-600 font-medium mb-2 text-center">ระดับเล็กน้อย</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะซึมเศร้าในระดับเล็กน้อย
                                ควรหากิจกรรมที่ทำให้มีความสุข</p>
                        @elseif($depressionScore <= 10)
                            <p class="text-yellow-600 font-medium mb-2 text-center">ระดับปานกลาง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะซึมเศร้าในระดับปานกลาง
                                ควรปรึกษาเพื่อนสนิทหรือคนในครอบครัว</p>
                        @elseif($depressionScore <= 13)
                            <p class="text-orange-600 font-medium mb-2 text-center">ระดับรุนแรง</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะซึมเศร้าในระดับรุนแรง ควรปรึกษาผู้เชี่ยวชาญ</p>
                        @else
                            <p class="text-red-600 font-medium mb-2 text-center">ระดับรุนแรงมาก</p>
                            <p class="text-gray-600">คำแนะนำ: คุณมีภาวะซึมเศร้าในระดับรุนแรงมาก ควรพบผู้เชี่ยวชาญโดยเร็ว
                            </p>
                        @endif
                    </div>

                    <div class="flex justify-center mt-2">
                        <button id="hideDepression"
                            class="text-sm px-6 py-2 rounded-xl text-gray-700 font-medium transition-all duration-300 underline">
                            ซ่อนรายละเอียด
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-300 w-full pt-6 mt-2">
                <h2 class="text-base font-bold text-[#3E36AE] mb-4">สรุปผลการประเมินภาพรวม</h2>
                <div class="bg-gray-100 p-4 rounded-lg">
                    @php
                        $totalScore = $stressScore + $anxietyScore + $depressionScore;
                        $maxScore = 63; 
                        $percentScore = ($totalScore / $maxScore) * 100;

                        $highestArea = 'ความเครียด';
                        $highestScore = $stressScore;

                        if ($anxietyScore > $highestScore) {
                            $highestArea = 'ภาวะวิตกกังวล';
                            $highestScore = $anxietyScore;
                        }

                        if ($depressionScore > $highestScore) {
                            $highestArea = 'ภาวะซึมเศร้า';
                            $highestScore = $depressionScore;
                        }
                    @endphp

                    <p class="text-base font-medium mb-2">คะแนนรวมทั้งหมด: {{ $totalScore }} / {{ $maxScore }}
                        ({{ number_format($percentScore, 1) }}%)</p>

                    <p class="text-base font-medium mb-2">ด้านที่มีคะแนนสูงสุด: {{ $highestArea }}</p>

                    @if ($stressScore > 12 || $anxietyScore > 7 || $depressionScore > 10)
                        <p class="text-red-600 text-base font-medium">ควรปรึกษาผู้เชี่ยวชาญเพื่อรับคำแนะนำเพิ่มเติม</p>
                    @elseif ($stressScore > 9 || $anxietyScore > 5 || $depressionScore > 6)
                        <p class="text-yellow-600 text-base font-medium">ควรจัดการความเครียดและหาวิธีผ่อนคลาย</p>
                    @else
                        <p class="text-green-600 text-base font-medium">สุขภาพจิตของคุณอยู่ในเกณฑ์ดี</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="border-b border-gray-300 mb-4"></div>
        <div class="flex justify-center mt-5">
            <a href="{{ route('main') }}"
                class="text-lg px-8 py-3 rounded-xl text-white font-medium shadow-md bg-[#c0c0c0] transition-all duration-300 hover:bg-gray-400">
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
            const toggleStress = document.getElementById('toggleStress');
            const hideStress = document.getElementById('hideStress');
            const stressDetails = document.getElementById('stressDetails');

            toggleStress.addEventListener('click', function() {
                toggleStress.style.display = 'none';

                stressDetails.classList.add('slide-in');
            });

            hideStress.addEventListener('click', function() {
                stressDetails.classList.remove('slide-in');
                stressDetails.style.maxHeight = '0';
                stressDetails.style.opacity = '0';

                toggleStress.style.display = 'block';
            });

            const toggleAnxiety = document.getElementById('toggleAnxiety');
            const hideAnxiety = document.getElementById('hideAnxiety');
            const anxietyDetails = document.getElementById('anxietyDetails');

            toggleAnxiety.addEventListener('click', function() {
                toggleAnxiety.style.display = 'none';

                anxietyDetails.classList.add('slide-in');
            });

            hideAnxiety.addEventListener('click', function() {
                anxietyDetails.classList.remove('slide-in');
                anxietyDetails.style.maxHeight = '0';
                anxietyDetails.style.opacity = '0';

                toggleAnxiety.style.display = 'block';
            });

            const toggleDepression = document.getElementById('toggleDepression');
            const hideDepression = document.getElementById('hideDepression');
            const depressionDetails = document.getElementById('depressionDetails');

            toggleDepression.addEventListener('click', function() {
                toggleDepression.style.display = 'none';

                depressionDetails.classList.add('slide-in');
            });

            hideDepression.addEventListener('click', function() {
                depressionDetails.classList.remove('slide-in');
                depressionDetails.style.maxHeight = '0';
                depressionDetails.style.opacity = '0';

                toggleDepression.style.display = 'block';
            });
        });
    </script>
@endsection
