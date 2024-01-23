const loginBtn = document.querySelector("#login");
const registerBtn = document.querySelector("#register");
const fromTitle = document.querySelector(".form-title");
const formAction = document.querySelector("#form-action");

registerBtn.addEventListener("click", function () {
	fromTitle.innerText = "Register Form";
	formAction.value = "register";
	loginBtn.classList.remove("selected-form");
	registerBtn.classList.add("selected-form");
});

loginBtn.addEventListener("click", function () {
	fromTitle.innerText = "Login Form";
	formAction.value = "login";
	registerBtn.classList.remove("selected-form");
	loginBtn.classList.add("selected-form");
});
