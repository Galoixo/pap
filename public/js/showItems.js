function toggleList(id) {
    const list = document.getElementById(id);
    const arrow = document.getElementById(`arrow-${id}`);
    list.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
}
