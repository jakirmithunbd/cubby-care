<!DOCTYPE html>
<html lang=<?php language_attributes(); ?>>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?php the_field('favicon', 'options'); ?>" sizes="32x32">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <?php wp_head(); ?>
    <body <?php body_class(); ?>>
    <header class="header page-header-all">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline text-right">
                            <li>
                                <?php $phone = get_field('contacts', 'options'); ?>
                                <p><?php _e('Call us', 'cubby'); ?> <span><?php _e( '1300 day care', 'cubby' ); ?></span> </p> (<a href="tel:<?php echo $phone['phone']; ?>"><?php echo $phone['phone']; ?></a>)
                            </li>

                            <?php $contact_us = get_field('contacts', 'options'); ?>
                            <?php if ($contact_us['contact_us']): ?>
                            <li>
                                <a href="<?php echo $contact_us['contact_us']; ?>"><?php _e('ContacT Us', 'cubby'); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php $social = get_field('social_media' ,'options'); ?>
                            <?php if ($social): 
                            foreach ($social as $icons):
                            ?>
                                
                            <li class="social-media"> 
                                <a target="_blank" href="<?php echo $icons['url']; ?>"><span class="fa fa-<?php echo $icons['icon']['value']; ?>"></span></a>
                            </li>
                            <?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- / topbar -->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <ul class="social list-inline hidden">

                        <li>
                            <span id="search-button-mobile"><img src="<?php echo get_theme_file_uri('/assets/images/svg/search.svg'); ?>" alt=""></span>
                        </li>

                        <li>
                            <?php $phone = get_field('contacts', 'options'); ?>
                            <a href="tel:<?php echo $phone['phone']; ?>">
                                <img src="<?php echo get_theme_file_uri('/assets/images/svg/call.svg'); ?>" class="img-responsive" alt="">
                            </a>
                        </li>
                    </ul>
                    <a href="#sidr" class="openMenu navbar-toggle collapsed">
                        <span class="icon-bar"><span class="inner"></span></span>
                        <span class="icon-bar"><span class="inner"></span></span>
                        <span class="icon-bar"><span class="inner"></span></span>
                        <span class="icon-bar"><span class="inner"></span></span>
                    </a>

                    <?php $logo = get_field('logo', 'options'); ?>
                    <?php if ($logo): ?>
                    <div class="navbar-brand">
                        <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image"></a>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- search for mobile -->
                <?php echo cubby_search_form(); ?>
            
                <div id="sidr" class="collapse navbar-collapse">
                    <div class="top-bar hidden">
                        <ul class="list-inline">
                            <li>
                                <?php $phone = get_field('contacts', 'options'); ?>
                                <p><span><?php _e('Call us', 'cubby'); ?> </span><?php _e( '1300 day care', 'cubby' ); ?></p> (<a href="tel:<?php echo $phone['phone']; ?>"><?php echo $phone['phone']; ?></a>)
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mobile-menu hidden">
                        <?php if (function_exists('wp_nav_menu')): ?>
                            <?php wp_nav_menu( 
                                  array(
                                  'menu'               => 'Mobile Menu',
                                  'theme_location'     => 'menu-4',
                                  'depth'              => 2,
                                  'container'          => 'false',
                                  'menu_class'         => 'nav navbar-nav navbar-right',
                                  'menu_id'            => '',
                                  'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                  'walker'             => new wp_bootstrap_navwalker()
                                  ) 
                                ); 
                            ?>
                        <?php endif; ?>
                    </div>

                    <div class="desktop-menu">
                        <?php if (function_exists('wp_nav_menu')): ?>
                            <?php wp_nav_menu( 
                                  array(
                                  'menu'               => 'Main Menu',
                                  'theme_location'     => 'menu-1',
                                  'depth'              => 1,
                                  'container'          => 'false',
                                  'menu_class'         => 'nav navbar-nav navbar-right',
                                  'menu_id'            => '',
                                  'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                  'walker'             => new wp_bootstrap_navwalker()
                                  ) 
                                ); 
                            ?>
                        <?php endif; ?>
                    </div>

                    <!-- Mobile Search -->
                    <div class="search-button mobile-search">
                        <a href="#" data-selector="#sidr" class="search-toggle"></a>
                    </div>
                    <?php echo cubby_mobile_search(); ?>
                </div>
            </div>
        </nav>
    </header><!-- / Header Area  -->
    <div class="header_gutter"></div>