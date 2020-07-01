window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("signup-form").addEventListener("submit", e=> registerForm(e));
    document.getElementById("login-form").addEventListener("submit", e=> loginForm(e));
});

function registerForm(event){
    event.preventDefault();

    var formFields = {};

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
            //TODO implement error handling.
        });
    })

}

function loginForm(event){
    var txt="";
    var username=document.getElementById("username");
    var pwd =document.getElementById("pwd");
    var form=document.getElementById("login-form");

    if(username.value.length < 8 || pwd.value.length < 8){
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
        body: JSON.stringify(formFields),
    }).then(res=>{
        res.json().then(data=>{

            //TODO implement error handling.
        });
    });

}
