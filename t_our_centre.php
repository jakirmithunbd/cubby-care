<?php 
get_header();
/*
Template Name: Our Centre
*/ 
?>   
<?php $banner = get_field('centre_banner_content'); ?>
<section class="page-banner" style="background: url(<?php echo $banner['image']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-banner-info">
                	<?php if ($banner['title']): ?>
                    <h2><?php echo $banner['title']; ?></h2>
                	<?php endif; ?>

                	<?php if ($banner['description']): ?>
                    	<?php echo $banner['description']; ?>
                	<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- / Banner -->

    <div class="centers">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-xs-4 col">
                    <?php echo beacon_breadcrumb(); ?>
                </div>

                <div class="col-md-8 col-xs-8 col">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#sec_1" data-toggle="tab"><span class="fa fa-list"></span>
                            List View</a>
                        </li>
                        <li>
                            <a href="#sec_2" data-toggle="tab"><span class="fa fa-map-marker"></span>Map View</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="sec_1">
                <!-- <?php 
	            	$args = array(
						'post_type' => 'centre',
						'posts_per_page' => -1
					);
				?>

            	<?php $loop = new WP_Query($args); ?>
            	<?php if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post(); ?> -->
                    <div class="center row">
                        <div class="col-md-3 col-sm-3">
                            <div id="map">
                                <img src="../assets/images/sm-map.png" class="img-responsive" alt="">
                            </div>
                        </div>

                        <div class="col-md-9 col-sm-9">
                            <ul class="center-info">
                                <li>
                                    <h4><a href="#">Westcourt Centre</a></h4>
                                    <p>40-42 Tills Street, Westcourt QLD 4870</p>
                                    <p>p <a class="phone" href="tel:(07) 4033 5170">(07) 4033 5170</a></p>
                                    <p>e <a href="mailto:westcourt@cubbycare.com.au">westcourt@cubbycare.com.au</a></p>
                                </li>

                                <li class="opening-hour">
                                    <div class="permalink text-right">
                                        <a class="btn" href="#">Read More</a>
                                        <a class="btn" href="#">Enquire Now</a>
                                    </div>

                                    <div class="opening">
                                        <h5>Opening hours</h5>
                                        <div class="icon">
                                            <a href="#"><span class="fa fa-facebook"></span></a>
                                            <a href="#"><span class="fa fa-envelope-o"></span></a>
                                        </div>
                                        <p>6.30am - 6.30pm<br>
                                        Monday - Friday</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- / list -->
				<?php endwhile; endif; ?>

                </div><!-- / list center -->

                <div class="tab-pane fade" id="sec_2">
                    
                </div><!-- / map -->
            </div>

        </div>
    </div><!-- / About Us -->

    <div id="gmap">
                    	
    </div>

    <?php echo cubby_get_booking_room(); ?>
<?php get_footer(); ?>