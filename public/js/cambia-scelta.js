document.addEventListener('DOMContentLoaded', function () {
    // Listener per il bottone di conferma
    document.getElementById('confermaAggiunte').addEventListener('click', function () {
        document.getElementById('inserimento').submit();
    });

    // Listener per il cambio di tipo di costruzione
    document.getElementById('tipo-costruzione').addEventListener('change', function () {
        showOptions();
    });

    // Listener per il cambio di materiale
    document.getElementById('materiale').addEventListener('change', function () {
        showTavolati();
    });

    // Listener per la controparete esterna
    document.getElementById('controparteEsterna').addEventListener('change', function () {
        showControparteEsterna();
    });

    // Listener per la controparete interna
    document.getElementById('controparteInterna').addEventListener('change', function () {
        showControparteInterna();
    });
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

function showTavolati() {
    var scelta = document.getElementById("materiale").value;
    if (scelta === "bloccoAmbiente") {
        document.getElementById("bloccoAmbiente").style.display = "block";
        document.getElementById("doppiaLastra").style.display = "none";
    } else if (scelta === "doppiaLastra") {
        document.getElementById("doppiaLastra").style.display = "block";
        document.getElementById("bloccoAmbiente").style.display = "none";
    } else {
        // Aggiungiamo un controllo per nascondere entrambi se la scelta non è riconosciuta
        document.getElementById("bloccoAmbiente").style.display = "none";
        document.getElementById("doppiaLastra").style.display = "none";
    }
}

function showControparteEsterna() {
    var scelta1 = document.getElementById("controparteEsterna").value;
    if (scelta1 === "controparteEsterna1") {
        document.getElementById("controparteEsterna1").style.display = "block";
        document.getElementById("controparteEsterna2").style.display = "none";
        document.getElementById("controparteEsterna3").style.display = "none";
        document.getElementById("controparteEsterna4").style.display = "none";
    } else if (scelta1 === "controparteEsterna2") {
        document.getElementById("controparteEsterna2").style.display = "block";
        document.getElementById("controparteEsterna1").style.display = "none";
        document.getElementById("controparteEsterna3").style.display = "none";
        document.getElementById("controparteEsterna4").style.display = "none";
    } else if (scelta1 === "controparteEsterna3") {
        document.getElementById("controparteEsterna3").style.display = "block";
        document.getElementById("controparteEsterna1").style.display = "none";
        document.getElementById("controparteEsterna2").style.display = "none";
        document.getElementById("controparteEsterna4").style.display = "none";
    }  else if (scelta1 === "controparteEsterna4") {
        document.getElementById("controparteEsterna4").style.display = "block";
        document.getElementById("controparteEsterna1").style.display = "none";
        document.getElementById("controparteEsterna2").style.display = "none";
        document.getElementById("controparteEsterna3").style.display = "none";
    }  else {
        // defoult
        document.getElementById("controparteEsterna1").style.display = "block";
        document.getElementById("controparteEsterna2").style.display = "none";
        document.getElementById("controparteEsterna3").style.display = "none";
        document.getElementById("controparteEsterna4").style.display = "none";
    }
}

function showControparteInterna() {
    var scelta2 = document.getElementById("controparteInterna").value;
    if (scelta2 === "controparteInterna1") {
        document.getElementById("controparteInterna1").style.display = "block";
        document.getElementById("controparteInterna2").style.display = "none";
        document.getElementById("controparteInterna3").style.display = "none";
        document.getElementById("controparteInterna4").style.display = "none";
        document.getElementById("controparteInterna5").style.display = "none";
    } else if (scelta2 === "controparteInterna2") {
        document.getElementById("controparteInterna2").style.display = "block";
        document.getElementById("controparteInterna1").style.display = "none";
        document.getElementById("controparteInterna3").style.display = "none";
        document.getElementById("controparteInterna4").style.display = "none";
        document.getElementById("controparteInterna5").style.display = "none";
    } else if (scelta2 === "controparteInterna3") {
        document.getElementById("controparteInterna3").style.display = "block";
        document.getElementById("controparteInterna1").style.display = "none";
        document.getElementById("controparteInterna2").style.display = "none";
        document.getElementById("controparteInterna4").style.display = "none";
        document.getElementById("controparteInterna5").style.display = "none";
    }else if (scelta2 === "controparteInterna4"){
        document.getElementById("controparteInterna4").style.display = "block";
        document.getElementById("controparteInterna1").style.display = "none";
        document.getElementById("controparteInterna3").style.display = "none";
        document.getElementById("controparteInterna2").style.display = "none";
        document.getElementById("controparteInterna5").style.display = "none";
    }else if (scelta2 === "controparteInterna5") {
        document.getElementById("controparteInterna5").style.display = "block";
        document.getElementById("controparteInterna1").style.display = "none";
        document.getElementById("controparteInterna3").style.display = "none";
        document.getElementById("controparteInterna2").style.display = "none";
        document.getElementById("controparteInterna4").style.display = "none";
    }else {
        // defoult
        document.getElementById("controparteInterna1").style.display = "none";
        document.getElementById("controparteInterna2").style.display = "none";
        document.getElementById("controparteInterna3").style.display = "none";
        document.getElementById("controparteInterna4").style.display = "none";
        document.getElementById("controparteInterna5").style.display = "none";
    }
}

