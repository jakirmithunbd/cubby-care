
<?php 
get_header('home');
/*
Template Name: Home
*/ 
?>    
    <section class="banner">
    	<?php $banner = get_field('banner_slider'); 

    		if ($banner): 
    			foreach ($banner as $item):
    	?>
        <div class="slider-item" style="background: url(<?php echo $item['banner_image']; ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <div class="banner-info">
                        	<?php if ($item['title']): ?>
                            <h2 class="wow fadeInDown"><?php echo $item['title']; ?></h2>
                        	<?php endif; ?>
                            <ul class="list-inline wow fadeInUp">
								<?php $btns = $item['home_banner_button']; 
								if ($btns):
								foreach ($btns as $btn):
								?>
                                <li>
                                    <a class="btn" href="<?php echo $btn['url'] ?>"><?php echo $btn['text']; ?></a>
                                </li>
								<?php endforeach; endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- / Slider item -->
    	<?php endforeach; endif; ?>

    </section><!-- / Banner -->


    <section class="services">
        <div class="container">
            <div class="row">
                <?php $services = get_field('service'); 
                if($services):
                    foreach ($services as $service):
                ?>
                <div class="col-md-4 col-sm-6 col-xs-6 col wow fadeInUp">
                    <div class="service">
                        <?php if ($service['image']): ?>
                        <div class="media">
                            <img src="<?php echo $service['image'] ?>" class="img-responsive" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="service-info text-center">

                            <?php if ($service['title']): ?>
                            <h4><?php echo $service['title']; ?></h4>
                            <?php endif; ?>
                            
                            <?php if ($service['description']): ?>
                                <?php echo $service['description']; ?>
                            <?php endif; ?>
                            
                            <?php $btn = $service['button']; ?>
                            <?php if ($btn['text'] && $btn['link']): ?>
                            <a class="btn" href="<?php echo $btn['link']; ?>"><?php echo $btn['text']; ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- / Service item -->
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section><!-- / Services -->
	
	<?php 
	$bg = get_field('committed_image'); 
	$title = get_field('committed_title');
	$des = get_field('committed_description');
	$btn = get_field('committed_btn');
	?>
    <section class="committed" style="background: url(<?php echo $bg; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-8">
                    <div class="content">
                    	<?php if ($title): ?>
                        <h1 class="wow fadeInDown"><?php echo $title; ?></h1>
                    	<?php endif; ?>

                    	<?php if ($des): ?>
                    		<?php echo $des; ?>
                    	<?php endif; ?>

						<?php if ($btn): ?>
                        <a target="_blank" class="btn wow fadeInUp" href="<?php echo $btn['rul'] ?>"><?php echo $btn['text'] ?></a>
						<?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- / Committed -->

    <section class="latest-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2  class="wow fadeInDown"><?php _e('Latest News', 'cubby'); ?></h2>
                    </div>
                </div>
            </div>

            <div class="row latest-post-slider">
            	<?php 
            	$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
					);
				?>

            	<?php $loop = new WP_Query($args); ?>
            	<?php if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="post wow fadeInUp">
                        <a href="<?php the_permalink(); ?>">
                            <div class="media">
                                <?php if (has_post_thumbnail()): ?>
		                        <?php the_post_thumbnail(null, array('class' => 'img-responsive')); ?>
		                        <?php endif ?>
                            </div>
                        </a>

                        <div class="post-meta">
                            <ul class="list-inline visible-xs">
                                <li>
                                    <?php the_category(); ?>
                                </li>
                                <li>
                                    <span><?php echo get_the_date('d M Y'); ?></span>
                                </li>
                            </ul>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php the_excerpt(); ?>
                            <a class="read-more" class="text-uppercase" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cubby') ?></a>
                        </div>
                    </div><!-- /  Post -->
                <?php endwhile; endif; ?>

            </div>
        </div>
    </section><!-- / Latest Post -->

    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2  class="wow fadeInDown"><?php _e('What our parents say', 'cubby'); ?></h2>
                    </div>
                </div>
            </div>

            <div class="testimonials-slider">
            	<?php 
            	$args = array(
					'post_type' => 'tesimonials',
					'posts_per_page' => -1
					);
				?>

            	<?php $loop = new WP_Query($args); ?>
            	<?php if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post(); ?>

            	<?php 
            	$testi = get_field('testimonals'); ?>
				
            	<?php 
            	$color = $testi['bg_color'];
            	$img = $testi['image'];
            	$name = $testi['name'];
                $quote = $testi['quote'];
            	$date = $testi['testi_data'];
            	?>
                <div class="slick-slider-item wow fadeInUp">
                    <div class="testimonial-box" style="color: <?php echo $color; ?>;">
                        <span class="pull-left"><img src="<?php echo get_theme_file_uri( 'assets/images/svg/quote-left.svg' ); ?>" alt=""></span>

                        <?php if ($quote): ?>
                        <p><?php echo $quote; ?>
                        <span class="right-quote"><img src="<?php echo get_theme_file_uri( 'assets/images/svg/quote-right.svg' ); ?>" alt=""></span></p>
                        <?php endif; ?>

                    </div>

                    <div class="parents-info">
                    	<?php if ($img): ?>
                        <div class="parent-image pull-left">
                            <img src="<?php echo $img; ?>" class="img-responsive" alt="">
                        </div>
                    	<?php endif; ?>

                        <div class="description">
                    		<?php if ($name): ?>
                            <h5><?php echo $name; ?></h5>
                    		<?php endif; ?>

                            <?php if ($date): ?>
                                <p><?php echo $date; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div><!-- / slider item -->
				<?php endwhile; endif; ?>
            </div><!-- / slider -->
        </div>
    </section><!-- / Testimonial -->
	

   <?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>