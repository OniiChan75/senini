// Seleziona la combo box
var materialeComboBox = document.getElementById("materiale");

// Aggiungi un listener per l'evento change
materialeComboBox.addEventListener("change", function() {
    // Ottieni il valore selezionato nella combo box
    var scelta = materialeComboBox.value;

    // Nascondi tutti i div
    var divs = document.querySelectorAll("div[id^='blocco']");
    divs.forEach(function(div) {
        div.style.display = "none";
    });

    // Visualizza il div appropriato in base alla scelta
    if (scelta === "bloccoAmbiente") {
        document.getElementById("bloccoAmbiente").style.display = "block";
        document.getElementById("doppiaLastra").style.display = "none";
    } else {
        document.getElementById("doppiaLastra").style.display = "block";
        document.getElementById("bloccoAmbiente").style.display = "none";
    }
});