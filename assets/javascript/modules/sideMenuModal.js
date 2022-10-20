//Show/hide the SideMenu Modal

document.addEventListener('DOMContentLoaded',function(){
    let menuBtn = document.querySelector(".menu__btn");
    let menuBtnBar = document.querySelector(".menu__btn__bar");
    let menuSideModal = document.querySelector(".menu__sideModal");
    
    menuBtn.addEventListener("click", ()=>{
        menuBtnBar.classList.toggle("menu__btn--animate");
        menuSideModal.classList.toggle("menu__sideModal--visible");
        console.log(menuSideModal.classList);
        
    });
});