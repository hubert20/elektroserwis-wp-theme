require("bootstrap");
import Swiper from "swiper"
import { Navigation } from 'swiper/modules'


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

// Scroll Counter number
  var counted = 0;
  window.addEventListener('scroll', function () {

      var counterElement = document.getElementById('counter');
      var oTop = counterElement.offsetTop - window.innerHeight;

      if (counted === 0 && window.scrollY > oTop) {
          var countElements = document.querySelectorAll('.count');
          countElements.forEach(function (countElement) {
              var countTo = parseInt(countElement.getAttribute('data-count'));
              var currentCount = parseInt(countElement.textContent);

              var startCount = { countNum: currentCount };

              var duration = 2000;
              var startTime = null;

              function animateCount(timestamp) {
                  if (!startTime) startTime = timestamp;
                  var progress = timestamp - startTime;
                  var stepCount = Math.min(progress / duration, 1) * (countTo - currentCount) + currentCount;

                  countElement.textContent = Math.floor(stepCount);

                  if (progress < duration) {
                      requestAnimationFrame(animateCount);
                  } else {
                      countElement.textContent = countTo; // Ustaw ostateczną wartość
                  }
              }

              requestAnimationFrame(animateCount);
          });

          counted = 1;
      }
  });
})();
