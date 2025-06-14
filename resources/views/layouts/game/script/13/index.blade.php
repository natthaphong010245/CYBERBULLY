<script>
        document.addEventListener('DOMContentLoaded', function() {
            const introModal = document.getElementById('intro-modal');
            const gameContent = document.getElementById('game-content');
            const startGameBtn = document.getElementById('start-game-btn');
            const actionModal = document.getElementById('action-modal');
            const summaryModal = document.getElementById('summary-modal');
            const nextBtn = document.getElementById('next-btn');
            const startMainBtn = document.getElementById('start-main-btn');

            const actionsData = {
                'stop': {
                    title: 'หยุดการกระทำทุกอย่าง',
                    description: 'นิ่งเฉยไม่ตอบโต้ เพื่อไม่ให้เกิดการกระทำซ้ำ หรือเพิ่มความรุนแรง ใช้ในในกรณีที่เป็นเหตุการณ์ทะเลาะเบาะแว้งในขั้นเริ่มต้นแล้วค่อยไปปรับความเข้าใจกันภายหลัง เช่น โดนแซวเล็กน้อย',
                    image: "{{ asset('images/game/13/stop.png') }}"
                },
                'remove': {
                    title: 'ลบภาพที่เป็นการระรานออกทันที',
                    description: 'ลบภาพ ข้อความ วิดีโอ ที่เป็นการระรานออกทันที หรืออาจจะติดต่อเจ้าหน้าที่ที่เป็นเจ้าของพื้นที่นั้น เช่น การกดปุ่มรายงานเนื้อหาบน Facebook IG และ TikTok',
                    image: "{{ asset('images/game/13/remove.png') }}"
                },
                'be-strong': {
                    title: 'เข้มแข็ง',
                    description: 'เข้มแข็ง อดทน และมั่นใจในคุณค่าของตนเอง ไม่ให้คุณค่ากับคนหรือคำพูดที่ทำร้ายเรา',
                    image: "{{ asset('images/game/13/be_strong.png') }}"
                },
                'block': {
                    title: 'ปิดกั้นพวกเขาซะ',
                    description: 'บล็อกผู้กลั่นแกล้ง เพื่อไม่ให้ถูกกระทำซ้ำ',
                    image: "{{ asset('images/game/13/block.png') }}"
                },
                'tell': {
                    title: 'บอกบุคคลที่ไว้ใจได้',
                    description: 'บอกผู้ปกครอง ครู หรือบุคคลที่ไว้ใจเพื่อขอความช่วยเหลือ และแคปเก็บบันทึกหลักฐาน',
                    image: "{{ asset('images/game/13/tell.png') }}"
                }
            };

            const actionOrder = ['stop', 'remove', 'be-strong', 'block', 'tell'];
            let viewedActions = new Set();
            let currentAction = '';

            setTimeout(() => {
                introModal.classList.add('animate-modal-show');
                gameContent.classList.add('game-blur');
            }, 100);

            startGameBtn.addEventListener('click', function() {
                introModal.classList.remove('animate-modal-show');
                introModal.classList.add('animate-modal-fade-out');

                setTimeout(() => {
                    introModal.style.display = 'none';
                    gameContent.classList.remove('game-blur');
                    gameContent.classList.add('animate-unblur');
                }, 300);
            });

            document.querySelectorAll('.action-card').forEach(card => {
                card.addEventListener('click', function() {
                    const action = this.getAttribute('data-action') || this.querySelector(
                        '.action-card-inner').getAttribute('data-action');
                    if (action) {
                        showActionModal(action);
                    }
                });
            });

            nextBtn.addEventListener('click', function() {
                hideModal(actionModal);

                viewedActions.add(currentAction);
                markActionAsViewed(currentAction);

                if (viewedActions.size === actionOrder.length) {
                    setTimeout(() => {
                        showSummaryModal();
                    }, 500);
                }
            });

            startMainBtn.addEventListener('click', function() {
                window.location.href = "{{ route('game_14') }}";
            });

            function showActionModal(action) {
                const data = actionsData[action];

                currentAction = action;

                document.getElementById('modal-action-image').src = data.image;
                document.getElementById('modal-action-image').alt = data.title;
                document.getElementById('modal-action-title').textContent = data.title;
                document.getElementById('modal-action-description').textContent = data.description;

                actionModal.classList.remove('hidden');
                actionModal.classList.add('show-modal');
            }

            function showSummaryModal() {
                summaryModal.classList.remove('hidden');
                summaryModal.classList.add('show-modal');
            }

            function hideModal(modal) {
                modal.classList.remove('show-modal');
                modal.classList.add('hide-modal');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('hide-modal');
                }, 300);
            }

            function markActionAsViewed(action) {
                const cards = document.querySelectorAll('.action-card');
                cards.forEach(card => {
                    const cardAction = card.getAttribute('data-action') ||
                        card.querySelector('.action-card-inner').getAttribute('data-action');
                    if (cardAction === action) {
                        const cardInner = card.querySelector('.action-card-inner');
                        if (cardInner) {
                            cardInner.classList.add('viewed');
                        }
                    }
                });
            }

            [actionModal, summaryModal].forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        hideModal(this);
                    }
                });
            });
        });
    </script>

    <style>
        .container {
            max-width: 400px;
        }

        .action-card {
            cursor: pointer;
        }

        .action-card-inner {
            background: white;
            border: 1.5px solid #E2E8F0;
            border-radius: 16px;
            padding: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 120px;
        }

        .action-card-inner:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.20);
            border-color: #CBD5E0;
        }

        .action-card-inner.viewed {
            border-color: #8b5cf6;
            background: #F7FAFC;
        }

        .action-image {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .modal-icon-container {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
        }

        .modal-action-icon {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .summary-icon {
            width: 100px;
            height: auto;
            object-fit: contain;
        }

        .show-modal {
            animation: backdropFadeIn 0.3s ease-in-out forwards;
        }

        .show-modal>div {
            animation: contentScaleIn 0.4s ease-out 0.1s both;
        }

        .hide-modal {
            animation: backdropFadeOut 0.3s ease-in-out forwards;
        }

        .hide-modal>div {
            animation: contentScaleOut 0.3s ease-in forwards;
        }

        @keyframes backdropFadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes backdropFadeOut {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes contentScaleIn {
            0% {
                opacity: 0;
                transform: scale(0.7);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes contentScaleOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.7);
            }
        }

        .animate-modal-show .modal-content {
            animation: contentSlideIn 0.4s ease-out forwards;
        }

        .animate-modal-fade-out {
            animation: backdropFadeOut 0.3s ease-out forwards;
        }

        .animate-modal-fade-out .modal-content {
            animation: contentScaleOut 0.3s ease-out forwards;
        }

        @keyframes contentSlideIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes backdropFadeOut {
            0% {
                background-color: rgba(0, 0, 0, 0.4);
            }

            100% {
                background-color: rgba(0, 0, 0, 0);
                visibility: hidden;
            }
        }

        @keyframes contentScaleOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 0;
                transform: scale(0.3);
            }
        }

        .game-blur {
            filter: blur(3px);
            transition: filter 0.3s ease-out;
            transform: scale(1.02);
        }

        .animate-unblur {
            animation: unblurGame 0.4s ease-out forwards;
        }

        @keyframes unblurGame {
            0% {
                filter: blur(3px);
                transform: scale(1.02);
            }

            100% {
                filter: blur(0px);
                transform: scale(1);
            }
        }

        @media (max-width: 640px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .action-card-inner {
                padding: 4px;
                min-height: 150px;
            }

            .action-image {
                width: 140px;
                height: 140px;
            }

            .modal-icon-container {
                width: auto;
                height: 140px;
            }

            .modal-action-icon {
                width: 200px;
                height: 200px;
            }
        }
    </style>