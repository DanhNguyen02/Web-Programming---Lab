function create() {
    var table = document.getElementById('table');
    if (table.rows.length == 0) {
        for (let i = 0; i < 2; i++) {
            const tr = table.insertRow();
            for (let j = 0 ; j < 2; j++) {
                const td = tr.insertCell();
                td.appendChild(document.createTextNode(`${i}, ${j}`));
            }
        }
    }
    else {
        alert("There is a exist table");
    }
}

function addRow() {
    var table = document.getElementById('table');
    if (table.rows.length == 0) {
        alert("Please initialize your table first")
    }
    else {
        const row_length = table.rows[0].cells.length;
        const tr = table.insertRow();
        for (let j = 0 ; j < row_length; j++) {
            const td = tr.insertCell();
            td.appendChild(document.createTextNode(`${table.rows.length-1}, ${j}`));
        }
    }
}

function addColumn() {
    var table = document.getElementById('table');
    if (table.rows.length == 0) {
        alert("Please initialize your table first")
    }
    else {
        const row_length = table.rows[0].cells.length;
        for (let i = 0; i < table.rows.length; i++) {
            const tr = table.rows[i];
            const td = tr.insertCell();
            td.appendChild(document.createTextNode(`${i}, ${row_length}`));
        }
    }
}

function getRowIndex() {
    return Number(document.getElementById("row-index").value);
}

function deleteRowAt(index) {
    var table = document.getElementById('table');
    let row_count = table.rows.length;
    if (index < 0 || index >= row_count) {
        alert("Index is out of bound");
    }
    else {
        document.getElementById('table').deleteRow(index);
    }
}

function getColumnIndex() {
    return Number(document.getElementById("col-index").value);
}

function deleteColumnAt(index) {
    var table = document.getElementById('table');
    let row_count = table.rows.length;
    let row_length = table.rows[0].cells.length;
    if (index < 0 || index >= row_length) {
        alert("Index is out of bound");
    }
    else {
        for (let i = 0; i < row_count; i++) {
            table.rows[i].deleteCell(index);
        }
    }
}

function clearTable() {
    var table = document.getElementById('table');
    table.innerHTML = "";
}

function resetIndex() {
    if (table.rows.length == 0) {
        alert("Please initialize your table first")
    }
    else {
        const row_length = table.rows[0].cells.length;
        for (let i = 0; i < table.rows.length; i++) {
            for (let j = 0; j < row_length; j++) {
                table.rows[i].cells[j].innerHTML = i + ", " + j;
            }
        }
    }
}