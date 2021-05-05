<?php require_once('header.php'); ?>

<style>
* {
    box-sizing: border-box;
}

.mySlides {
    display: none;
}
img {
    vertical-align: middle;
}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>

<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <h1>Donate</h1>
        </div>
    </div>

    <!-- Image slideshow -->
    <div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="#" style="width:100%">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="#" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="#" style="width:100%">
        <div class="text">Caption Three</div>
    </div>

    </div>
    <br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<!-- End of image slideshow -->



    <div class="row">
        <div class="col-12">
            <img src="img/donateCode.png" alt="Donate!" title="Donate now!">
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3 py-4">
            A small team of developers have worked hard on this project and are
            continuing to update it over time. By donating to our PayPal, you will
            be providing a slice of good will to our team, and will allow us to keep
            funding our efforts to work on small projects such as this. Thanks for
            donating! <br /> Love, Team BB-8
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="https://www.paypal.com/donate" method="post" target="_top">
                <input type="hidden" name="business" value="lewis.oxley98@outlook.com" />
                <input type="hidden" name="item_name" value="Donating funds to small development teams" />
                <input type="hidden" name="currency_code" value="GBP" />
                <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                <img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
            </form>

        </div>
    </div>
</div>

<!-- JavaScript for image slideshow -->
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


<?php require_once('footer.php'); ?>