<div id="site-menu">
  <a class="navbar-brand roboto-bold" href="#"><i class="fa fa-navicon"></i> Loggy</a> <a class="pull-right close" href="#"><i class="fa fa-close"></i></a>

  <ul class="off-menu">
    <li>
      <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a>
    </li>

    <li>
      <a href="<?php echo base_url('Music') ?>"><i class="fa fa-headphones"></i> Music</a>
    </li>


    <li>
      <a href="<?php echo base_url('Video') ?>"><i class="fa fa-film"></i> Movie</a>
    </li>


    <li>
      <a href="<?php echo base_url('Book') ?>"><i class="fa fa-book"></i> Books</a>
    </li>
  </ul>
</div>


<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand roboto-bold toggle-site-menu" href="#" id="menu-corner"><i class="fa fa-navicon"></i> Loggy</a>

      <ul class="nav navbar-nav pull-right">
        <?php 
          //this is for admin menu
          if(null != $this->session->userdata('loggedin')): 
        ?>

        <li>
          <a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>


        <li class="dropdown">
          <a data-toggle="dropdown" class="roboto-bold"><i class="fa fa-plus"></i> Add Entry <span class="caret"></span></a>

          <ul class="dropdown-menu dropdown-menu-right">
            
            <li>
              <a href="<?php echo base_url('admin/Video/edit') ?>"><i class="fa fa-film"></i> Movies</a>
            </li>

            <li>
              <a href="<?php echo base_url('admin/Music/edit') ?>"><i class="fa fa-headphones"></i> Music</a>
            </li>

            <li>
              <a href="<?php echo base_url('admin/Book/edit') ?>"><i class="fa fa-book"></i> Book</a>
            </li>

          </ul>
        </li>


        <li class="dropdown">
          <a class="roboto-bold" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('name') ?> <span class="caret"></span></a>

          <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-header">Account</li>


            <li class="img"><img class="img-responsive img-circle" src="<?php echo base_url('images/pp.png')  ?>">
            </li>

            <li>
              <a href="<?php echo base_url('admin/user/setting') ?>"><?php echo $this->session->userdata('name') ?></a>
            </li>


            <li class="dropdown-header">Favourite</li>


            <li>
              <a href="<?php echo base_url('admin/music') ?>"><i class="fa fa-headphones"></i> Music</a>
            </li>


            <li>
              <a href="<?php echo base_url('admin/video') ?>"><i class="fa fa-film"></i> Movie</a>
            </li>


            <li>
              <a href="<?php echo base_url('admin/book') ?>"><i class="fa fa-book"></i> Books</a>
            </li>


            <li class="divider">
            </li>


            <li>
              <a href=" <?php echo base_url('admin/user/logout')  ?>"><i class="fa fa-power-off"></i> Sign Out</a>
            </li>
            <?php else: ?>

            <li>
              <a href=" <?php echo base_url('admin/user/login')  ?>"><i class="fa fa-lock"></i>Login</a>
            </li>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>