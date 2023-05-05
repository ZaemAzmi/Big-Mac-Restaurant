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