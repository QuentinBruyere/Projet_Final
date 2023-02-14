//Activate the inputs fields when the button edit is clicked

document.addEventListener('DOMContentLoaded',function(){
    let editButton = document.querySelector(".editButton");
    let submitButton = document.querySelector(".account_form_submit");
    let accountFormUsername = document.querySelector(".account_form_username");
    let accountFormPassword = document.querySelector(".account_form_password");
    
    editButton.addEventListener("click", function(){
        accountFormUsername.removeAttribute("disabled");
        accountFormPassword.removeAttribute("disabled");
        submitButton.removeAttribute("disabled");
    });    
});