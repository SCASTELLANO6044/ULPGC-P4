var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("carousel-item");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.opacity = "0";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  if (slides[slideIndex - 1]) {
    slides[slideIndex - 1].style.opacity = "1";
  }
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}


var prevButton = document.querySelector('.carousel-control.prev');
var nextButton = document.querySelector('.carousel-control.next');
prevButton.addEventListener('click', function() {
  slideIndex--;
  if (slideIndex < 1) {
    slideIndex = document.getElementsByClassName("carousel-item").length;
  }
  showSlides();
});
nextButton.addEventListener('click', function() {
  slideIndex++;
  if (slideIndex > document.getElementsByClassName("carousel-item").length) {
    slideIndex = 1;
  }
  showSlides();
});
``