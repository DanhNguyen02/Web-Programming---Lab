const yearSelect = document.getElementById("year");
const monthSelect = document.getElementById("month");
const daySelect = document.getElementById("day");

const months = ['January', 'February', 'March', 'April', 
'May', 'June', 'July', 'August', 'September', 'October',
'November', 'December'];

//Months are always the same
(function populateMonths(){
    for(let i = 0; i < months.length; i++){
        const option = document.createElement('option');
        option.textContent = months[i];
        monthSelect.appendChild(option);
    }
    monthSelect.value = "January";
})();

let previousDay;

function populateDays(month){
    //Delete all of the children of the day dropdown
    //if they do exist
    while(daySelect.firstChild){
        daySelect.removeChild(daySelect.firstChild);
    }
    //Holds the number of days in the month
    let dayNum;
    //Get the current year
    let year = yearSelect.value;

    if(month === 'January' || month === 'March' || 
    month === 'May' || month === 'July' || month === 'August' 
    || month === 'October' || month === 'December') {
        dayNum = 31;
    } else if(month === 'April' || month === 'June' 
    || month === 'September' || month === 'November') {
        dayNum = 30;
    }else{
        //Check for a leap year
        if(new Date(year, 1, 29).getMonth() === 1){
            dayNum = 29;
        }else{
            dayNum = 28;
        }
    }
    //Insert the correct days into the day <select>
    for(let i = 1; i <= dayNum; i++){
        const option = document.createElement("option");
        option.textContent = i;
        daySelect.appendChild(option);
    }
    if(previousDay){
        daySelect.value = previousDay;
        if(daySelect.value === ""){
            daySelect.value = previousDay - 1;
        }
        if(daySelect.value === ""){
            daySelect.value = previousDay - 2;
        }
        if(daySelect.value === ""){
            daySelect.value = previousDay - 3;
        }
    }
}

function populateYears(){
    //Get the current year as a number
    let year = new Date().getFullYear();
    //Make the previous 100 years be an option
    for(let i = 0; i < 101; i++){
        const option = document.createElement("option");
        option.textContent = year - i;
        yearSelect.appendChild(option);
    }
}

populateDays(monthSelect.value);
populateYears();

yearSelect.onchange = function() {
    populateDays(monthSelect.value);
}
monthSelect.onchange = function() {
    populateDays(monthSelect.value);
}
daySelect.onchange = function() {
    previousDay = daySelect.value;
}

function submit() {
    var fname = document.getElementById("fname").value
    var lname = document.getElementById("lname").value
    var pass = document.getElementById("password").value
    var textarea = document.getElementById("exampleFormControlTextarea1").value
    if (fname.length < 2) {
        alert("First name is too short");
    }
    else if (fname.length > 30) {
        alert("First name is too long");
    }
    else if (lname.length < 2) {
        alert("Last name is too short");
    }
    else if (lname.length > 30) {
        alert("Last name is too long");
    }
    else if (!email()) {
        alert("invalid email");
    }
    else if (pass == null) {
        alert("Please enter email")
    }
    else if (pass.length < 2) {
        alert("Password is too short");
    }
    else if (pass.length > 30) {
        alert("Password is too long");
    }
    else if (!radio()) {
        alert("Please choose your gender");
    }
    else if (textarea.length > 10000) {
        alert("About text is too long")
    }
    else {
        alert("Complete");
    }
}

function radio() {
    if (document.getElementById('inlineRadio1').checked) {
        //Male radio button is checked
        return true;
    } else if (document.getElementById('inlineRadio2').checked) {
        //Female radio button is checked
        return true;
    } else if (document.getElementById('inlineRadio3').checked) {
        //Female radio button is checked
        return true;
    } else {
        return false;
    }
}

function email() {
    var email = document.getElementById("email").value;
    var i, j;
    var a = 0;
    for (i = 0; i < email.length; i++) {
        if (email.charAt(i) == "@") {
            if (i == 0) return false;
            for (j = i + 1; j < email.length; j++) {
                if (email.charAt(j) == "@") return false;
                if (email.charAt(j) == ".") {
                    a++;
                    if (j == email.length - 1) a++;
                }
            }
            if (a == 1) return true;
            return false;
        }
    }
    return false;
}

function reset() {
    document.getElementById("fname").value = null
    document.getElementById("lname").value = null
    document.getElementById("email").value = null
    document.getElementById("password").value = null
    document.getElementById("day").value = 1
    document.getElementById("month").value = "January"
    document.getElementById("year").value = 2022
    document.getElementById("inlineRadio1").checked = false
    document.getElementById("inlineRadio2").checked = false
    document.getElementById("inlineRadio3").checked = false
    document.getElementById("country").value = null
    document.getElementById("exampleFormControlTextarea1").value = null
}