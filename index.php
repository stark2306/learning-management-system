<?php
  include_once 'header.php';    //header of the website
  ?>
<main>
<section class="hero-slider">
  <div>
    <img src="/includes/images/slider-1.jpeg" alt="slider-img-1">
    <div class="inner-content">
      <H1>the dublin cricket Academy</H1>
    </div>
  </div>
  <div>
    <img src="/includes/images/slider-2.jpg" alt="slider-img-2">
    <div class="inner-content">
      <H1>the dublin cricket Academy</H1>
    </div>
  </div>
  <div>
    <img src="/includes/images/slider-3.jpeg" alt="slider-img-3">
    <div class="inner-content">
      <H1>the dublin cricket Academy</H1>
    </div>
  </div>
</section>

<section class="about container text-center py-5">
  <h2 class="mb-4">Who We Are</h2>
  <h4 class="w-60">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis rem omnis dolores, sint, quia reprehenderit
    quod harum, consectetur aliquam reiciendis aspernatur. Possimus nostrum praesentium, recusandae at explicabo dolores
    provident animi.</h4>
  <!-- I used bootstrap structure for this section -->
  <div class="row py-5">
    <div class="col-md-3">
      <span class="mb-4">
        20
      </span>
      <h5>
        No. of Academies
      </h5>
    </div>
    <div class="col-md-3"> <span class="mb-4">
        <span class="mb-4">
          1K+
        </span>
        <h5>
          Academy Students
        </h5>
    </div>
    <div class="col-md-3">
      <span class="mb-4">
        500+
      </span>
      <h5>
        Online Students
      </h5>
    </div>
    <div class="col-md-3">
      <span class="mb-4">
        100+
      </span>
      <h5>
        Online Certificates
      </h5>
    </div>
  </div>
</section>

<section class="hero-banner parallax overlay" style="background-image:url('/includes/images/hero-banner.png')">
  <div class="container px-3 py-5">
    <div class="row align-items-center">
      <article class="col-lg-6 line-left text-capitalize text-white text-center">
        <div class="feature-cards px-3 py-4 text-white mb-5">
          <div class="feature-cards-img">
            <img src="/includes/images/upcoming-events.jpeg" alt="logo-events">
          </div>
          <h4 class="pY-3 text-dark">UPCOMING EVENTS</h4>
          <ol class="text-left text-dark">
            <li class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, aliquam.... <a
                href="/register.php">Read more</a></li>
            <li class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, aliquam.... <a
                href="/register.php">Read more</a></li>
            <li class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, aliquam.... <a
                href="/register.php">Read more</a></li>
          </ol>
          <a href="#" class="cmn-btn">Read more</a>
        </div>
      </article>

      <article class="col-lg-6 line-left text-capitalize text-white text-center">
        <div class="feature-cards px-3 py-4 text-white mb-5">
          <div class="feature-cards-img">
            <img src="/includes/images/membership.jpeg" alt="membership-logo">
          </div>
          <h4 class="pY-3 text-dark">MEMBERSHIP</h4>
          <ol class="text-left text-dark">
            <li class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, aliquam.... <a
                href="/register.php">Read more</a></li>
            <li class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, aliquam.... <a
                href="/register.php">Read more</a></li>
            <li class="pb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, aliquam.... <a
                href="/register.php">Read more</a></li>
          </ol>
          <a href="http://cricketacademy.test/class.php" class="cmn-btn">Read more</a>
        </div>
      </article>

    </div>
  </div>
</section>


<section class="py-5">
  <div class="container text-center">
    <h2 class="mb-4">GET IN TOUCH</h2>
    <H5 class="w-60">
    You’ll have the opportunity to excel professionally and personally, being part of a team that dedicated to furthering our academic endeavours.
    </H5>
    <a href="/contact.php" class="cmn-btn d-inline-block mb-4 mt-5">GET IN TOUCH</a>
  </div>
</section>
</main>


<?php
  include_once 'footer.php';    //footer of the website
?>


<script>
  $('.hero-slider').slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    autoplay: true,
    arrows: false,
    autoplaySpeed: 2000,
  });
</script>