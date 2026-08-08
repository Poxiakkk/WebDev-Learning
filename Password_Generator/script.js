
document.getElementById('back').onclick = function() {
document.getElementById("form").classList.remove("hidden");
document.getElementById("show").classList.add("hidden");
password = "";
};

const lengthValue = document.getElementById("lengthValue");
const passwordlen = document.getElementById("passwordLength");
const uppercaseCheckbox = document.getElementById("uppercaseCheckbox");
const lowercaseCheckbox = document.getElementById("lowercaseCheckbox");
const numbersCheckbox = document.getElementById("numbersCheckbox");
const specialCharsCheckbox = document.getElementById("specialCharsCheckbox");
const form = document.getElementById("form");
var password = "";

passwordlen.addEventListener("input", function(){
    lengthValue.textContent = passwordlen.value;
})

function UsePassword(password){
    document.getElementById("passwordOutput").innerHTML = password;
    document.getElementById("form").classList.add("hidden");
    document.getElementById("show").classList.remove("hidden");
}

function generateInt(min, max) {
    const minimum = Math.ceil(min);
    const maximum = Math.floor(max);
    return String.fromCharCode(Math.floor(Math.random() * (maximum - minimum) + minimum));
    
}

function Checkcheckboxes(){
    let tablica = [];

    if(uppercaseCheckbox.checked){ tablica.push(generateInt(65,90)); }

    if(lowercaseCheckbox.checked){ tablica.push(generateInt(97,122)); }

    if(numbersCheckbox.checked){ tablica.push(generateInt(48,57)); }

    if(specialCharsCheckbox.checked){ tablica.push(generateInt(33,47)); }
    
    return tablica[Math.floor(Math.random() * tablica.length)];

}

form.addEventListener("submit", function(event) {
    event.preventDefault();
    if(passwordlen.value < 1 || passwordlen.value > 100){
        alert("Password length must be between 1 and 100.");
        return;
    }else{
    for(let i = 0; i < passwordlen.value; i++){
    password += Checkcheckboxes();
    }
    UsePassword(password);
    }
});
