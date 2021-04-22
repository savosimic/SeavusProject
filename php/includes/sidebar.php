<?php

    session_start();

?>

   <div class="sidebar-menu">
       <div class="sidebar-header">
           <div class="logo">
               <p style="color: white">Welcome, <?php echo $_SESSION['username'];?> !</p>
           </div>
           <div class="submit-btn-area">
               <a href="includes/logout.php" id="form_submit" type="submit" name="logout">Logout <i class="ti-arrow-right"></i></a>
           </div>
       </div>
       <div class="main-menu">
           <div class="menu-inner">
               <nav>
                   <ul class="metismenu" id="menu">
                       <li class="<?php echo ($_SERVER['PHP_SELF'] == "./main.php" ? "active" : "active");?>">
                           <a href="main.php" aria-expanded="true"><i class="ti-home"></i><span>Home</span></a>
                       </li>
                       <li class="<?php echo ($_SERVER['PHP_SELF'] == "./users.php" ? "active" : "active");?>">
                           <a href="users.php" aria-expanded="true"><i class="ti-user"></i><span>Users</span></a>
                       </li>

                       <li class="<?php echo ($_SERVER['PHP_SELF'] == "./favorites.php" ? "active" : "active");?>">
                           <a href="favorites.php" aria-expanded="true"><i class="ti-heart"></i><span>Favorites</span></a>
                       </li>
                       <li class="<?php echo ($_SERVER['PHP_SELF'] == "./favorites.php" ? "active" : "active");?>">
                           <a href="additional.php" aria-expanded="true"><i class="ti-package"></i><span>Additional page</span></a>
                       </li>
                       <li class="<?php echo ($_SERVER['PHP_SELF'] == "./favorites.php" ? "active" : "active");?>">
                           <a href="axios.php" aria-expanded="true"><i class="ti-server"></i><span>Axios page</span></a>
                       </li>
                   </ul>
               </nav>
           </div>
       </div>
   </div>
