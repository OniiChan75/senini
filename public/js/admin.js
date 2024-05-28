document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('modifiche').addEventListener('change', function () {
        showOptions();
    });

});

function showOptions() {
    var i = document.getElementById('modifiche').value;
    if (i === 'opzioni-modifica-utente') {
        document.getElementById('opzioni-modifica-utenti').style.display = 'block';
        document.getElementById('opzioni-modifica-materiali').style.display = 'none';
    } else {
        document.getElementById('opzioni-modifica-utenti').style.display = 'none';
        document.getElementById('opzioni-modifica-materiali').style.display = 'block';
    }
}