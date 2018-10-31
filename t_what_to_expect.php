<?php 
get_header();
/*
Template Name: What to Expect
*/ 
?> 
<?php echo cubby_page_banner(); ?>

<div class="about-us experience">
    <div class="container">
        <div class="row">
            <div class="col-md-12 hidden-xs">
                <?php echo beacon_breadcrumb(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4 no-padding-custom">
                <div class="side-bar" id="sticky_tab">
                    <ul class="nav nav-tabs hidden-xs">
                        <?php
                        $children = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => '142'
                        ));
                        ?>

                        <?php while ($children->have_posts()) : $children->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                    </ul>

                    <ul class="nav-tabs nav visible-xs">

                        <select id="sticky_tab_select">
                        <?php
                        $children = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => '142'
                        ));
                        ?>
                         <?php while ($children->have_posts()) : $children->the_post(); 
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
                    <div class="">
                        <?php $expect = get_field('what_to_expect'); ?>

                        <?php
                        $top = $expect['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
							
							<?php if ($top['image']): ?>
                            <div class="media">
                            	<img src="<?php echo $top['image']; ?>" class="img-responsive" alt="">
                            </div>
							<?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="repeating-items">
                        <?php $citems = $expect['experience_content']; ?>
                        <?php if ($citems) :
                            foreach ( $citems as $citem):
                        ?>

                        <?php if ($citem['title']): ?>
                        <h3><?php echo $citem['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($citem['description']): ?>
                            <?php echo $citem['description']; ?>
                        <?php endif; ?>

                        <?php if ($citem['image']): ?>
                        <div class="media">
                        	<img src="<?php echo $citem['image']; ?>" class="img-responsive" alt="">
                        </div>
						<?php endif; ?>
						<?php endforeach; endif; ?>
						</div>
                    </div>
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->
</div>

<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>