var img = document.getElementById("img-flag");
var langage = img.getAttribute("src");

function changeFlag() {

  if(langage == "/Web/images/france.png")
    langage = "/Web/images/uk.png";
  else
    langage = "/Web/images/france.png";
  img.setAttribute("src", langage);
}

img.onclick = changeFlag;
