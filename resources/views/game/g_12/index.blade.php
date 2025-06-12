{{-- นี่คือหน้า game/g_12/index.blade.php --}}
@extends('layouts.game.dealing_bullying.index')

@section('content')
    <!-- Introduction Modal (shows first) -->
    <div id="intro-modal" class="modal-backdrop fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="modal-content bg-white rounded-2xl shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <h3 class="text-2xl font-bold text-indigo-800">การรับมือการกลั่นแกล้งบนโลกออนไลน์</h3>
            <img src="{{ asset('images/material/school_girl.png') }}" alt="School Girl Character"
                class="w-32 h-auto rounded-full mx-auto mb-4 object-cover">
            <h3 class="text-2xl font-bold text-indigo-800 mb-2">เกมที่ 12</h3>
            <p class="text-lg text-indigo-800 mb-4">เวลาเจอปัญหานักเรียนจะรับมือการรังแกอย่างไร?</p>
            <p class="text-indigo-800 text-xl mb-2 font-bold">เริ่มความก้าวหน้ากันเลย</p>
            <button id="start-game-btn" class="bg-[#929AFF] text-white text-lg py-2 px-8 rounded-xl transition-colors ">
                เริ่ม
            </button>
        </div>
    </div>

    <div class="card-container space-y-6 px-6 md:px-0" id="game-content">
        <div class="text-center mb-8 pl-6 pr-6">
            <h2 class="text-xl font-bold text-indigo-800">เวลาเจอปัญหานักเรียนจะรับมือการรังแกอย่างไร?</h2>
        </div>

        <!-- Animal Choice Grid -->
        <div class="grid grid-cols-2 gap-3 w-full max-w-4xl mx-auto px-4">
            <!-- Tiger -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4"
                style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="tiger">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/tiger.png') }}" alt="Tiger"
                        class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">เสือ</p>
                </div>
            </div>

            <!-- Fox -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4"
                style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="fox">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/fox.png') }}" alt="Fox"
                        class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">จิ้งจอก</p>
                </div>
            </div>

            <!-- Butterfly -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4"
                style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="butterfly">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/butterfly.png') }}" alt="Butterfly"
                        class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">ผีเสื้อ</p>
                </div>
            </div>

            <!-- Rabbit -->
            <div class="animal-card bg-white rounded-xl cursor-pointer transition-all border-2 border-transparent hover:border-indigo-200 flex flex-col items-center justify-center p-4"
                style="box-shadow: 0 0 15px rgba(0,0,0,0.1);" data-animal="rabbit">
                <div class="flex-1 w-full flex items-center justify-center">
                    <img src="{{ asset('images/game/12/rabbit.png') }}" alt="Rabbit"
                        class="w-full h-full object-contain max-h-32">
                </div>
                <div class="mt-3 text-center">
                    <p class="text-indigo-800 font-medium text-sm tracking-wider">กระต่าย</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Animal Modal -->
    <div id="animal-modal"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-30 opacity-0">
        <div class="bg-white rounded-lg shadow-xl p-6 max-w-sm w-full mx-4 text-center">
            <div class="mb-6">
                <!-- Animal Image -->
                <div class="mb-4">
                    <img id="modal-animal-image" src="" alt="" class="w-32 h-32 mx-auto object-contain">
                </div>

                <!-- Animal Name -->
                <h3 id="modal-animal-name" class="text-xl font-bold text-indigo-800 mb-2"></h3>

                <!-- Animal Description -->
                <p id="modal-animal-description" class="text-indigo-800 text-sm leading-relaxed"></p>
            </div>

            <button id="continue-btn"
                class="bg-[#929AFF] text-white font-medium py-2 px-6 rounded-xl transition-colors hover:bg-[#7B85FF]">
                ถัดไป
            </button>
        </div>
    </div>

    @include('layouts.game.script.12.index')
@endsection