<?php
    include_once 'header.php';
    ?>
    <main>
    <?php
    include_once './includes/testimonial_class.php';

    $results = testimonials::show_testimonials();

    if(count($results)>0){
        ?>

                  <section class="hero-slider testimonial-slider text-center">
                        <?php
                    for($i=0;$i<count($results);$i++){
                            ?>
                              <article>
                                <img src="http://cricketacademy.test/includes/images/testimonial-bg.png" alt="testimonial-background">
                                <div class="inner-content">
                                <h4>“<?php echo $results[$i]['description'];?>”</h4>
                                    <article class="text-right mt-3">
                                    <h5 class="mb-0">- <?php echo $results[$i]['individual_name'];?></h5>
                                    <h6 class="mb-0">
                                    <?php echo $results[$i]['role_selected'];?>
                                    </h6>
                                    <span>
                                    <?php 
                                        echo $results[$i]['date_of_publishing'];
                                    ?>
                                    </span>
                                    </article>
                                </div>
                        </article>       
                            <?php
                        }
                ?>
                </section>
        <?php
    }
    else{
        ?>
        <div class="fluidcontainer bg-dark text-center text-white mt-3">No Results Found</div>
        <?php
    }
?>
       <button onclick="location.href='/testimonial_add.php'" class="btn btn-lg btn-success text-center text-white">Publish your testimonial</button>
  <script>
    $(document).ready(function(){
        $('form#my_testimonial').submit(function(){
            $(this).reset();
        });
            $('.hero-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 2000,
    });
    })
    </script>
    <?php
    ?>
    </main>
    <?php
    include_once 'footer.php';
?>