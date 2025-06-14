<script>
    document.addEventListener('DOMContentLoaded', function() {
        const introModal = document.getElementById('intro-modal');
        const mainScreen = document.getElementById('main-screen');
        const startGameBtn = document.getElementById('start-game-btn');

        setTimeout(() => {
            introModal.classList.add('modal-show');
            mainScreen.classList.add('game-blur');
        }, 100);

        startGameBtn.addEventListener('click', function() {
            introModal.classList.remove('modal-show');
            introModal.classList.add('modal-fade-out');

            setTimeout(() => {
                introModal.style.display = 'none';
                mainScreen.classList.remove('game-blur');
                mainScreen.classList.add('animate-unblur');
            }, 300);
        });
    });

    const signalData = {
        1: {
            title: "สัญญาณเตือน\n1",
            content: `หลีกหนีสถานการณ์ทางสังคมไม่อยากไปโรงเรียนเก็บตัวไม่อยากสุงสิงกับใครมีมุมมองต่อตัว เองใน แง่ลบ เช่น ฉันอ่อนแอ ไม่มีทางสู้`
        },
         2: {
            title: "สัญญาณเตือน\n2",
            content: `-สามารถไปโรงเรียนได้ปกติ<br>-สดใส ร่าเริง เพราะคิดว่าเราน่าจะฮอตเป็นการ เรียกยอด engagement บนโซเชียล`
        }
    };

    function showSignalDetails(signalNumber) {
        const modal = document.getElementById('signal-modal');
        const numberSpan = document.getElementById('signal-number');
        const contentDiv = document.getElementById('signal-content');

        numberSpan.textContent = signalNumber;
        contentDiv.innerHTML = signalData[signalNumber].content.replace(/\n/g, '<br>');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            modal.classList.add('modal-show');
        }, 10);
    }

    function closeSignalModal() {
        const modal = document.getElementById('signal-modal');
        modal.classList.remove('modal-show');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }

    function selectAnswer(choice) {
        closeSignalModal();

        setTimeout(() => {
            if (choice === 1) {
                showSuccessModal();
            } else {
                showRetryModal();
            }
        }, 500);
    }

    function showSuccessModal() {
        const modal = document.getElementById('success-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            modal.classList.add('modal-show');
        }, 10);
    }

    function showRetryModal() {
        const modal = document.getElementById('retry-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            modal.classList.add('modal-show');
        }, 10);
    }

    function goToMain() {
        window.location.href = "{{ route('game_12') }}";
    }

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-backdrop')) {
            if (e.target.id === 'signal-modal') {
                closeSignalModal();
            }
        }
    });

    document.querySelectorAll('.modal-content').forEach(modal => {
        modal.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
</script>

<style>
    .modal-backdrop {
        backdrop-filter: blur(8px);
        transition: all 0.3s ease;
    }

    .modal-content {
        transform: scale(0.9);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .modal-show .modal-content {
        transform: scale(1);
        opacity: 1;
    }

    .modal-fade-out {
        animation: modalFadeOut 0.3s ease-out forwards;
    }

    .modal-fade-out .modal-content {
        animation: contentScaleOut 0.3s ease-out forwards;
    }

    @keyframes modalFadeOut {
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

    .card-hover {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .card-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
    }

    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.05);
            opacity: 0.8;
        }
    }

    button {
        transition: all 0.2s ease;
    }

    button:hover:not(:disabled) {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    button:active:not(:disabled) {
        transform: translateY(0);
    }

    @media (max-width: 640px) {
        .p-8 {
            padding: 1.5rem;
        }

        .gap-4 {
            gap: 0.75rem;
        }
    }
</style>