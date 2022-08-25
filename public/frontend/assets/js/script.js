'use strict';

// navbar variables
const navbarNav = document.querySelector('.navbar-nav');
const navbarToggleBtn = document.querySelector('.nav-toggle-btn');

// navbar toggle functionality
navbarToggleBtn.addEventListener('click', function () {

  navbarNav.classList.toggle('active');
  this.classList.toggle('active');

});

const backBtn = document.querySelector('.back_to_top');
backBtn.addEventListener('click', () => {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});

// Header Scroll
let nav = document.querySelector(".navbar");
let backToTop = document.querySelector(".back_to_top");
window.onscroll = function () {
  if (document.documentElement.scrollTop > 200) {
    nav.classList.add("header-scrolled");
    backToTop.classList.add('open');
  } else {
    nav.classList.remove("header-scrolled");
    backToTop.classList.remove('open');
  }
}
// Swiper js


var swiper = new Swiper(".mySwiper", {
  grabCursor: true,
  effect: "creative",
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return '<span class="' + className + '">' + (index + 1) + "</span>";
    },
  },
  creativeEffect: {
    prev: {
      shadow: true,
      translate: [0, 0, -400],
    },
    next: {
      translate: ["100%", 0, 0],
    },
  },
});