function showModal(type) {
    const modal = document.getElementById('modal');
    const plantForm = document.getElementById('plant-form');
    const trackForm = document.getElementById('track-form');

    if(type === 'plant') {
        plantForm.style.display = 'block';
        trackForm.style.display = 'none';
    } else {
        plantForm.style.display = 'none';
        trackForm.style.display = 'block';
    }
    modal.style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function handleSubmit(event) {
    event.preventDefault();
    alert('Données enregistrées avec succès !');
    closeModal();
}

// Fermer la modal en cliquant à l'extérieur
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if(event.target === modal) {
        closeModal();
    }
}