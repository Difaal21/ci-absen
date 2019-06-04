<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Absensi</div>
      </a>
      <!-- QUERY MENU -->
      <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu =
        "
        SELECT `user_menu`.`id`,`menu`
        FROM `user_menu` JOIN `user_access_menu`
        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
        WHERE `user_access_menu`.`role_id` = $role_id
        ORDER BY `user_access_menu`.`menu_id` DESC 
        ";
      $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- Looping Menu -->
      <?php foreach ($menu as $m) : ?>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading ">
          <?= $m['menu']; ?>
        </div>

        <!-- SUBMENU -->
        <?php
        $menuId = $m['id'];
        $querySubmenu =
          "
          SELECT * 
          FROM `user_sub_menu` JOIN `user_menu`
          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
          WHERE `user_sub_menu`.`menu_id`=  $menuId
          ";
        $subMenu =  $this->db->query($querySubmenu)->result_array();
        ?>

        <!-- Looping SubMenu -->
        <?php foreach ($subMenu as $sm) : ?>
          <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active ">
            <?php else : ?>
            <li class="nav-item deactive">
            <?php endif; ?>
            <a class="nav-link pt-1 " href="<?= base_url($sm['url']); ?>">
              <i class="<?= $sm['icon'] ?>"></i>
              <span><?= $sm['title'] ?></span></a>
          </li>
        <?php endforeach; ?>
      <?php endforeach; ?>
      <!-- AKHIR Looping Menu -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">