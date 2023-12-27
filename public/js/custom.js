/* slide top card view js */
const multipleItemsCarousel = document.querySelector
('#carouselExample');

if(window.matchMedia("(min-width:576px)").matches){
const carousel = new bootstrap.Carousel(multipleItemsCarousel, {
  interval: false
})
}

if(window.matchMedia("(min-width:576px)").matches){
    var carouselWidth = $(".carousel-inner")[0].scrollWidth;
var cardWidth = $(".carousel-item").width();

var scrollPosition = 0;

$(".carousel-control-next").on("click", function () {
    if(scrollPosition < (carouselWidth - (cardWidth*4))){
        console.log('next');
        scrollPosition =scrollPosition + cardWidth;
      $(".carousel-inner").animate({ scrollLeft: scrollPosition },600);
    }
      
  });

  $(".carousel-control-prev").on("click", function () {
    if(scrollPosition > 0){
        console.log('prev');
        scrollPosition =scrollPosition - cardWidth;
      $(".carousel-inner").animate({ scrollLeft: scrollPosition },600);
    }
      
  });
}
else{
    $(multipleItemsCarousel).addClass('slide');
}

/* card viewer number 2 js */

$(document).ready(function() {
  var front = document.getElementsByClassName("front");
  var back = document.getElementsByClassName("back");

  var highest = 0;
  var absoluteSide = "";

  for (var i = 0; i < front.length; i++) {
    if (front[i].offsetHeight > back[i].offsetHeight) {
      if (front[i].offsetHeight > highest) {
        highest = front[i].offsetHeight;
        absoluteSide = ".front";
      }
    } else if (back[i].offsetHeight > highest) {
      highest = back[i].offsetHeight;
      absoluteSide = ".back";
    }
  }
  $(".front").css("height", highest);
  $(".back").css("height", highest);
  $(absoluteSide).css("position", "absolute");
});

/* bootstrap dropdown js code for user profile */

    document.addEventListener('DOMContentLoaded', function () {
        // Get the dropdown trigger element
        var dropdownTrigger = document.getElementById('navbarDropdown');

        // Get the dropdown menu element
        var dropdownMenu = document.querySelector('.dropdown-menu');

        // Toggle the dropdown menu on click
        dropdownTrigger.addEventListener('click', function () {
            dropdownMenu.classList.toggle('show');
        });

        // Close the dropdown menu when clicking outside of it
        document.addEventListener('click', function (event) {
            if (!dropdownTrigger.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
