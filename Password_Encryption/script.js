
const form = document.getElementById("form");
const alfabet = "abcdefghijklmnopqrstuvwxyz";
const alfabet2 = "@b(d3fgh1!klmn0pq45tuvwxyz2";
let password = "";

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const passwordInput = document.getElementById("passwordInput");
    let password = passwordInput.value;

    for(i = 0; i < password.length; i++){
        for(j = 0; j < alfabet.length; j++){
            if(password[i] == alfabet[j]){
                password = password.replace(alfabet[j], alfabet2[j]);
            }
        }
    }
    usePassword(password);
});

function usePassword(password){
    document.write("Your password is: " + password);
}
