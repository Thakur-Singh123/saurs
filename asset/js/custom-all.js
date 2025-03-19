$(window).scroll(function() {

if ($(this).scrollTop() > 1){  

    $('.header-bar-top').addClass("sticky");

  }

  else{

    $('.header-bar-top').removeClass("sticky");

  }

});



jQuery(document).ready(function($) {

      $('.slider-logo').slick({

        dots: true,

        infinite: true,

        speed: 500,

        slidesToShow: 6,

        slidesToScroll: 1,

        autoplay: true,

        autoplaySpeed: 3000,

        arrows: false,

        responsive: [{

          breakpoint: 600,

          settings: {

            slidesToShow: 3,

            slidesToScroll: 1

          }

        },

        {

           breakpoint: 400,

           settings: {

              arrows: false,

              slidesToShow: 2,

              slidesToScroll: 1

           }

        }]

    });

});







document.addEventListener("DOMContentLoaded", function () {

  // Select the slider element

  const sliderElement = document.querySelector('.home-banner-new');



  // Initialize BlazeSlider with auto-play, navigation, and speed adjustments

  const slider = new BlazeSlider(sliderElement, {

    all: {

      autoplayDirection: 'to left',

      enableAutoplay: true,

      autoplayInterval: 3000, // Time between slides (in milliseconds)

      transitionDuration: 1000, // Slide transition speed (in milliseconds)

      slidesToShow: 1,

      pagination: {

        type: 'dots', // Pagination style ('dots', 'numbers', etc., depending on library support)

        clickable: true, // Makes pagination dots clickable

      },

    },

    '(max-width: 1024px)': {

      slidesToShow: 1, // Show 3 slides on devices like iPads

    },

    '(max-width: 768px)': {

      slidesToShow: 1, // Adjust for smaller screens like portrait mode on iPad 3

    },

    '(max-width: 500px)': {

      slidesToShow: 1, // Adjust for mobile phones

    },

  });



  // Add event listeners for next/previous buttons

  const prevButton = document.querySelector('.blaze-prev');

  const nextButton = document.querySelector('.blaze-next');



  if (prevButton && nextButton) {

    prevButton.addEventListener('click', () => slider.prev());

    nextButton.addEventListener('click', () => slider.next());

  }

});





document.addEventListener("DOMContentLoaded", function () {

  // Select the slider element

  const sliderElement = document.querySelector('.slider-nfts');



  // Initialize BlazeSlider with auto-play, navigation, and speed adjustments

  const slider = new BlazeSlider(sliderElement, {

    all: {

      autoplayDirection: 'to left',

      enableAutoplay: true,

      autoplayInterval: 3000, // Time between slides (in milliseconds)

      transitionDuration: 1000, // Slide transition speed (in milliseconds)

      slidesToShow: 3,

      pagination: {

        type: 'dots', // Pagination style ('dots', 'numbers', etc., depending on library support)

        clickable: true, // Makes pagination dots clickable

      },

    },

    '(max-width: 1024px)': {

      slidesToShow: 1, // Show 3 slides on devices like iPads

    },

    '(max-width: 768px)': {

      slidesToShow: 3, // Adjust for smaller screens like portrait mode on iPad 3

    },

    '(max-width: 500px)': {

      slidesToShow: 3, // Adjust for mobile phones

    },

  });



  // Add event listeners for next/previous buttons

  const prevButton = document.querySelector('.blaze-prev');

  const nextButton = document.querySelector('.blaze-next');



  if (prevButton && nextButton) {

    prevButton.addEventListener('click', () => slider.prev());

    nextButton.addEventListener('click', () => slider.next());

  }

});





document.addEventListener("DOMContentLoaded", function () {

  // Select the slider element

  const sliderElement = document.querySelector('.legendary-sliider-one');



  // Initialize BlazeSlider with auto-play, navigation, and speed adjustments

  const slider = new BlazeSlider(sliderElement, {

    all: {

      autoplayDirection: 'to left',

      enableAutoplay: true,

      autoplayInterval: 3000, // Time between slides (in milliseconds)

      transitionDuration: 1000, // Slide transition speed (in milliseconds)

      slidesToShow: 3,

      pagination: {

        type: 'dots', // Pagination style ('dots', 'numbers', etc., depending on library support)

        clickable: true, // Makes pagination dots clickable

      },

    },

    '(max-width: 1024px)': {

      slidesToShow: 1, // Show 3 slides on devices like iPads

    },

    '(max-width: 768px)': {

      slidesToShow: 3, // Adjust for smaller screens like portrait mode on iPad 3

    },

    '(max-width: 500px)': {

      slidesToShow: 3, // Adjust for mobile phones

    },

  });



  // Add event listeners for next/previous buttons

  const prevButton = document.querySelector('.blaze-prev');

  const nextButton = document.querySelector('.blaze-next');



  if (prevButton && nextButton) {

    prevButton.addEventListener('click', () => slider.prev());

    nextButton.addEventListener('click', () => slider.next());

  }

});





document.addEventListener("DOMContentLoaded", function () {

  // Select the slider element

  const sliderElement = document.querySelector('.legendary-sliider-tow');



  // Initialize BlazeSlider with auto-play, navigation, and speed adjustments

  const slider = new BlazeSlider(sliderElement, {

    all: {

      autoplayDirection: 'to right',

      enableAutoplay: true,

      autoplayInterval: 3000, // Time between slides (in milliseconds)

      transitionDuration: 1000, // Slide transition speed (in milliseconds)

      slidesToShow: 3,

      pagination: {

        type: 'dots', // Pagination style ('dots', 'numbers', etc., depending on library support)

        clickable: true, // Makes pagination dots clickable

      },

    },

    '(max-width: 1024px)': {

      slidesToShow: 1, // Show 3 slides on devices like iPads

    },

    '(max-width: 768px)': {

      slidesToShow: 3, // Adjust for smaller screens like portrait mode on iPad 3

    },

    '(max-width: 500px)': {

      slidesToShow: 3, // Adjust for mobile phones

    },

  });



  // Add event listeners for next/previous buttons

  const prevButton = document.querySelector('.blaze-prev');

  const nextButton = document.querySelector('.blaze-next');



  if (prevButton && nextButton) {

    prevButton.addEventListener('click', () => slider.prev());

    nextButton.addEventListener('click', () => slider.next());

  }

});







document.addEventListener("DOMContentLoaded", function () {

  // Select the slider element

  const sliderElement = document.querySelector('.legendary-sliider-three');



  // Initialize BlazeSlider with auto-play, navigation, and speed adjustments

  const slider = new BlazeSlider(sliderElement, {

    all: {

      autoplayDirection: 'to left',

      enableAutoplay: true,

      autoplayInterval: 3000, // Time between slides (in milliseconds)

      transitionDuration: 1000, // Slide transition speed (in milliseconds)

      slidesToShow: 3,

      pagination: {

        type: 'dots', // Pagination style ('dots', 'numbers', etc., depending on library support)

        clickable: true, // Makes pagination dots clickable

      },

    },

    '(max-width: 1024px)': {

      slidesToShow: 1, // Show 3 slides on devices like iPads

    },

    '(max-width: 768px)': {

      slidesToShow: 3, // Adjust for smaller screens like portrait mode on iPad 3

    },

    '(max-width: 500px)': {

      slidesToShow: 3, // Adjust for mobile phones

    },

  });



  // Add event listeners for next/previous buttons

  const prevButton = document.querySelector('.blaze-prev');

  const nextButton = document.querySelector('.blaze-next');



  if (prevButton && nextButton) {

    prevButton.addEventListener('click', () => slider.prev());

    nextButton.addEventListener('click', () => slider.next());

  }

});







const accSingleTriggers = document.querySelectorAll('.js-acc-single-trigger');



accSingleTriggers.forEach(trigger => trigger.addEventListener('click', toggleAccordion));



function toggleAccordion() {

  const items = document.querySelectorAll('.js-acc-item');

  const thisItem = this.parentNode;



  items.forEach(item => {

    if (thisItem == item) {

      thisItem.classList.toggle('is-open');

      return;

    }

    item.classList.remove('is-open');

  });

}







window.onscroll = function() {myFunction()};



var header = document.getElementById("myHeader");

var sticky = header.offsetTop;



function myFunction() {

  if (window.pageYOffset > sticky) {

    header.classList.add("sticky");

  } else {

    header.classList.remove("sticky");

  }

}








































