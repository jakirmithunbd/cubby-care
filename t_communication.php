<?php 
/*
Template Name: Communication
*/ 
get_header();

?>   
<?php echo cubby_page_banner(); ?>
	<div class="about-us info-page">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12 hidden-xs">
	                <?php echo beacon_breadcrumb(); ?>
	            </div>
	        </div>
		<div class="row">
            <div class="col-md-3 col-sm-4 no-padding-custom">
                <div class="side-bar" id="sticky_tab">
                    <ul class="nav nav-tabs hidden-xs info-tab">
                    	<?php


    					$parent = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => '152'
                        ));
                        ?>

                        <?php while ($parent->have_posts()) : $parent->the_post(); ?>
                              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

						
                    </ul>

                    <ul class="nav-tabs nav visible-xs">

                        <select id="sticky_tab_select">
                        <?php
                        $parent = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => '152'
                        ));
                        ?>
                         <?php while ($parent->have_posts()) : $parent->the_post(); 
                                $permalink = get_the_permalink();
                                $title = get_the_title();
                                printf('<option value="%s">%s</option>',$permalink, $title);
                            endwhile;
                            
                            ?>
                            <?php wp_reset_postdata(); ?>
                        </select>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
					<div class="subsidy">
						<?php 
						$info_downloads = get_field('info_communication');
                        $top = $info_downloads['top_text'];
                        if ($top): ?>
                        <div class="top-text fadeInUp">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="subsidy-content fadeInUp">
                        	<?php if ($info_communication['description']): ?>
                        		<?php echo $info_communication['description']; ?>
                        	<?php endif; ?>
                        </div>
					</div>
                </div><!-- / col -->
            </div>
        </div>
	</div>
</div>
<?php echo cubby_get_booking_room(); ?>
<?php get_footer(); ?>