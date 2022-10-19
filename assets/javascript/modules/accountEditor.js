//Activate the inputs fields when the button edit is clicked

let editButton = document.querySelector(".account_editButton");
let submitButton = document.querySelector(".account_form_submit");
let accountFormUsername = document.querySelector(".account_form_username");
let accountFormEmail = document.querySelector(".account_form_email");
let accountFormPassword = document.querySelector(".account_form_password");

editButton.addEventListener("click", () => {
    accountFormUsername.removeAttribute("disabled");
    accountFormEmail.removeAttribute("disabled");
    accountFormPassword.removeAttribute("disabled");
    submitButton.removeAttribute("disabled");
});