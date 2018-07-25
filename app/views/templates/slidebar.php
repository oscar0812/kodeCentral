<?php $c_user = \User::current()?>
<div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
  <div class="sb-slidebar-container">
    <header class="ms-slidebar-header">
      <div class="ms-slidebar-login">
        <?php $name = ($c_user == null)?'Account': $c_user->getUsername()?>
        <a href="<?=$router->pathFor('user-login-form')?>" class="withripple">
          <i class="zmdi zmdi-account"></i> <?=$name?></a>

        <?php if($c_user != null) { ?>
          <a href="<?=$router->pathFor('user-logout')?>" class="withripple">
            <i class="fa fa-sign-out"></i> Log out</a>
        <?php } ?>
      </div>
      <div class="ms-slidebar-title">
        <form class="search-form">
          <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
          <label for="search-box-slidebar">
            <i class="zmdi zmdi-search"></i>
          </label>
        </form>
        <div class="ms-slidebar-t">
          <span class="ms-logo ms-logo-sm">KC</span>
          <h3>Kode
            <span>Central</span>
          </h3>
        </div>
      </div>
    </header>
    <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
      <li>
        <a class="link" href="<?=$router->pathFor('home')?>">
          <i class="zmdi zmdi-home"></i> Home</a>
      </li>
      <?php if($c_user != null ) { ?>
      <li class="card" role="tab">
        <a class="collapsed" role="button" data-toggle="collapse" href="#sc1" aria-expanded="false" aria-controls="sc1">
          <i class="zmdi zmdi-comment"></i> Posts </a>
        <ul id="sc1" class="card-collapse collapse" role="tabpanel" aria-labelledby="sch1" data-parent="#slidebar-menu">
          <li>
            <a href="home-generic-2.php">My posts</a>
          </li>
          <li>
            <a href="<?=$router->pathFor('create-post')?>">Create New</a>
          </li>
          <li>
            <a href="home-landing.php">My Favorites</a>
          </li>
        </ul>
      </li>
      <?php } ?>
      <li>
        <a class="link" href="page-all.php">
          <i class="zmdi zmdi-star"></i> Favorites</a>
      </li>
      <li>
        <a class="link" href="<?=$router->pathFor('contact-us')?>">
          <i class="zmdi zmdi-email"></i> Contact Us</a>
      </li>
      <li>
        <a class="link" href="page-all.php">
          <i class="zmdi zmdi-favorite"></i> About Us</a>
      </li>
      <li>
        <a class="link" href="page-all.php">
          <i class="zmdi zmdi-link"></i> All Pages</a>
      </li>
    </ul>

  </div>
</div>
