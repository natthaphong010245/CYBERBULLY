<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.getElementById('role');
        const schoolContainer = document.getElementById('school-container');
        const schoolSelect = document.getElementById('school');

        roleSelect.addEventListener('change', function() {
            if(this.value === 'researcher') {
                schoolSelect.disabled = true;
                schoolSelect.selectedIndex = null; // รีเซ็ตการเลือก
                schoolContainer.classList.add('opacity-50');
            } else {
                schoolSelect.disabled = false;
                schoolContainer.classList.remove('opacity-50');
            }
        });
    });
</script>