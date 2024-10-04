function loadData(type) {
    const display = document.getElementById('data-display');

    if (type === 'persona') {
        fetch('persona.php') // Archivo para manejar la carga de personas
            .then(response => response.text())
            .then(data => {
                display.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    } else if (type === 'catastro') {
        fetch('catastro.php') // Archivo para manejar la carga de catastros
            .then(response => response.text())
            .then(data => {
                display.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    }
}
function addPerson() {
    const formData = new FormData(event.target);

    fetch('persona.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('data-display').innerHTML = data; // Recarga la tabla de personas
    })
    .catch(error => console.error('Error:', error));
}
