<script>
    const infoBtn = document.getElementById('infoBtn');
    const closeBtn = document.getElementById('closeBtn');
    const modalOverlay = document.getElementById('modalOverlay');
    const infoModal = document.getElementById('infoModal');

    infoBtn.addEventListener('click', () => {
        infoModal.classList.add('show');
    });

    closeBtn.addEventListener('click', () => {
        infoModal.classList.remove('show');
    });

    modalOverlay.addEventListener('click', () => {
        infoModal.classList.remove('show');
    });
</script>
