<?php 
/*
Template Name: Left Menu Template
*/ 
get_header();

global $post;
$page_id = get_queried_object_id();

?>   
<?php echo cubby_page_banner(); ?>
	<div class="about-us info-page">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12 hidden-xs hidden-sm">
	                <?php echo beacon_breadcrumb(); ?>
	            </div>
	        </div>
		<div class="row">
            <div class="col-md-3 col-sm-12 no-padding-custom">
                <div class="side-bar" id="sticky_tab">
                    <ul class="nav nav-tabs custom-hidden info-tab">
                    	<?php


    					$parent = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'order'             => 'ASC',
                            'orderby'           => 'menu_order',
                            'post_parent'    => '152'
                        ));

                        ?>

                        <?php while ($parent->have_posts()) : $parent->the_post(); ?>
                              <li<?php if($page_id === get_the_ID()) echo ' class="active"'; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

						
                    </ul>

                    <ul class="nav-tabs nav hidden custom-visible">

                        <select id="sticky_tab_select">
                        <?php
                        $parent = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'order'             => 'ASC',
                            'orderby'           => 'menu_order',
                            'post_parent'    => '152'
                        ));
                        ?>
                         <?php while ($parent->have_posts()) : $parent->the_post(); 
                                $permalink = get_the_permalink();
                                $title = get_the_title();
                                $selected = $page_id === get_the_ID() ? 'selected' : ' ';
                                printf('<option value="%s" %s>%s</option>',$permalink, $selected, $title);
                            endwhile;
                            ?>
                            <?php wp_reset_postdata(); ?>
                        </select>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-12">
                <?php 
                $template = get_field('page_for');
                get_template_part('template-parts/' . $template);

                ?>
            </div>
        </div>
	</div>
</div>
<?php echo cubby_get_booking_room(); ?>
<?php get_footer(); ?>