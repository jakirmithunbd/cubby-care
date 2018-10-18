  <footer class="footer">
      <div class="container">
          <div class="row footer-top">
              <?php $logo = get_field('footer_logo', 'options'); ?>
              <?php if ($logo): ?>
              <div class="col-md-6 col-sm-6 col-xs-6 col">
                  <div class="footer-logo">
                      <a href="<?php echo site_url(); ?>">
                          <img src="<?php echo $logo; ?>" class="img-responsive" alt="">
                      </a>
                  </div>
              </div>

              <?php endif; ?>
              <?php $copy_right = get_field('copy_right', 'options'); ?>
              <?php if ($copy_right): ?>
              <div class="col-md-6 col-sm-6 col-xs-6 col">
                  <div class="copy-right text-right">
                      <p><?php echo $copy_right; ?></p>
                  </div>
              </div>
              <?php endif; ?>
          </div>
          
          <div class="row footer-bottom">
              <div class="col-md-6 col-sm-6 col-xs-6 col">
                  <div class="row footer-menu">

                  <?php if (function_exists('wp_nav_menu')): ?>
                      <?php wp_nav_menu( 
                            array(
                            'menu'               => 'Footer Menu',
                            'theme_location'     => 'menu-2',
                            'depth'              => 2,
                            'container'          => 'false',
                            'menu_class'         => 'nav navbar-nav col-md-6 col-xs-6',
                            'menu_id'            => '',
                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                            'walker'             => new wp_bootstrap_navwalker()
                            ) 
                          ); 
                      ?>
                  <?php endif; ?>

                      <?php if (function_exists('wp_nav_menu')): ?>
                      <?php wp_nav_menu( 
                            array(
                            'menu'               => 'Footer Right Menu',
                            'theme_location'     => 'menu-3',
                            'depth'              => 2,
                            'container'          => 'false',
                            'menu_class'         => 'nav navbar-nav col-md-6 col-xs-6',
                            'menu_id'            => '',
                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                            'walker'             => new wp_bootstrap_navwalker()
                            ) 
                          ); 
                      ?>
                  <?php endif; ?>
                  </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-3 col">
                  <div class="quick-contact">
                      <p>Connect with us</p>
                      <ul class="list-inline">

                          <?php $social = get_field('social_media' ,'options'); ?>
                          <?php if ($social): 
                          foreach ($social as $icon):
                          ?>
                              
                          <li class="social-media"> 
                              <a href="<?php echo $icon['url']; ?>"><span class="fa fa-<?php echo $icon['icon']['value']; ?>"></span></a>
                          </li>
                          <?php endforeach; endif; ?>
                      </ul>

                  </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-3 col">
                  <div class="quick-contact">
                      <?php $phone = get_field('contacts', 'options'); ?>
                      <p><?php _e('Call us', 'cubby'); ?> <span><?php _e( '1300 day care', 'cubby' ); ?></span> <br> (<a href="tel:<?php echo $phone['phone']; ?>"><?php echo $phone['phone']; ?></a>)</p>

                  </div>
              </div>
          </div>
      </div>
  </footer>
        
    <?php wp_footer(); ?>
    </body>
</html>