import './bootstrap';
import './auth.js';

function togglePositionField() {
    const positionField = document.getElementById('position-field');
    const approverRadio = document.querySelector('input[name="role"][value="approver"]');
    if (approverRadio.checked) {
        positionField.classList.remove('hidden');
    } else {
        positionField.classList.add('hidden');
    }
}
