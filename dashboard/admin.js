const navBar = document.querySelector("nav"),
       menuBtns = document.querySelectorAll(".bx-menu"),
       overlay = document.querySelector(".overlay");

const menu = document.querySelector(".menu");

  
     menuBtns.forEach((menuBtn) => {
       menuBtn.addEventListener("click", () => {
         navBar.classList.toggle("open");
       });
     });

     overlay.addEventListener("click", () => {
       navBar.classList.remove("open");
     });

const form = document.querySelector(".admin-product-form-container");
const createBtns = document.querySelectorAll(".btn-add");

createBtns.forEach((createBtn) =>{
    createBtn.addEventListener("click", () =>{
      form.classList.toggle("open");
    });
});
