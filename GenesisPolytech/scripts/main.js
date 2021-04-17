const mobileNavBtn = document.getElementById('hamburger-icon');
let mobileNav = document.getElementById('mobile-nav');
let mobileBodyCover = document.getElementById('mobile-body-cover');
const closeBtn = document.getElementById('close');

function showMobileNav(){
    mobileNavBtn.style.display = "none";
    mobileNav.style.left = "490px";
    mobileBodyCover.style.display = "block";
}

function hideMobileNav(){
    mobileNavBtn.style.display = "block";
    mobileNav.style.left = "770px";
    mobileBodyCover.style.display = "none";
}

mobileNavBtn.onclick = showMobileNav;
closeBtn.onclick = hideMobileNav;