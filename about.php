<?php
  include_once 'header.php';    //header of the website
  ?>

<main>
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
      <img src="http://cricketacademy.test/includes/images/owner-1.jpeg" alt="">
      <h5 class="mt-3">
        Hudson
      </h5>
      <span>
        Owner/President
      </span>
    </article>
    <article class="col-md-4">
      <img src="http://cricketacademy.test/includes/images/owner-2.jpeg" alt="owner-image">
      <h5 class="mt-3">
        Zach
      </h5>
      <span>
        VP, Finance & Administration
      </span>
    </article>
    <article class="col-md-4">
      <img src="http://cricketacademy.test/includes/images/owner-3.jpeg" alt="owner-image">
      <h5 class="mt-3">Reuben</h5>
      <span>
        Academic Head
      </span>
    </article>
  </article>
</section>

<?php
    function show_testimonials(){
        include './db-queries/connect.php';
        $query = 'SELECT testimonial.description, registered_user.individual_name, registered_user.role_selected, testimonial.date_of_publishing
                            FROM testimonial LEFT JOIN registered_user ON testimonial.username = registered_user.username
                            WHERE testimonial.approved = 1';
        if(mysqli_query($connection, $query)){
            $results = mysqli_fetch_all(mysqli_query($connection, $query),MYSQLI_NUM);
            if(count($results) >0){
                return $results;
            }
        }
    mysqli_close($connection);
    }
?>

<?php
  $testimonial_data = show_testimonials();
  if($testimonial_data){
    count($testimonial_data)<3?$loop = count($testimonial_data) : $loop = 3;
    ?>
    <section class="hero-slider testimonial-slider text-center">
    <?php
    for($i=0;$i<$loop;$i++)
    {
        ?>
                <article>
                    <img src="http://cricketacademy.test/includes/images/testimonial-bg.png" alt="testimonial-background">
                    <div class="inner-content">
                    <H4>“<?php echo $testimonial_data[$i][0] ?>”</H4>
                        <article class="text-center mt-4">
                        <h4 class="mb-0">- <?php echo $testimonial_data[$i][1] ?></h4>
                        <h6 class="mb-0">
                        <?php echo $testimonial_data[$i][2] ?>
                        </h6>
                        <span>
                        <?php echo $testimonial_data[$i][3] ?>
                        </span>
                        </article>
                    </div>
                </article>
            <?php
        }
        ?>
  </section>

<section class="container my-3 text-center">
    <a href="http://cricketacademy.test/testimonial.php" class="cmn-btn my-3 d-inline-block">View More Testimonials</a>
</section>
</main>
        <?php
    }
    ?>

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
    autoplaySpeed: 6000,
  });
</script>