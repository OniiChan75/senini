function rememberPassword() {
    var rememberCheckbox = document.querySelector('input[type="checkbox"][onclick="rememberPassword()"]');
    var passwordInput = document.getElementById('passwordInput');
    if (rememberCheckbox.checked) {
        passwordInput.setAttribute('data-remembered', 'true');
    } else {
        passwordInput.removeAttribute('data-remembered');
    }
}

function showPassword() {
    var passwordInput = document.getElementById('passwordInput');
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

window.addEventListener('DOMContentLoaded', function() {
    var rememberedPassword = localStorage.getItem('rememberedPassword');
    var passwordInput = document.getElementById('passwordInput');
    if (rememberedPassword === 'true') {
        passwordInput.type = 'text';
        document.querySelector('input[type="checkbox"][onclick="showPassword()"]').checked = true;
    }
});