<?php
  /**
   *  script to publish testimonails for logged in users
   */
    include_once 'header.php';
    include_once './includes/testimonial_class.php';
    ?>
    <main>
    <?php

    //conditional to restrict only members and admins to publish their testimonials bassed on session variables set
    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && ($_SESSION['member_type'] == 'member' || $_SESSION['member_type'] == 'admin')){
            if(isset($_GET['membership_class'])){
                $membership_class = $_GET['membership_class'];
            }
            elseif(isset($_SESSION['membership_class'])){
                $membership_class = $_SESSION['membership_class'];
            }
            $username = $_SESSION['logged_in_username'];
            $testimonial = new testimonials($membership_class, $username);
                if(isset($_POST['add_testimonial'])){
                    $testimonial->set_testimonial_data($_POST['add_testimonial'], date('Y-m-d H:i:s'));    //intantiating the object of testimonali_class
                    $testimonial->add_my_testimonial_to_db();
                }
                    $results = $testimonial->show_testimonials($username);
            ?>
            <!--  testimonial form -->
            <form name="my_testimonial" id="my_testimonial" method="post">
                <textarea name="add_testimonial" id="my-testimonial" cols="30" rows="10" placeholder="Add your testimonial...." required></textarea>
            </form>
            <button form="my_testimonial" type="submit" class="btn btn-lg btn-success text-center text-white" name="testimonial_type" value="publish_my_testimonial">Publish Testimonial</button>
            <button onclick="window.location.href='/testimonial.php'" class="btn btn-lg btn-primary text-center text-white">View All Testimonial</button>
            <?php 
                   //bulid testimonial history table of the currently logged in user
                    if(count($results) >0)
                    {
                    ?>
                    <h2 align="center">My Testimonials</h2>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>Serial No.</th>
                                <th>Testimonial Description</th>
                                <th>Membership</th>
                                <th>Published On</th>
                                <th>Status</th> 
                            </tr>
                        </thead>
                        <?php
                            $index = 0;
                            foreach($results as $testimonialdata){
                                $index = $index+1;
                                ?>
                                <tr>
                                    <td><?php echo $index;?></td>
                                <?php
                                foreach($testimonialdata as $key => $value){
                                    if($key == 'individual_name')
                                    {
                                        continue;
                                    }

                                    if($key == 'approved')
                                    {
                                        if($value == 0)
                                        {   
                                            $text = "<span class='text-primary'>Under admin review</span>";
                                        }
                                        elseif($value == 1)
                                        {
                                            $text = "<span class='text-success'>Approved</span>";
                                        }
                                        else{
                                            $text = "<span class='text-danger'>Dismissed</span>";
                                        }
                                        ?>
                                            <td><?php echo $text;?></td>
                                        <?php
                                    }
                                    elseif($key != 'approved')
                                    {
                                        ?>
                                         <td><?php echo $value;?></td>
                                        <?php
                                    }
                                }
                                ?>
                                    </tr>
                        <?php
                            }
                        ?>
                    </table>
                    </div>
      
<?php
                    }
                    else{
                        ?>
                        <div class="fluidcontainer bg-dark text-center text-white mt-3">No Results Found</div>
                        <?php
                    }
                 }
            elseif(!isset($_SESSION['sid']) || !isset($_SESSION['member_type']))
            {
                echo "Please login to your account to publish your testimonial.<a href='http://cricketacademy.test/login.php'> Click here to login Now</a>";
            }
    ?>
    </main>
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

    include_once 'footer.php';
?>