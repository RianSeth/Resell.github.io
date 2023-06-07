<?php
if (isset($_SESSION['sesi'])) {
?>
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
<section class = "admin">

    <!-- navbar -->
    <nav class="navbar1">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="images/logo.png" alt=""><?php echo $_SESSION['sesi'] ?></i>
      </div>

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-moon' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        <a href="index.php?p=logout"><i class='bx bx-log-out'></i></a>
      </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>

          <!-- Home Button -->
          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>
          <!-- Home Button -->

          <!-- <li class="item"> 
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-grid-alt"></i>
              </span>
              <span class="navlink">Overview</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
            </ul>
          </li> -->
        </ul>

        <ul class="menu_items">
          <div class="menu_title menu_editor"></div>
          
          <!-- Admin Menu -->
          <li class="item">
            <a href="index.php?p=index-data&p2=admin" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-user"></i>
              </span>
              <span class="navlink">Admin</span>
            </a>
          </li>
          <!-- Admin Menu -->

          <!-- Product Menu -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-box"></i>
              </span>
              <span class="navlink">Product</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="index.php?p=index-data&p2=list-produk" class="nav_link sublink">All Product</a>
              <a href="index.php?p=index-data&p2=input-produk-proses" class="nav_link sublink">Input Product</a>
              <!-- <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a> -->
            </ul>
          </li>
          <!-- Product Menu -->

        </ul>

        <!-- <ul class="menu_items">

          <div class="menu_title menu_setting"></div>
          
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-notepad"></i>
              </span>
              <span class="navlink">Report</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
              <a href="#" class="nav_link sublink">Nav Sub Link</a>
            </ul>
          </li>
          
        </ul> -->

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    
    <section class="home">

      <?php
      $pages_dir1='pages\admin';
      $pages_dir2='pages\produk';
      $pages_dir3='pages\produk\proses';
      if(!empty($_GET['p2'])){
        $p2=$_GET['p2'];
        $pages=scandir($pages_dir1,0);
        unset($pages[0],$pages[1]);
        $pages1=scandir($pages_dir2,0);
        unset($pages1[0],$pages1[1]);
        $pages2=scandir($pages_dir3,0);
        unset($pages2[0],$pages2[1]);
        if (in_array($p2.'.php',$pages)) {
            include($pages_dir1.'/'.$p2.'.php');
        }
        elseif (in_array($p2.'.php',$pages1)) {
          include($pages_dir2.'/'.$p2.'.php');
        }
        elseif (in_array($p2.'.php',$pages2)) {
          include($pages_dir3.'/'.$p2.'.php');
        }
        else {
            echo'Halaman Tidak Ditemukan';
        }
      }else{
        include($pages_dir1.'/home.php');
      }

      ?>

    </section>

</section>
<?php
}
else{
  echo "<script>alert('Silahkan login dahulu')</script>";
  header('location:index.php?p=beranda');
}
?>