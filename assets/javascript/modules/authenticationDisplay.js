let signInFormDisplayBtn = document.querySelector(".signInForm__displayBtn");
let signInCurtain = document.querySelector(".signInCurtain");
let signUpFormDisplayBtn = document.querySelector(".signUpForm__displayBtn");
let signUpCurtain = document.querySelector(".signUpCurtain");


signInFormDisplayBtn.addEventListener("click", ()=>{
    signInCurtain.classList.toggle("authentication__form--hidden");
    signInFormDisplayBtn.classList.toggle("authentication__form__displayBtn--hidden");
    signUpCurtain.classList.toggle("authentication__form--hidden");
    signUpFormDisplayBtn.classList.toggle("authentication__form__displayBtn--hidden");
    console.log(signInCurtain.classList);
    
});

signUpFormDisplayBtn.addEventListener("click", ()=>{
    signUpCurtain.classList.toggle("authentication__form--hidden");
    signUpFormDisplayBtn.classList.toggle("authentication__form__displayBtn--hidden");
    signInCurtain.classList.toggle("authentication__form--hidden");
    signInFormDisplayBtn.classList.toggle("authentication__form__displayBtn--hidden");
    console.log(signUpCurtain.classList);
    
});