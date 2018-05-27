var slickSelector = $(".hero-slider");
initSlider();

function initSlider() {
  this.slickSelector.slick({
    autoplay: true,
    arrows: true,
    dots: true,
    autoplaySpeed: 3000,
    prevArrow: '<div class="slick-prev"></div>',
    nextArrow: '<div class="slick-next"></div>'
  });
}