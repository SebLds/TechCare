var input = document.getElementById("password");
var eye = document.getElementById("eye");

function showHidePassword() {

    if (input.type === "password"){
        input.type = "text";
        eye.className = "fal fa-eye";
    } else {
        input.type = "password";
        eye.className = "fal fa-eye-slash";
    }
  }

eye.onclick = showHidePassword;
