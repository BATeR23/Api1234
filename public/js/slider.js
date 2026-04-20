let current = 0;
const sliders = document.querySelectorAll('.slide');
const slider = document.querySelector('.slider');
setInterval(()=>{
    current = (current +1 ) % sliders.length;
    slider.style.transform = `translateX(-${current* 100}%)`;
}, 3000);
