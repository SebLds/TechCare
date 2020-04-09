var button = document.querySelector('#button-connexion');
var quit = document.querySelector('#button-quit');
var page = document.querySelector('.connexion-page');
var header =  document.querySelector('.header');

function showConnexionPage(e) {
  e.preventDefault();
  page.style.display = "flex";
}

function removeConnexionPage() {
  page.style.display = "none";
}

function align() {

}

button.addEventListener('click', showConnexionPage);
quit.addEventListener('click', removeConnexionPage);
