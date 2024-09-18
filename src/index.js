require("bootstrap");
import Swiper from "swiper"
import {Navigation} from 'swiper/modules'


(function () {
  var swiper = new Swiper(".swiper-container", {
    modules: [Navigation],
    speed: 400,
    autoplay: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  window.addEventListener('scroll', (event) => {
    var btnscroll = document.querySelector('#top-header');
    var scrollValue = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollValue > 0) {
      btnscroll.classList.add("sticky");
    } else {
      btnscroll.classList.remove("sticky");
    }
  });

})();
