const loginBtn = document.querySelector("#login");
const registerBtn = document.querySelector("#register");
const fromTitle = document.querySelector(".form-title");
const formAction = document.querySelector("#form-action");

if (loginBtn && registerBtn && formAction && fromTitle) {
	registerBtn.addEventListener("click", function (e) {
		fromTitle.innerText = "Register Form";
		formAction.value = "register";
		loginBtn.classList.remove("selected-form");
		registerBtn.classList.add("selected-form");
	});

	loginBtn.addEventListener("click", function (e) {
		fromTitle.innerText = "Login Form";
		formAction.value = "login";
		registerBtn.classList.remove("selected-form");
		loginBtn.classList.add("selected-form");
	});
}

// Click event for ".menu-item"
document.querySelectorAll(".menu-item").forEach(function(menuItem) {
    menuItem.addEventListener("click", function() {
        document.querySelectorAll(".helement").forEach(function(helement) {
            helement.style.display = 'none';
        });

        var targetId = "#" + menuItem.getAttribute("data-target");
        var targetElement = document.querySelector(targetId);
        if (targetElement) {
            targetElement.style.display = 'block';
        }
    });
});

