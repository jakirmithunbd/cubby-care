<?php get_header(); ?>

<?php echo cubby_page_banner(); ?>

<div class="centers-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo beacon_breadcrumb(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <ul class="list-inline">
                        <li>
                            <h5><?php the_title(); ?></h5>
                        </li>
                        <li class="social-media">
                        	<?php $open = get_field('opening_hours'); ?>
                            <?php $social_media = $open['social_media']; 
                            if ($social_media):
                                foreach ($social_media as $item):
                            ?>
                                <a href="<?php echo $item['url']; ?>"><span class="fa fa-<?php echo $item['icon']; ?>"></span></a>
                            <?php endforeach; endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="centre-wrap">
            <div class="row">
                <div class="col-md-3">
                   <div class="contre-sidebar">
                       <div id="map">
                           <?php $google_map = get_field('google_map'); ?>

                            <iframe src="http://maps.google.com/maps?q=<?php echo $google_map['lat']; ?>, <?php echo $google_map['lng']; ?>&z=15&output=embed" width="100%" height="236" frameborder="0" style="border:0" marginheight="0" marginwidth="0" allowfullscreen></iframe>
                       </div>
						
						<?php $address = get_field('centre_address'); ?>

                       <div class="address-details">
                           <h3><?php _e( 'Centre Details', 'cubby' ); ?></h3>

                           <?php $address = get_field('centre_address'); ?>
                            <?php if ($address['address']): ?>
                            <address><?php echo $address['address']; ?></address>
                            <?php endif; ?>

                            <?php if ($address['phone']): ?>
                            <p>p <a class="phone" href="tel:<?php echo $address['phone']; ?>"><?php echo $address['phone']; ?></a></p>
                            <?php endif; ?>

                            <?php if ($address['email']): ?>
                            <p>e <a href="mailto:<?php echo $address['email']; ?>"><?php echo $address['email']; ?></a></p>
                            <?php endif; ?>
                       </div>

                       <div class="opening-hour">
                           <h6><?php _e('Opening hours', 'cubby'); ?></h6>
                           <?php if ($open['opening_hour']): ?>
                            <p><?php echo $open['opening_hour']; ?></p>
                            <?php endif; ?>
                       </div>

						<?php $btn = $open['enquire_button']; ?>
                       <a class="btn" href="<?php echo $btn['url']; ?>"><?php echo $btn['text']; ?></a>
                   </div> 
                </div>
                <div class="col-md-9">
                    <div class="centre-tabs">
                        <ul class="nav nav-tabs hidden-xs">
                            <?php
							$tabs = [
								'centre_overview', 
								'centre_offering', 
								'centre_our_team_member',
								'centre_gallery',
								'centre_booking_form'
							];

							foreach ($tabs as $key => $tab):
							$active = $key === 0 ? 'active' : '';
							$text = get_field($tab);
								printf('<li class="%s"><a href="#count_%s" data-toggle="tab">%s</a></li>', $active, $key, $text['tab_menu']);

							endforeach; 
							?>
                        </ul>

                        <div class="row">
                            <div class="col-sm-12 no-padding-custom">
                                <ul class="nav-tabs nav visible-xs">
                                    <select id="sticky_tab_select">
                                    <?php 
                                        foreach ($tabs as $key => $tab):
                                            $text = get_field($tab);
                                            printf('<option value="count_%s" data-toggle="tab">%s</option>',$key, $text['tab_menu']);
                                        endforeach; 
                                    ?>
                                    </select>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade in overview active" id="count_0">
                            	<?php 
                            	$over = get_field('centre_overview');
                            	$top  = $over['top_description'];
                            	?>
                                <div class="top-text">
                                	<?php if ($top['title']): ?>
                                    <h3><?php echo $top['title']; ?></h3>
                                	<?php endif; ?>
									
									<?php if ($top['description']): ?>
										<?php echo $top['description']; ?>
									<?php endif; ?>
                                </div>

                                <div class="list-title">
                                    <?php $list = $over['list_items']; ?>
                                    <?php echo $list; ?>
                                </div>

                                <div class="testimonials-wrapper">
                                    <div class="title">
                                        <h3><?php echo _e( 'What our parents say', 'cubby' ); ?></h3>
                                    </div>

                                    <div class="testimonials">
                                    	<?php $testimonials = $over['centre_testimonals']; 
                                    	if($testimonials):
                                    		foreach ($testimonials as $testimonial):
                                    	?>
                                        <div class="testimonial">
                                            <div class="testimonial-box" style="color: <?php echo $testimonial['bg_color'] ?>;">
                                                <span class="pull-left"><img src="<?php echo get_theme_file_uri( 'assets/images/svg/quote-left.svg' ); ?>" alt=""></span>
                                                <p>
                                                <?php echo $testimonial['quote']; ?>
                                                <span class="right-quote"><img src="<?php echo get_theme_file_uri( 'assets/images/svg/quote-right.svg' ); ?>" alt=""></span>
                                                </p>
                                            </div>

                                            <div class="parents-info">
                                            	<?php if ($testimonial['image']): ?>
                                                <div class="parent-image pull-left">
                                                    <img src="<?php echo $testimonial['image']; ?>" class="img-responsive" alt="">
                                                </div>
                                            	<?php endif; ?>

                                                <div class="description">
                                                	<?php if ($testimonial['name']): ?>
                                                    <h5><?php echo $testimonial['name'] ?></h5>
                                                	<?php endif; ?>
                                                    <p><?php echo get_the_date("F Y"); ?></p>
                                                </div>
                                            </div>
                                        </div><!-- / testimonial -->
										<?php endforeach; endif; ?>
                                    </div><!-- / testimonials -->
                                </div><!-- / testimonials wrapper -->
                            </div><!-- / overview -->
                            <div class="tab-pane fade overview" id="count_1">
                            	<?php 
                            	$offer = get_field('centre_offering');
                            	?>
                                <div class="top-text">
                                	<?php if ($offer['title']): ?>
                                    <h3><?php echo $offer['title']; ?></h3>
                                	<?php endif; ?>
									
									<?php if ($offer['offer_description']): ?>
										<?php echo $offer['offer_description']; ?>
									<?php endif; ?>
                                </div>
                            </div><!-- / offer -->

                             <div class="tab-pane fade people" id="count_2">

                             	<?php 
                            	$team = get_field('centre_our_team_member');
                            	$top  = $team['top_text'];
                            	?>
                                <div class="top-text">
                                	<?php if ($top['title']): ?>
                                    <h3><?php echo $top['title']; ?></h3>
                                	<?php endif; ?>
									
									<?php if ($top['description']): ?>
										<?php echo $top['description']; ?>
									<?php endif; ?>
                                </div>

                                <?php $peoples = $team['team_members']; 
		                        ?>
		                        <?php if($peoples): 
		                            foreach ($peoples as $item):
		                        ?>
		                        <div class="team-member">
		                            <?php if ($item['image']): ?>
		                            <div class="media pull-left">
		                                <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
		                            </div>
		                            <?php endif; ?>

		                            <div class="team-meta">
		                                <?php if ($item['name'] || $item['title'] || $item['position']): ?>
		                                <div class="title">
		                                    <?php if ($item['name'] || $item['title']): ?>
		                                    <h4><?php echo $item['name']; ?> <span><?php echo $item['name']; ?></span></h4>
		                                    <?php endif; ?>
		                                    
		                                    <?php if ($item['position']): ?>
		                                    <p><?php echo $item['position']; ?></p>
		                                    <?php endif; ?>

		                                </div>
		                                <?php endif; ?>
		                                
		                                <?php if ($item['description']): ?>
		                                    <?php echo $item['description']; ?>
		                                
		                                <?php endif; ?>
		                            </div>
		                        </div><!-- / team -->
		                        <?php endforeach; endif; ?>
                            </div><!-- / team pane -->

                        <div class="tab-pane fade people" id="count_3">
                            <div class="gallery container">
                                <div class="masonry-container">
                                    <?php $img = get_field('centre_gallery'); ?>

                                    <?php 
                                    $items = $img['images'];
                                    if($items): foreach ($items as $item):?>
                                    <div class="item">
                                        <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
                                    </div><!-- / Gallery item -->
                                    <?php endforeach; endif; ?>
                                </div><!-- / Gallery container -->
                            </div><!-- / Gallery -->
                        </div>  

                        <div class="tab-pane fade" id="count_4">
                            <div class="contact-form">
							<div class="tour-info text-center">
								<h2><?php _e('Book A Tour', 'cubby'); ?></h2>
								<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
							</div>
                        </div>             
                    </div><!-- / Centre Tabs -->
                </div><!-- / col -->
            </div>
        </div>
    </div>
</div><!-- / About Us -->
</div>

    <section class="latest-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2><?php _e('Latest news', 'cubby'); ?></h2>
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
                    <div class="post">
                        <a href="<?php the_permalink(); ?>">
                            <div class="media">
                                <?php if (has_post_thumbnail()): ?>
		                        <?php the_post_thumbnail(null, array('class' => 'img-responsive')); ?>
		                        <?php endif ?>
                            </div>
                        </a>

                        <div class="post-meta">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php the_excerpt(); ?>
                            <a class="read-more" class="text-uppercase" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cubby') ?></a>
                        </div>
                    </div><!-- /  Post -->
                <?php endwhile; endif; ?>

            </div>
        </div>
    </section><!-- / Latest Post -->

<?php get_footer(); ?>