




const item=document.querySelector('#item')
const itemBtn=document.querySelector('#item-btn')
itemBtn.onclick=()=>{item.classList.toggle('open')}
const nav=document.querySelector('#nav')
const navBtn=document.querySelector('#nav-btn')
navBtn.onclick=()=>{nav.classList.toggle('open')}
const a=document.querySelector('#a')
const aBtn=document.querySelector('#a-btn')
aBtn.onclick=()=>{a.classList.toggle('open')}

var popup = document.querySelector('.popup');
var closeBtn = document.querySelectorAll('.close');

// Открываем попап при клике на кнопку
function open_add_project() {
    document.querySelector('body').style.overflow = 'hidden';
    popup.style.display = 'block';
}

// Закрываем попап при клике на кнопку закрытия
closeBtn.forEach(item => {
    item.addEventListener('click', function() {
        popup.style.display = 'none';
        document.querySelector('body').style.overflow = 'auto';
    });
})

// Закрываем попап при клике вне его области
window.addEventListener('click', function(event) {
    if (event.target == popup) {
        popup.style.display = 'none';
        document.querySelector('body').style.overflow = 'auto';
    }
});
