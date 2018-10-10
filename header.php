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
                                <p>Call us <span>1300 day care</span></p>
                                <a href="tel:1300 329 227"> ( 1300 329 227 )</a>
                            </li>
                            <li>
                                <a href="#">ContacT Us</a>
                            </li>
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
                    <button data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle collapsed">
                    <span class="icon-bar"><span class="inner"></span></span>
                    <span class="icon-bar"><span class="inner"></span></span>
                    <span class="icon-bar"><span class="inner"></span></span></button>

                    <?php $logo = get_field('logo', 'options'); ?>
                    <?php if ($logo): ?>
                    <div class="navbar-brand">
                        <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive" alt="Logo Image"></a>
                    </div>
                    <?php endif; ?>
                </div>
            
                <div class="collapse navbar-collapse">
                    <div class="search">
                        <form action="" class="search-box">
                            <input type="search" name="s" class="text form-control" value="<?php the_search_query(); ?>" placeholder="Search..." />

                            <div class="search-icon">
                                <span class="fa fa-search"></span>
                            </div>
                        </form>
                        
                        <div class="search-icon close">
                            <span class="fa fa-close"></span>
                        </div>
                    </div>
                <?php if (function_exists('wp_nav_menu')): ?>
                    <?php wp_nav_menu( 
                          array(
                          'menu'               => 'Main Menu',
                          'theme_location'     => 'menu-1',
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
            </div>
        </nav>
    </header><!-- / Header Area  -->
    <div class="header_gutter"></div>