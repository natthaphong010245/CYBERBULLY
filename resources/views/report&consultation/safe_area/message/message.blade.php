@extends('layouts.safe_area.voice.index')

@section('content')
    <div class="bg-white w-full flex-grow rounded-t-[50px] px-6 pt-8 flex flex-col mt-16">
        <div class="text-center mb-4 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-2xl font-bold text-[#3E36AE] inline-block">เราพร้อมที่จะรับฟังคุณเสมอ</h1>
                </div>
            </div>
        </div>

        <form id="messageForm" action="{{ route('safe-area.message.store') }}" method="POST"
            class="flex flex-col items-center p-4">
            @csrf
            <div class="w-full mb-2">
                <textarea name="message" id="message"
                    class="w-full border border-[#929AFF] rounded-lg px-2 py-2 text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#929AFF] resize-y min-h-[150px] leading-tight"
                    placeholder="แชร์ประสบการณ์..." rows="2" required></textarea>
            </div>

            <div class="flex justify-between w-full p-6">
                <a href="{{ route('safe_area') }}"
                    class="w-[45%] py-2 border border-gray-300 text-gray-500 rounded-lg font-medium text-center text-lg">ยกเลิก</a>
                <button type="button" id="submitBtn"
                    class="w-[45%] py-2 bg-[#929AFF] text-white rounded-lg font-medium text-lg">ส่ง</button>
            </div>
        </form>
    </div>

    <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg w-80 overflow-hidden">
            <div id="modalContent">
                <div class="p-5 flex items-center justify-center">
                    <div class="bg-[#929AFF] rounded-full p-2 mb-2 mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#ffffff]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                </div>
                <div class="px-5 pb-4 text-center">
                    <h3 class="text-lg font-semibold text-gray-900">ส่งข้อความ</h3>
                </div>
                <div class="flex flex-col p-4 space-y-2 mb-2">
                    <button id="confirmSend"
                        class="w-full py-2 bg-[#929AFF] rounded-lg text-white font-medium">ตกลง</button>
                    <button id="cancelSend"
                        class="w-full py-2 bg-white border border-gray-300 rounded-lg text-gray-500 font-medium">ยกเลิก</button>
                </div>
            </div>

            <div id="loadingContent" class="p-8 flex flex-col items-center justify-center hidden">
                <div class="flex items-center justify-center mt-8 mb-8">
                    <svg class="animate-spin h-16 w-16 text-[#929AFF]" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@include('layouts.safe_area.message.script')
