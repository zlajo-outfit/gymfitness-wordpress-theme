//Run the bxSlider on testimonials
$(document).ready(function(){
    $('.testimonials-list').bxSlider();

    //when the page is ready add the fixed menu if position is greater then 300px
    const headerScroll = document.querySelector('.navigation-bar');
    const rect = headerScroll.getBoundingClientRect();
    const topDistance = Math.abs(rect.top);
    fixedMenu(topDistance);
  });

  window.onscroll = () => {
    const scroll = window.scrollY;
    fixedMenu(scroll);
  }

  // Adds a fixed menu on top
  function fixedMenu(scroll) {
    const headerScroll = document.querySelector('.navigation-bar');

    // In the case that the scroll is greater than 300 add some classes
    if(scroll > 300) {
      headerScroll.classList.add('fixed-top');
    } else {
      headerScroll.classList.remove('fixed-top');
    }
  }