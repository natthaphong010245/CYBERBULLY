@extends('layouts.main_category.index')

@section('content')
    <style>
        /* แทนที่ CSS เดิมด้วยโค้ดนี้ */

        .game-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 2px solid #e0e6ed;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        /* แก้ไขส่วนนี้ - เอากรอบออกและให้รูปขยายเต็มพื้นที่ */
        .game-image-container {
            border-radius: 12px 12px 0 0;
            /* ปรับให้โค้งเฉพาะด้านบน */
            margin: -25px -25px 0 -25px;
            /* ขยายไปติดขอบ */
            min-height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-grow: 1;
            background: transparent;
            position: relative;
        }

        .game-image-container img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            /* ใช้ cover เพื่อให้รูปเต็มพื้นที่ */
            border-radius: 12px 12px 0 0 !important;
            /* ปรับให้โค้งเฉพาะด้านบน */
            border: none !important;
            box-shadow: none !important;
            background: none !important;
            display: block !important;
            position: absolute !important;
            top: 0 !important;
            left: 0 !important;
        }

        .game-title-section {
            background: #929AFF;
            margin: 0 -25px -25px -25px;
            padding: 15px 15px 15px 15px;
            border-radius: 0 0 20px 20px;
            min-height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
            /* ให้อยู่เหนือรูปภาพ */
        }

        .game-title-section h3 {
            color: white !important;
            margin: 0;
            line-height: 1.3;
            text-align: center;
        }

        /* ทำให้แต่ละการ์ดมีความสูงเท่ากัน */
        .grid>div {
            display: flex;
            min-height: 280px;
        }

        /* เพิ่ม CSS สำหรับให้รูปภาพปรับขนาดได้ดีขึ้น */
        .game-image-container::before {
            content: '';
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: transparent;
            z-index: 1;
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <div class="text-center mb-16 relative">
            <div class="flex items-center justify-center">
                <div class="relative">
                    <h1 class="text-4xl font-bold text-[#3E36AE] inline-block tracking-[0.2em] mb-2">GAME</h1>
                    <p class="text-base text-[#3E36AE] absolute -bottom-6 right-0">หมวดหมู่</p>
                </div>
            </div>
        </div>


        <!-- Game Grid - 2 columns layout -->
        <div class="grid grid-cols-2 gap-6 md:gap-8 max-w-4xl mx-auto pl-2 pr-2">

            <!-- ปุ่ม 1: พฤติกรรมบนโซเชียลมีเดีย -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_1_1') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/game/game1.png') }}" alt="พฤติกรรมบนโซเชียลมีเดีย"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">ตอบคำถาม</h3>
                </div>
            </div>

            <!-- ปุ่ม 2: โซเนอร์ปลีก -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_2') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/game/game2.png') }}" alt="โซเนอร์ปลีก" class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">เติมคำ</h3>
                </div>
            </div>

            <!-- ปุ่ม 3: หลัก 2 A -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_3') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/game/game3.png') }}" alt="หลัก 2 A"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">หลัก 2 A</h3>
                </div>
            </div>

            <!-- ปุ่ม 4: อันตรายจากพฤติกรรม -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_4_1') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/dangerous_behavior.png') }}" alt="อันตรายจากพฤติกรรม"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">จับคู่</h3>
                </div>
            </div>

            <!-- ปุ่ม 5: การคิดเชิงวิพากษ์ -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_5_1') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/critical_thinking.png') }}" alt="การคิดเชิงวิพากษ์"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">ระบุตัวเลือก</h3>
                </div>
            </div>

            <!-- ปุ่ม 6: สื่อสารได้ดีใน... -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_6') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/communication.png') }}" alt="สื่อสารได้ดี"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">ระบายความรู้สึก</h3>
                </div>
            </div>

            <!-- ปุ่ม 7: จำเจกระแทกจิต -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_7') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/quiz_challenge.png') }}" alt="จำเจกระแทกจิต"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">กล่องสุ่ม</h3>
                </div>
            </div>

            <!-- ปุ่ม 8: มารยาทของการใช้... -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_8') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/digital_etiquette.png') }}" alt="มารยาทของการใช้"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">ผลกระทบผู้รังแก</h3>
                </div>
            </div>

            <!-- ปุ่ม 9: บุคลิกภาพดีออนไลน์ -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_9') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/good_personality.png') }}" alt="บุคลิกภาพดีออนไลน์"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">ผลกระทบผู้ถูกรังแก</h3>
                </div>
            </div>

            <!-- ปุ่ม 10: สังเกตบอร์คัล -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_10') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/observation.png') }}" alt="สังเกตบอร์คัล"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">กฎหมาย CYBERBULLYING</h3>
                </div>
            </div>

            <!-- ปุ่ม 11: ฟิชชิ่ง สแกมมิ่ง -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_11') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/phishing.png') }}" alt="ฟิชชิ่ง สแกมมิ่ง"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">สัญญาณเตือนภัย</h3>
                </div>
            </div>

            <!-- ปุ่ม 12: ข้อมูลส่วนบุคคล -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_12') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/personal_data.png') }}" alt="ข้อมูลส่วนบุคคล"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">รับมือการรังแก</h3>
                </div>
            </div>

            <!-- ปุ่ม 13: วิธีเชื่อมต่อทั่ว -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_13') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/connection.png') }}" alt="วิธีเชื่อมต่อทั่ว"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">รับมือ CYBERBULLYING</h3>
                </div>
            </div>

            <!-- ปุ่ม 14: บทเรียน เชื่อมต่อ -->
            <div class="game-button rounded-3xl p-6 cursor-pointer" onclick="navigateTo('{{ route('game_14') }}')">
                <div class="game-image-container">
                    <img src="{{ asset('images/games/connect_lesson.png') }}" alt="บทเรียน เชื่อมต่อ"
                        class="w-full h-full object-cover">
                </div>
                <div class="game-title-section">
                    <h3 class="font-median text-lg text-center">หลัก C.O.N.N.E.C.T</h3>
                </div>
            </div>

        </div>
    </div>

    <script>
        function navigateTo(url) {
            // เพิ่ม ripple effect
            const button = event.currentTarget;
            const ripple = document.createElement('div');
            ripple.className = 'click-effect';
            button.appendChild(ripple);

            // ลบ effect และนำทาง
            setTimeout(() => {
                ripple.remove();
                window.location.href = url;
            }, 300);
        }

        // เพิ่ม keyboard navigation
        document.addEventListener('keydown', function(e) {
            const buttons = document.querySelectorAll('.game-button');
            const currentActive = document.querySelector('.game-button:focus') || buttons[0];
            let nextIndex = Array.from(buttons).indexOf(currentActive);

            switch (e.key) {
                case 'ArrowRight':
                    nextIndex = nextIndex % 2 === 0 ? nextIndex + 1 : nextIndex + 1;
                    if (nextIndex >= buttons.length) nextIndex = 0;
                    break;
                case 'ArrowLeft':
                    nextIndex = nextIndex % 2 === 1 ? nextIndex - 1 : nextIndex - 1;
                    if (nextIndex < 0) nextIndex = buttons.length - 1;
                    break;
                case 'ArrowDown':
                    nextIndex = Math.min(nextIndex + 2, buttons.length - 1);
                    break;
                case 'ArrowUp':
                    nextIndex = Math.max(nextIndex - 2, 0);
                    break;
                case 'Enter':
                    currentActive.click();
                    return;
            }

            if (nextIndex < buttons.length) {
                buttons[nextIndex].focus();
            }
        });

        // ทำให้ปุ่มสามารถ focus ได้
        document.querySelectorAll('.game-button').forEach((button, index) => {
            button.setAttribute('tabindex', '0');
        });
    </script>
@endsection
