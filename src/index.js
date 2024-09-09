require("bootstrap");
(function () {
    window.addEventListener('scroll', (event) => {
        var btnscroll = document.querySelector('#top-header');
        var scrollValue = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollValue > 0) {
            btnscroll.classList.add("sticky");
        } else {
            btnscroll.classList.remove("sticky");
        }
    });

    //BA Slider
// Call & init
document.addEventListener('DOMContentLoaded', function () {
    var sliders = document.querySelectorAll('.ba-slider');
    sliders.forEach(function (cur) {
      // Adjust the slider
      var width = cur.offsetWidth + 'px';
      var resizeImg = cur.querySelector('.resize img');
      resizeImg.style.width = width;
      // Bind dragging events
      drags(cur.querySelector('.handle'), cur.querySelector('.resize'), cur);
    });
  });
  
  // Update sliders on resize.
  window.addEventListener('resize', function () {
    var sliders = document.querySelectorAll('.ba-slider');
    sliders.forEach(function (cur) {
      var width = cur.offsetWidth + 'px';
      var resizeImg = cur.querySelector('.resize img');
      resizeImg.style.width = width;
    });
  });
  
  function drags(dragElement, resizeElement, container) {
    // Initialize the dragging event on mousedown.
    dragElement.addEventListener('mousedown', startDrag);
    dragElement.addEventListener('touchstart', startDrag);
  
    function startDrag(e) {
      dragElement.classList.add('draggable');
      resizeElement.classList.add('resizable');
  
      var startX = e.pageX || e.touches[0].pageX;
  
      // Get the initial position
      var dragWidth = dragElement.offsetWidth;
      var posX = dragElement.offsetLeft + dragWidth - startX;
      var containerOffset = container.offsetLeft;
      var containerWidth = container.offsetWidth;
  
      // Set limits
      var minLeft = containerOffset + 10;
      var maxLeft = containerOffset + containerWidth - dragWidth - 10;
  
      function moveDrag(e) {
        var moveX = e.pageX || (e.touches && e.touches[0].pageX);
        if (moveX === undefined) {
          return; // If moveX is undefined, exit the function
        }
  
        var leftValue = moveX + posX - dragWidth;
  
        // Prevent going off limits
        if (leftValue < minLeft) {
          leftValue = minLeft;
        } else if (leftValue > maxLeft) {
          leftValue = maxLeft;
        }
  
        // Translate the handle's left value to masked div's width.
        var widthValue = ((leftValue + dragWidth / 2 - containerOffset) * 100) / containerWidth + '%';
  
        // Set the new values for the slider and the handle.
        dragElement.style.left = widthValue;
        resizeElement.style.width = widthValue;
      }
  
      function stopDrag() {
        dragElement.classList.remove('draggable');
        resizeElement.classList.remove('resizable');
        document.removeEventListener('mousemove', moveDrag);
        document.removeEventListener('mouseup', stopDrag);
        document.removeEventListener('touchmove', moveDrag);
        document.removeEventListener('touchend', stopDrag);
      }
  
      document.addEventListener('mousemove', moveDrag);
      document.addEventListener('mouseup', stopDrag);
      document.addEventListener('touchmove', moveDrag);
      document.addEventListener('touchend', stopDrag);
  
      e.preventDefault();
    }
  }
  
})();
