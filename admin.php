<?php
    // Template: admin dashboard

    include_once 'header.php';

    //conditonal to restrict only admins to view this template
    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && $_SESSION['member_type'] == 'admin')
    {
        include_once './includes/admin-pages/admin-sidebar.php';   //template part (side navigation bar for admin page)
        ?>
         <section class="col-10 py-5">

        </section>
        </article>
        </section>
        </main>
        <?php
    }
    else
    {
        ?>
        <main>
        <?php echo("<h3 class='mt-4 text-center'>Sorry, you don't have the sufficient rights to access this page. Contact the admin</h3>");?>
       </main>
        <?php
    }
    include_once 'footer.php';
?>
