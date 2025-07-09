<script>
        function toggleFaqItem(button) {
            const faqItem = button.closest('.faq-item');
            const answer = faqItem.querySelector('.faq-answer');
            const iconPlus = button.querySelector('.icon-plus');
            const iconMinus = button.querySelector('.icon-minus');
            
            const isCurrentlyOpen = answer.classList.contains('active');
            
            if (isCurrentlyOpen) {
                answer.classList.remove('active');
                button.classList.remove('active');
                iconPlus.classList.remove('hidden');
                iconMinus.classList.add('hidden');
            } else {
                answer.classList.add('active');
                button.classList.add('active');
                iconPlus.classList.add('hidden');
                iconMinus.classList.remove('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const allAnswers = document.querySelectorAll('.faq-answer');
            const allQuestions = document.querySelectorAll('.faq-question');
            const allIconsPlus = document.querySelectorAll('.icon-plus');
            const allIconsMinus = document.querySelectorAll('.icon-minus');
            
            allAnswers.forEach(answer => answer.classList.remove('active'));
            allQuestions.forEach(question => question.classList.remove('active'));
            allIconsPlus.forEach(icon => icon.classList.remove('hidden'));
            allIconsMinus.forEach(icon => icon.classList.add('hidden'));
        });
    </script>