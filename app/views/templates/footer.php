<?php $c_user = \User::current();
      if(!isset($home)) $home = '';
      $latest_posts = \PostQuery::create()->orderByPostedDate('desc')->limit(3)->find();?>
<aside class="ms-footbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 ms-footer-col">
        <div class="ms-footbar-block">
          <h3 class="ms-footbar-title">Sitemap</h3>
          <ul class="list-unstyled ms-icon-list three_cols">
            <li>
              <a href="<?=$router->pathFor('search')?>">
                <i class="zmdi zmdi-search"></i> Search</a>
            </li>
            <li>
              <a href="<?=$router->pathFor('about-us')?>">
                <i class="zmdi zmdi-favorite-outline"></i> About Us</a>
            </li>
            <li>
              <a href="<?=$router->pathFor('faq')?>">
                <i class="zmdi zmdi-help"></i> FAQ</a>
            </li>
            <?php if($c_user == null) { ?>
            <li>
              <a href="<?=$router->pathFor('user-login-form')?>">
                <i class="zmdi zmdi-lock"></i> Login</a>
            </li>
            <?php } else { ?>
            <li>
              <a href="<?=$router->pathFor('user-login-form')?>">
                  <i class="zmdi zmdi-face"></i> Profile</a>
            </li>
            <?php }?>
            <li>
              <a href="<?=$router->pathFor('contact-us')?>">
                <i class="zmdi zmdi-email"></i> Contact</a>
            </li>
            <li>
              <a href="<?=$router->pathFor('all-pages')?>">
                <i class="zmdi zmdi-link"></i> All Pages</a>
            </li>
          </ul>
        </div>
        <div class="ms-footbar-block">
          <h3 class="ms-footbar-title">Subscribe</h3>
          <p class="">Stay in the loop with our fast and easy emailing system! Just enter your address and subscribe.</p>
          <form method="post" action="<?=$router->pathFor('subscribe-submit')?>" id="subscribe-footer">
            <div class="form-group label-floating mt-2 mb-1">
              <div class="input-group ms-input-subscribe">
                <label class="control-label" for="ms-subscribe">
                  <i class="zmdi zmdi-email"></i> Email Adress</label>
                <input type="email" id="ms-subscribe" name="email" class="form-control" value="<?=$c_user==null?'':$c_user->getEmail()?>">
              </div>
            </div>
            <button class="footer-subscribe-btn" type="submit">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="col-lg-5 col-md-7 ms-footer-col ms-footer-alt-color">
        <div class="ms-footbar-block">
          <h3 class="ms-footbar-title text-center mb-2">Latest Posts</h3>
          <div class="ms-footer-media">

            <?php foreach ($latest_posts as $post) { ?>
            <!-- media block -->
            <?php $path = $router->pathFor('view-post', ['hyperlink'=>$post->getHyperlink()])?>
            <div class="media">

              <div class="media-body">
                <h4 class="media-heading">
                    <a href="<?=$path?>">
                      <?=$post->getTitle()?></a>
                  </h4>
                <div class="media-footer">
                  <span data-url="<?=$path?>"><?=$post->getSummary()?></span><br>
                  <span>
                      <i class="zmdi zmdi-time color-info-light"></i> <?=$post->getPostedDate()->format('F d, Y')?></span>
                  <span>
                      <i class="zmdi zmdi-folder-outline color-warning-light"></i>
                      <?php $lib_name = $post->getLibrary()->getName()?>
                      <a href="<?=$router->pathFor('library', ['name'=>$lib_name])?>"><?=$lib_name?></a>
                    </span>
                </div>
              </div>
            </div>
            <!-- /media block -->
            <?php } ?>

          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-5 ms-footer-col ms-footer-text-right">
        <div class="ms-footbar-block">
          <div class="ms-footbar-title">
            <span class="ms-logo ms-logo-white ms-logo-sm mr-1">KC</span>
            <h3 class="no-m ms-site-title">Kode
              <span>Central</span>
            </h3>
          </div>
          <address class="no-mb">
            <p>
              <i class="color-danger-light zmdi zmdi-pin mr-1"></i> 413 Crosswinds Cir Dr</p>
            <p>
              <i class="color-warning-light zmdi zmdi-map mr-1"></i> Weslaco, TX 78596</p>
            <p>
              <i class="color-info-light zmdi zmdi-email mr-1"></i>
              <a href="mailto:team@aszend.com">team@aszend.com</a>
            </p>
            <p>
              <i class="color-danger-light zmdi zmdi-globe mr-1"></i>
              <a href="https://aszend.com">Aszend Digital, LLC</a></p>

          </address>
        </div>
        <div class="ms-footbar-block">
          <h3 class="ms-footbar-title">Social Media</h3>
          <div class="ms-footbar-social">
            <a href="https://www.facebook.com/Aszend-Digital-889951031194641/" class="btn-circle btn-facebook">
                    <i class="zmdi zmdi-facebook"></i>
                  </a>
            <a href="https://github.com/oscar0812" class="btn-circle btn-github">
                    <i class="zmdi zmdi-github"></i>
                  </a>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>
<footer class="ms-footer">
  <div class="container">
    <p>Copyright &copy; Aszend Digital 2018-2019</p>
  </div>
</footer>
<div class="btn-back-top">
  <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised ">
    <i class="zmdi zmdi-long-arrow-up"></i>
  </a>
</div>
