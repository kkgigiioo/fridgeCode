const form = document.querySelector('#login-form');
const pass_reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;
const email_reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

let email = form.elements.namedItem("email");
let password = form.elements.namedItem("password");

email.addEventListener('input', validate);
password.addEventListener('input', validate);

function validate(e) {
    let target = e.target;

    if(target.name === "email") {
        if(email_reg.test(target.value)){
            target.style.color='#44E444';
        }
        else {
            target.style.color='red';
        }
    }

    if(target.name === "password") {
        if(pass_reg.test(target.value)){
            target.style.color='#44E444';
        }
        else {
            target.style.color='red';
        }
    }
}