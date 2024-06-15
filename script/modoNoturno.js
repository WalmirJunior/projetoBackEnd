const chk = document.getElementById('chk');

function setModoNoturno(value) {
    localStorage.setItem('modoNoturno', value);
}

function getModoNoturno() {
    return localStorage.getItem('modoNoturno') === 'true';
}

chk.addEventListener('change', (event) => {
    event.preventDefault();
    event.stopPropagation(); // Tenta impedir a propagação do evento
    document.body.classList.toggle('dark', chk.checked);
    
    setModoNoturno(chk.checked);
});

document.addEventListener('DOMContentLoaded', () => {
    if (getModoNoturno()) {
        chk.checked = true;
        document.body.classList.add('dark');
        
    }
});
