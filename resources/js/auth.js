function togglePositionField() {
    const positionField = document.getElementById('position-field');
    const approverRadio = document.querySelector('input[name="role"][value="approver"]');

    if (approverRadio && approverRadio.checked) {
        positionField?.classList.remove('hidden');
    } else {
        positionField?.classList.add('hidden');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const roleInputs = document.querySelectorAll('input[name="role"]');
    togglePositionField();
    roleInputs.forEach(input => {
        input.addEventListener('change', togglePositionField);
    });
});
