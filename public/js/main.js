const item=document.querySelector('#item')
const itemBtn=document.querySelector('#item-btn')
itemBtn.onclick=()=>{item.classList.toggle('open')}
const nav=document.querySelector('#nav')
const navBtn=document.querySelector('#nav-btn')
navBtn.onclick=()=>{nav.classList.toggle('open')}
const a=document.querySelector('#a')
const aBtn=document.querySelector('#a-btn')
aBtn.onclick=()=>{a.classList.toggle('open')}