<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('.accordion-button');
        accordionButtons.forEach(button => {
            const content = button.nextElementSibling;
            const arrow = button.querySelector('svg');
            const contentInner = content.querySelector('div');
            
            button.addEventListener('click', function() {
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    content.style.borderLeft = '';
                    content.style.borderRight = '';
                    content.style.borderBottom = '';
                    
                    this.style.backgroundColor = '';
                    this.style.color = '';
                    this.style.border = '';
                    this.style.borderRadius = '';
                    
                    arrow.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';
                } else {
                    content.style.maxHeight = contentInner.offsetHeight + "px";
                    
                    content.style.borderLeft = '1px solid #3E36AE';
                    content.style.borderRight = '1px solid #3E36AE';
                    content.style.borderBottom = '1px solid #3E36AE';
                    
                    this.style.backgroundColor = 'white';
                    this.style.color = '#3E36AE'; 
                    this.style.border = '1px solid #3E36AE';
                    this.style.borderBottomLeftRadius = '0';
                    this.style.borderBottomRightRadius = '0';
                    this.style.borderBottom = 'none';
                    
                    arrow.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';
                }
            });
        });
    });
</script>