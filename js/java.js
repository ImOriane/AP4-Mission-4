document.getElementById("searchBar").addEventListener("keyup", function() {
    let input = this.value.toLowerCase();
    let table = document.getElementById("dataTable");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { // On commence à 1 pour éviter l'en-tête
        let cells = rows[i].getElementsByTagName("td");
        let found = false;

        for (let j = 0; j < cells.length; j++) {
            if (cells[j].textContent.toLowerCase().includes(input)) {
                found = true;
                break;
            }
        }
        rows[i].style.display = found ? "" : "none"; // Affiche ou cache la ligne
    }
});
