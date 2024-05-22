document.getElementById('confermaAggiunte').addEventListener('click', function () {
    document.getElementById('inserimento').submit();
});

function showOptions() {
    var tipoCostruzione = document.getElementById('tipo-costruzione').value;
    if (tipoCostruzione === 'nuova-costruzione') {
        document.getElementById('opzioni-nuova-costruzione').style.display = 'block';
        document.getElementById('opzioni-costruzione-esistente').style.display = 'none';
    } else {
        document.getElementById('opzioni-nuova-costruzione').style.display = 'none';
        document.getElementById('opzioni-costruzione-esistente').style.display = 'block';
    }
}