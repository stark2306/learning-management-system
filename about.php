<?php
  include_once 'header.php';    //header of the website
  ?>


<section class="about-us container text-center pt-1 pb-5">
  <h1>MEET THE TEAM</h1>
  <H3>
    Your Trusted Experts in Dublin Cricket Academy.
  </H3>
  <p>
    Our team is critical to the success of our business. Without the hard work, passion, teamwork, innovation and
    customer service all of our people believe in, we wouldn’t be the company we are. Everyone in our company plays a
    critical role in our success, and we would like to introduce you to the people who make us special!
  </p>
  <article class="row py-5">
    <article class="col-md-4">
      <img src="/includes/images/owner-1.jpeg" alt="">
      <h5 class="mt-3">
        Hudson
      </h5>
      <span>
        Owner/President
      </span>
    </article>
    <article class="col-md-4">
      <img src="/includes/images/owner-2.jpeg" alt="owner-image">
      <h5 class="mt-3">
        Zach
      </h5>
      <span>
        VP, Finance & Administration
      </span>
    </article>
    <article class="col-md-4">
      <img src="/includes/images/owner-3.jpeg" alt="owner-image">
      <h5 class="mt-3">Reuben</h5>
      <span>
        Academic Head
      </span>
    </article>
  </article>
</section>

<section class="hero-slider testimonial-slider text-center">
  <article>
    <img src="/includes/images/testimonial-bg.png" alt="slider-img-1">
    <div class="inner-content">
      <H4>“Hi DCA, I would like to take this opportunity to thank DCA coaches for their support to me during the
        transition from soft ball to hard ball cricket. Special shout out to Coaches as in very short time period they
        made me comfortable in the academy and helped improving my skills significantly in preparation for my U11 Warcks
        trials.”</H4>
        <article class="text-right mt-3">
          <h5 class="mb-0">- Ron</h5>
          <h6 class="mb-0">
            Early birds
          </h6>
          <span>
            20-Dec-2020
          </span>
        </article>
    </div>
  </article>
  <article>
    <img src="/includes/images/testimonial-bg.png" alt="slider-img-2">
    <div class="inner-content">
      <H4>"I would like to thank Avish rathore and all his coaching staff at Dublin Cricket Academy for all the great
        work that they have done with our son Pete. Pete joined the academy in 2018, Pete was only 6 at the time but had
        a real passion for the game. With the help of the coaches at the academy, Pete's confidence, his game and his
        attitude towards the game really grew. We got the great news today that Pete has been selected for Warwickshire
        County Cricket Club. Thank you to Dublin Academy for helping Akbar on his journey.We highly commend you and of
        course, recommend you highly too."</H4>
        <article class="text-right mt-3">
          <h5 class="mb-0">- Ron</h5>
          <h6 class="mb-0">
            Early birds
          </h6>
          <span>
            20-Dec-2020
          </span>
        </article>
    </div>
  </article>
  <article>
    <img src="/includes/images/testimonial-bg.png" alt="slider-img-3">
    <div class="inner-content">
      <H4>"Absolutely wonderful crew of people! They were completely transparent the whole way
        through the process and were so lovely. I would recommend them to anyone who wants great future in Cricket."
      </H4>
      <article class="text-right mt-3">
          <h5 class="mb-0">- Ron</h5>
          <h6 class="mb-0">
            Early birds
          </h6>
          <span>
            20-Dec-2020
          </span>
        </article>
    </div>
  </article>
</section>


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