var btn = document.getElementById('menu-btn');
var aside = document.querySelector('aside');
var wrapper = document.querySelector('.wrapper');
btn.onclick = function(event){
    aside.classList.toggle('hide');
    wrapper.classList.toggle('full');
}