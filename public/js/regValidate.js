const form = document.querySelector('#reg-form');
const name_reg = /^[A-Z]{1,1}[a-z ]+((['][a-zA-Z ])?[a-zA-Z]*)*$/;
const pass_reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}/;
const email_reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

let firstName = form.elements.namedItem("firstName");
let lastName = form.elements.namedItem("lastName");
let email = form.elements.namedItem("email");
let password_confirmation = form.elements.namedItem("password_confirmation");
let password = form.elements.namedItem("password");

firstName.addEventListener('input', validate);
lastName.addEventListener('input', validate);
email.addEventListener('input', validate);
password.addEventListener('input', validate);
password_confirmation.addEventListener('input', validate);

function validate(e) {
    let target = e.target;

    console.log(target.name);

    if(target.name === "firstName") {
        if(name_reg.test(target.value)){
            target.style.color='#44E444';
        }
        else {
            target.style.color='red';
        }
    }

    if(target.name === "lastName") {
        if(name_reg.test(target.value)){
            target.style.color='#44E444';
        }
        else {
            target.style.color='red';
        }
    }
    
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

    if(target.name === "password_confirmation") {
        if(pass_reg.test(target.value) && password_confirmation.value === password.value){
            target.style.color='#44E444';
        }
        else {
            target.style.color='red';
        }
    }
}