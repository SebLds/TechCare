var img = document.getElementById("eye");
var show = img.getAttribute("src");

function changeEye() {

  if(show == "images/hide.png")
    show = "images/eye.png";
  else
    show = "images/hide.png";
  img.setAttribute("src", show);
}

function showPassword() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

img.addEventListener('click',showPassword);
img.addEventListener('click',changeEye);
