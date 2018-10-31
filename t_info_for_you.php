<?php 
get_header();
/*
Template Name: Info for you
*/ 
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
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
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
                    <div class="info-for-you">
                        <?php $title = get_field('info_title_text'); ?>
                        <div class="title-text">
                            <?php if ($title['title']): ?>
                            <h3><?php echo $title['title'] ?></h3>
                            <?php endif; ?>

                            <?php if ($title['description']): ?>
                                <?php echo $title['description']; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <?php $items = get_field('info_list'); if($items): 
                            foreach ($items as $item):
                         ?>
                        <div class="col-md-6 col-xs-6 col">
                            <div class="info-for-you">
                                <?php if ($item['icon']): ?>
                                <div class="icon pull-right">
                                    <img src="<?php echo $item['icon']; ?>" class="img-responsive" alt="">
                                </div>
                                <?php endif; ?>
                                <div class="info-item">
                                    <?php if ($item['title']): ?>
                                    <h4 class="title" href="#"><?php echo $item['title']; ?></h4>
                                    <?php endif; ?>
                                    <?php if ($item['content']): ?>
                                        <?php echo $item['content']; ?>
                                    <?php endif; ?>
                                    <?php $btn = $item['button'] ?>
                                    <div class="info-bottom">
                                        <?php if ($btn['text'] || $btn['link']): ?>
                                        <a class="btn" href="<?php echo $btn['link']; ?>"><?php echo $btn['text']; ?><span class="fa fa-angle-right"></span></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->
</div>

<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>