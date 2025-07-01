<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('.accordion-button');
        
        accordionButtons.forEach(button => {
            const content = button.nextElementSibling;
            const arrow = button.querySelector('svg');
            const contentInner = content.querySelector('div');
            
            button.addEventListener('click', function() {
                const isOpen = content.style.maxHeight;
                
                if (isOpen) {
                    closeAccordion(content, button, arrow);
                } else {
                    openAccordion(content, button, arrow, contentInner);
                }
            });
        });
        
        function closeAccordion(content, button, arrow) {
            content.style.maxHeight = null;
            content.style.borderLeft = '';
            content.style.borderRight = '';
            content.style.borderBottom = '';
            
            resetButtonStyles(button);
            updateArrow(arrow, 'down');
        }
        
        function openAccordion(content, button, arrow, contentInner) {
            content.style.maxHeight = contentInner.offsetHeight + "px";
            
            setActiveButtonStyles(button);
            updateArrow(arrow, 'up');
        }
        
        function resetButtonStyles(button) {
            button.style.backgroundColor = '';
            button.style.color = '';
            button.style.border = '';
            button.style.borderRadius = '';
        }
        
        function setActiveButtonStyles(button) {
            button.style.backgroundColor = 'white';
            button.style.color = '#3E36AE';
            button.style.border = '1px solid #3E36AE';
            button.style.borderBottomLeftRadius = '0';
            button.style.borderBottomRightRadius = '0';
        }
        
        function updateArrow(arrow, direction) {
            if (direction === 'down') {
                arrow.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';
            } else {
                arrow.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';
            }
        }
    });
</script>