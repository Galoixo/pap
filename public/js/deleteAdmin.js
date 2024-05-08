
function openConfirmationModal(id) {
    const modal = document.getElementById('confirmationModal');
    modal.classList.remove('hidden');
    const form = document.getElementById('deleteForm');
    form.action = `/admin/delete/${id}`;
}

function closeConfirmationModal() {
    const modal = document.getElementById('confirmationModal');
    modal.classList.add('hidden');
}
