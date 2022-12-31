<?php
    include_once 'header.php';
    $root_url = "http://".$_SERVER['SERVER_NAME']."/";
    if(isset($_SESSION['sid']) && isset($_SESSION['member_type']) && $_SESSION['member_type'] == 'admin')
    {
        include_once './includes/admin-pages/admin-sidebar.php';
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
        echo("<h3>Sorry, you don't have the sufficient rights to access this page. Contact the admin</h3>");
    }
    include_once 'footer.php';
?>
