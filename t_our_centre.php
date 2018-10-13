<?php 
get_header();
/*
Template Name: Our Centre
*/ 
$page_id = get_queried_object_id();
?>   

<?php echo cubby_page_banner(); ?>

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
                            <?php _e('List View', 'cubby'); ?></a>
                        </li>
                        <li>
                            <a href="#sec_2" data-toggle="tab"><span class="fa fa-map-marker"></span><?php _e('Map View', 'cubby'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="sec_1">
                <?php 
	            	$args = array(
						'post_type' => 'centre',
						'posts_per_page' => -1
					);
				?>

            	<?php $cloop = new WP_Query($args); ?>
            	<?php if($cloop->have_posts()) : while($cloop->have_posts()) : $cloop->the_post(); ?>
                    <div class="center row">
                        <div class="col-md-3 col-sm-3">
                            <div id="map">
                                <?php $google_map = get_field('google_map'); ?>

                                <iframe src="http://maps.google.com/maps?q=<?php echo $google_map['lat']; ?>, <?php echo $google_map['lng']; ?>&z=15&output=embed" width="100%" height="123" frameborder="0" style="border:0" marginheight="0" marginwidth="0" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="col-md-9 col-sm-9">
                            <ul class="center-info">
                                <li>
                                    <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                    <?php $address = get_field('centre_address'); ?>

                                    <?php if ($address['address']): ?>
                                    <p><?php echo $address['address']; ?></p>
                                    <?php endif; ?>

                                    <?php if ($address['phone']): ?>
                                    <p>p <a class="phone" href="tel:<?php echo $address['phone']; ?>"><?php echo $address['phone']; ?></a></p>
                                    <?php endif; ?>

                                    <?php if ($address['email']): ?>
                                    <p>e <a href="mailto:<?php echo $address['email']; ?>"><?php echo $address['email']; ?></a></p>
                                    <?php endif; ?>
                                </li>

                                <li class="opening-hour">
                                    <div class="permalink text-right">
                                        <a class="btn" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cubby'); ?></a>
                                        <a class="btn" href="#"><?php _e('Enquire Now', 'cubby'); ?></a>
                                    </div>
                                    
                                    <?php $open = get_field('opening_hours'); ?>
                                    <div class="opening">
                                        <h5><?php _e('Opening hours', 'cubby'); ?></h5>

                                        <div class="icon">
                                        <?php $items = $open['social-media']; 
                                        if ($items):
                                            foreach ($items as $item):
                                        ?>

                                            <a href="<?php echo $item['url']; ?>"><span class="fa fa-<?php echo $item['icon']['value']; ?>"></span></a>
                                        <?php endforeach; endif; ?>
                                        </div>
                                        <?php if ($opening_hour['opening_hour']): ?>
                                        <p><?php echo $opening_hour['opening_hour']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- / list -->
				<?php endwhile; endif; wp_reset_postdata(); ?>

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