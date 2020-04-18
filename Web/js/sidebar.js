var btn = document.querySelector('.burger-button');

function openNav() {
  document.getElementById("mySidebar").style.width = "275px";
}

btn.onclick = openNav;




/*var background = document.querySelector('.account-responsive');

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
}

background.onclick = closeNav;*/


/*document.addEventListener('click', function (event) {

    // If the click happened inside the the container, bail
    if (!event.target.closest('.sidebar'))
      return;
    else
      document.getElementById("mySidebar").style.width = "0";
    });


/*var box = document.querySelector('#box');

function showClick() {
  document.getElementById("box").style.borderRight = "7px solid #a8cae9";
}

box.onclick = showClick;*/


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



var ListBox = document.getElementsByClassName('box');

for (var i=0; i<ListBox.length; i++) {
  var element = ListBox[i];
  element.style.borderRight = "none";
  element.onclick= function() {
    console.log(this.style.borderRight);
    var element = this;
    if (element.style.borderRight = "none") {
        element.style.borderRight = "7px solid #a8cae9";
    } else {
      element.style.borderRight = "none";
    }
  }
}
