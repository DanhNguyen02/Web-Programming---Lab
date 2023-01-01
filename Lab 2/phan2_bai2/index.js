function add() {
    var a = document.getElementById("first").value;
    var b = document.getElementById("second").value;
    if (a == "" || b == "") {
        alert("Vui lòng nhập đầy đủ dữ liệu")
    }
    else if (isNaN(a)) {
        alert("Số không hợp lệ. Vui lòng nhập lại");
    }
    else {
        result = Number(a) + Number(b)
        document.getElementById("result").innerHTML= result;
    }
}

function sub() {
    var a = document.getElementById("first").value;
    var b = document.getElementById("second").value;
    if (a == "" || b == "") {
        alert("Vui lòng nhập đầy đủ dữ liệu")
    }
    else if (isNaN(a) || isNaN(b)) {
        alert("Số không hợp lệ. Vui lòng nhập lại");
    }
    else {
        result = Number(a) - Number(b)
        document.getElementById("result").innerHTML = result;
    }
}

function mul() {
    var a = document.getElementById("first").value;
    var b = document.getElementById("second").value;
    if (a == "" || b == "") {
        alert("Vui lòng nhập đầy đủ dữ liệu")
    }
    else if (isNaN(a) || isNaN(b)) {
        alert("Số không hợp lệ. Vui lòng nhập lại");
    }
    else {
        result = Number(a) * Number(b)
        document.getElementById("result").innerHTML = result;
    }
}

function div() {
    var a = document.getElementById("first").value;
    var b = document.getElementById("second").value;
    if (a == "" || b == "") {
        alert("Vui lòng nhập đầy đủ dữ liệu")
    }
    else if (isNaN(a) || isNaN(b)) {
        alert("Số không hợp lệ. Vui lòng nhập lại");
    }
    else {
        result = Number(a) / Number(b)
        document.getElementById("result").innerHTML = result;
    }
}

function pow() {
    var a = document.getElementById("first").value;
    var b = document.getElementById("second").value;
    if (a == "" || b == "") {
        alert("Vui lòng nhập đầy đủ dữ liệu")
    }
    else if (isNaN(a) || isNaN(b)) {
        alert("Số không hợp lệ. Vui lòng nhập lại");
    }
    else {
        var result = 1
        for (let i = 0; i < Number(b); i++) {
            result *= Number(a)
        }
        document.getElementById("result").innerHTML = result;
    }
}