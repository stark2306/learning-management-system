<main>
  <section class="admin-panel">
    <article class="row">
      <aside class="col-2 pb-4  pr-0">
        <span class="p-4 text-white text-left d-inline-block"><?php echo "Welcome, ".$_SESSION['user_display_name'];?></span>
        <nav>
          <ul class="pl-4">
          <li class="d-flex align-items-center mb-3">
              <span class="material-icons material-icons-outlined">
                grid_4x4
              </span>
              <a href="http://cricketacademy.test/admin.php">Dashboard </a>
            </li>
            <li class="d-flex align-items-center mb-3">
              <span class="material-icons material-icons-outlined">
                account_box
              </span>
              <a href="http://cricketacademy.test/includes/admin-pages/users.php">Users</a>
            </li>
            <li class="d-flex align-items-center mb-3">
              <span class="material-icons material-icons-outlined">
                login
              </span>
              <a href="http://cricketacademy.test/includes/admin-pages/show-testimonial.php">Testimonials</a>
            </li>
            <li class="d-flex align-items-center mb-3">
              <span class="material-icons material-icons-outlined">
                login
              </span>
              <a href="http://cricketacademy.test/logout.php">Logout</a>
            </li>
          </ul>
        </nav>
      </aside>
