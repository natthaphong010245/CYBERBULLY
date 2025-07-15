<style>
    @media (max-width: 768px) {
        .mobile-select {
            font-size: 16px;
            height: 44px;
        }
        
        .dropdown-container {
            position: relative;
        }
        
        .dropdown-list {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 50;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .dropdown-list.show {
            display: block;
        }
        
        .dropdown-item {
            padding: 12px 16px;
            border-bottom: 1px solid #f3f4f6;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .dropdown-item:hover,
        .dropdown-item.selected {
            background-color: #f3f4f6;
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .select-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background: white;
            cursor: pointer;
            min-height: 44px;
        }
        
        .select-display.disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
        }
        
        .arrow-icon {
            transition: transform 0.2s;
        }
        
        .arrow-icon.rotate {
            transform: rotate(180deg);
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    initCustomSelects();
    initFormValidation();
    initVoiceRecording();
    initImagePreview();
    initMap();
    initSuccessAlert();
});

function initCustomSelects() {
    const reportToDisplay = document.getElementById('reportToDisplay');
    const reportToList = document.getElementById('reportToList');
    const reportToText = document.getElementById('reportToText');
    const reportToInput = document.getElementById('report_to');
    
    const schoolDisplay = document.getElementById('schoolDisplay');
    const schoolList = document.getElementById('schoolList');
    const schoolText = document.getElementById('schoolText');
    const schoolInput = document.getElementById('school');

    reportToDisplay.addEventListener('click', function() {
        if (!this.classList.contains('disabled')) {
            toggleDropdown(reportToList, this.querySelector('.arrow-icon'));
            closeDropdown(schoolList, schoolDisplay.querySelector('.arrow-icon'));
        }
    });

    reportToList.addEventListener('click', function(e) {
        if (e.target.classList.contains('dropdown-item')) {
            const value = e.target.getAttribute('data-value');
            const text = e.target.textContent;
            
            reportToInput.value = value;
            reportToText.textContent = text;
            reportToText.classList.remove('text-gray-500');
            reportToText.classList.add('text-gray-900');
            
            clearFieldError('reportTo');
            
            closeDropdown(reportToList, reportToDisplay.querySelector('.arrow-icon'));
            
            if (value === 'researcher') {
                schoolDisplay.classList.add('disabled');
                schoolInput.value = '';
                schoolText.textContent = 'กรุณาเลือก';
                schoolText.classList.remove('text-gray-900');
                schoolText.classList.add('text-gray-500');
                clearFieldError('school');
            } else {
                schoolDisplay.classList.remove('disabled');
            }
        }
    });

    schoolDisplay.addEventListener('click', function() {
        if (!this.classList.contains('disabled')) {
            toggleDropdown(schoolList, this.querySelector('.arrow-icon'));
            closeDropdown(reportToList, reportToDisplay.querySelector('.arrow-icon'));
        }
    });

    schoolList.addEventListener('click', function(e) {
        if (e.target.classList.contains('dropdown-item')) {
            const value = e.target.getAttribute('data-value');
            const text = e.target.textContent;
            
            schoolInput.value = value;
            schoolText.textContent = text;
            schoolText.classList.remove('text-gray-500');
            schoolText.classList.add('text-gray-900');
            
            clearFieldError('school');
            
            closeDropdown(schoolList, schoolDisplay.querySelector('.arrow-icon'));
        }
    });

    document.addEventListener('click', function(e) {
        if (!reportToDisplay.contains(e.target) && !reportToList.contains(e.target)) {
            closeDropdown(reportToList, reportToDisplay.querySelector('.arrow-icon'));
        }
        if (!schoolDisplay.contains(e.target) && !schoolList.contains(e.target)) {
            closeDropdown(schoolList, schoolDisplay.querySelector('.arrow-icon'));
        }
    });

    function toggleDropdown(list, arrow) {
        list.classList.toggle('show');
        arrow.classList.toggle('rotate');
    }

    function closeDropdown(list, arrow) {
        list.classList.remove('show');
        arrow.classList.remove('rotate');
    }
}

function initFormValidation() {
    document.querySelector('form').addEventListener('submit', function(event) {
        const reportTo = document.getElementById('report_to').value;
        const school = document.getElementById('school').value;
        const latitude = document.getElementById('latitude').value;
        const longitude = document.getElementById('longitude').value;
        
        let hasError = false;
        
        resetErrorStates();
        
        if (!reportTo) {
            event.preventDefault();
            showFieldError('reportTo', 'การรายงาน');
            hasError = true;
        }
        
        if (reportTo && reportTo !== 'researcher' && !school) {
            event.preventDefault();
            showFieldError('school', 'โรงเรียน');
            hasError = true;
        }
        
        if (!latitude || !longitude) {
            event.preventDefault();
            
            const locationPrompt = document.getElementById('locationPrompt');
            locationPrompt.classList.remove('hidden');
            
            const mapContainer = document.getElementById('mapContainer');
            mapContainer.scrollIntoView({ behavior: 'smooth' });
            mapContainer.classList.add('ring', 'ring-red-500', 'ring-2');
            
            setTimeout(() => {
                locationPrompt.classList.add('hidden');
                mapContainer.classList.remove('ring', 'ring-red-500', 'ring-2');
            }, 3000);
            hasError = true;
        }
        
        if (hasError && (!latitude || !longitude)) {
        } else if (hasError) {
            const firstErrorField = document.querySelector('.field-error');
            if (firstErrorField) {
                firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
}

function resetErrorStates() {
    const reportToLabel = document.querySelector('label[class*="text-[#3E36AE]"]:first-of-type');
    if (reportToLabel) {
        reportToLabel.innerHTML = 'การรายงาน';
        reportToLabel.classList.remove('text-red-500', 'field-error');
        reportToLabel.classList.add('text-[#3E36AE]');
    }
    
    const reportToDropdown = document.getElementById('reportToDisplay');
    if (reportToDropdown) {
        reportToDropdown.classList.remove('border-red-500', 'border-2');
        reportToDropdown.classList.add('border-gray-300');
    }
    
    const schoolLabels = document.querySelectorAll('label[class*="text-"]');
    schoolLabels.forEach(label => {
        if (label.textContent.includes('โรงเรียน')) {
            label.innerHTML = 'โรงเรียน';
            label.classList.remove('text-red-500', 'field-error');
            label.classList.add('text-[#3E36AE]');
        }
    });
    
    const schoolDropdown = document.getElementById('schoolDisplay');
    if (schoolDropdown) {
        schoolDropdown.classList.remove('border-red-500', 'border-2');
        schoolDropdown.classList.add('border-gray-300');
    }
}

function showFieldError(fieldType, fieldName) {
    let targetLabel;
    let targetDropdown;
    
    if (fieldType === 'reportTo') {
        targetLabel = document.querySelector('label[class*="text-[#3E36AE]"]:first-of-type');
        targetDropdown = document.getElementById('reportToDisplay');
    } else if (fieldType === 'school') {
        const labels = document.querySelectorAll('label[class*="text-"]');
        labels.forEach(label => {
            if (label.textContent.includes('โรงเรียน')) {
                targetLabel = label;
            }
        });
        targetDropdown = document.getElementById('schoolDisplay');
    }
    
    if (targetLabel) {
        targetLabel.innerHTML = `${fieldName} <span class="text-red-500">*</span>`;
        targetLabel.classList.remove('text-[#3E36AE]');
        targetLabel.classList.add('text-red-500', 'field-error');
    }
    
    if (targetDropdown) {
        targetDropdown.classList.remove('border-gray-300');
        targetDropdown.classList.add('border-red-500', 'border-2');
    }
}

function clearFieldError(fieldType) {
    let targetLabel;
    let targetDropdown;
    let originalText;
    
    if (fieldType === 'reportTo') {
        targetLabel = document.querySelector('label[class*="text-red-500"], label[class*="field-error"]');
        targetDropdown = document.getElementById('reportToDisplay');
        originalText = 'การรายงาน';
        if (targetLabel && targetLabel.textContent.includes('การรายงาน')) {
            targetLabel.innerHTML = originalText;
            targetLabel.classList.remove('text-red-500', 'field-error');
            targetLabel.classList.add('text-[#3E36AE]');
        }
    } else if (fieldType === 'school') {
        const labels = document.querySelectorAll('label[class*="text-red-500"], label[class*="field-error"]');
        targetDropdown = document.getElementById('schoolDisplay');
        originalText = 'โรงเรียน';
        labels.forEach(label => {
            if (label.textContent.includes('โรงเรียน')) {
                label.innerHTML = originalText;
                label.classList.remove('text-red-500', 'field-error');
                label.classList.add('text-[#3E36AE]');
            }
        });
    }
    
    if (targetDropdown) {
        targetDropdown.classList.remove('border-red-500', 'border-2');
        targetDropdown.classList.add('border-gray-300');
    }
}
</script>