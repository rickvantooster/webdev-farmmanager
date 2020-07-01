window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("signup-form").addEventListener("submit", e=> registerForm(e));
    document.getElementById("login-form").addEventListener("submit", e=> loginForm(e));
});

function registerForm(event){
    event.preventDefault();

    var formFields = {};
    var successField =  document.getElementById("success");
    var errorField =  document.getElementById("signup-error");

    document.getElementById("signup-form").querySelectorAll("input").forEach(el=>{
        formFields[el.name] = el.value;
    });

    fetch("/webdev-farmmanager/public/register", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formFields),
    }).then(res=>{
        console.log(res.status);
        res.json().then(data=>{
            if(res.status === 200){
                document.getElementById("success").innerHTML = "Account succesvol geregistreert";
            }
            errorField.innerText = "";
            if(data.message === "invalid email"){
                errorField.innerText = "Ongeldig email adres";
            }
            if(data.message === "email already is in use"){
                errorField.innerText = "Dit email adres is al in gebruik";
            }

            if(data.message === "username already is in use"){
                errorField.innerText = "Het opgegeven gebruikersnaam is al in gebruik";
            }

            if(data.message === "given passwords are not the same"){
                errorField.innerText = "De opgegeven wachtwoorden komen niet overeen";
            }

            if(data.message === "Password must be atleast 8 characters long"){
                errorField.innerText = "Je wachtwoord moet minimaal 8 karakters lang zijn";
            }

            if(data.message === "Username must be atleast 6 characters long"){
                errorField.innerText = "Je gebruikersnaam moet minimaal 6 karakters lang zijn";
            }
        });
    })

}

function loginForm(event){
    var txt="";
    var username=document.getElementById("username");
    var pwd =document.getElementById("pwd");
    var form=document.getElementById("login-form");

    if(username.value.length < 6 || pwd.value.length < 8){
      txt="Gebruikersnaam of wachtwoord is ongeldig";
      // form.reset();
    }

    document.getElementById("error").innerHTML = txt;

    event.preventDefault();
    var formFields = {};

    document.getElementById("login-form").querySelectorAll("input").forEach(el=>{
        formFields[el.name] = el.value;
    });

    fetch("/webdev-farmmanager/public/login", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
        },
        redirect: "follow",
        body: JSON.stringify(formFields),
    }).then(res=>{
        res.json().then(data=>{
            console.log(data);
            if(data.message === "Username or password is incorrect"){
                document.getElementById("error").innerHTML = "Gebruikersnaam of wachtwoord is ongeldig";
            }else{
                location.assign("manager");
            }
        });
    }).catch(res=>{
        console.log(res.status, res);
    });

}
