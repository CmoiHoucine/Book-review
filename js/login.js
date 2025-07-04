document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("login-form");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const errorMessage = document.getElementById("login-error");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Empêche l'envoi classique du formulaire

        // Réinitialise l'affichage d'erreur
        errorMessage.innerHTML = "";
        errorMessage.classList.remove("show");

        // Construction de la requête
        fetch("../Controller/LoginController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                username: usernameInput.value,
                password: passwordInput.value
            })
        })
        .then(response => response.text())
        .then(data => {
            console.log("Réponse du serveur :", data); // 🔍 à vérifier dans la console

            if (data === "success") {
                window.location.href = "../Controller/IndexController.php";
            } else {
                errorMessage.innerHTML = data;
                errorMessage.classList.add("show");
            }
        })
        .catch(error => {
            console.error("Erreur fetch :", error);
            errorMessage.innerHTML = "❌ Erreur de communication avec le serveur.";
            errorMessage.classList.add("show");
        });
    });
});
