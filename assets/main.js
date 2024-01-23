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
document.querySelectorAll(".menu-item").forEach(function (menuItem) {
	menuItem.addEventListener("click", function () {
		document.querySelectorAll(".helement").forEach(function (helement) {
			helement.style.display = "none";
		});

		var targetId = "#" + menuItem.getAttribute("data-target");
		var targetElement = document.querySelector(targetId);
		if (targetElement) {
			targetElement.style.display = "block";
		}
	});
});

// Change event for "#alphabets"
document.getElementById("alphabets").addEventListener("change", function() {
    var char = this.value.toLowerCase();

    if ('all' === char) {
        document.querySelectorAll(".words tr").forEach(function(row) {
            row.style.display = 'table-row';
        });
        return true;
    }

    // Hide all rows except the first one
    Array.from(document.querySelectorAll(".words tr")).slice(1).forEach(function(row) {
        row.style.display = 'none';
    });

    // Show rows whose first cell contains the specified character
    Array.from(document.querySelectorAll(".words td")).forEach(function(td) {
        if (td.textContent.toLowerCase().indexOf(char) === 0) {
            td.parentElement.style.display = 'table-row';
        }
    });
});
