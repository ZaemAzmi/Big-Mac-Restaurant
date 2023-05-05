$(document).ready(function() {
    var images = ['#wrapper img:nth-child(1)', '#wrapper img:nth-child(2)', '#wrapper img:nth-child(3)', '#wrapper img:nth-child(4)', '#wrapper img:nth-child(5)'];
    var currentIndex = 0;
    var intervalId = setInterval(function() {
      $(images[currentIndex]).animate({opacity: 0}, 500, function() {
        currentIndex = (currentIndex + 1) % images.length;
        $(images[currentIndex]).animate({opacity: 1}, 500);
      });
    }, 10000);
  });

  ScrollReveal({
    reset: true,
    distance: '60px',
    duration: 2500,
    // delay: 20000,
    
  });

  ScrollReveal().reveal('.main-title, .section-title', { delay: 750, origin: 'left'});
  ScrollReveal().reveal('.sec-01, .image', { delay: 1000, origin: 'bottom',viewFactor: 0.5  });
  ScrollReveal().reveal('.text-box-right', { delay: 1100, origin: 'right' });
  ScrollReveal().reveal('.sec-02, .image', { delay: 1000, origin: 'top',viewFactor: 0.5});
  ScrollReveal().reveal('.text-box-left', { delay: 1000, origin: 'left' });
  ScrollReveal().reveal('.sec-03', {
    delay:7500,
    origin: 'bottom',
    viewFactor: 0.8,
    
  });