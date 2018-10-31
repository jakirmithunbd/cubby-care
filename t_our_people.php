<?php 
get_header();
/*
Template Name: Out People
*/ 
?> 
<?php echo cubby_page_banner(); ?>
<div class="about-us">
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
                        $child = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'order'             => 'ASC',
                            'orderby'           => 'menu_order',
                            'post_parent'    => '5'
                        ));
                        ?>

                        <?php while ($child->have_posts()) : $child->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                    </ul>

                    <ul class="nav-tabs nav visible-xs">

                        <select id="sticky_tab_select">
                        <?php
                        $child = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'order'             => 'ASC',
                            'orderby'           => 'menu_order',
                            'post_parent'    => '5'
                        ));
                        ?>
                         <?php while ($child->have_posts()) : $child->the_post(); 
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
                    <div class="people">
                        <?php
                        $people = get_field('our_people');
                        $ptop = $people['top_text'];
                        if ($ptop): ?>
                        <div class="top-text">  
                            <?php if ($ptop['title']): ?>
                            <h2><?php echo $ptop['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($ptop['description']): ?>
                                <?php echo $ptop['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php $peoples = $people['team_members']; 
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
                                    <h4><?php echo $item['name']; ?> <span><?php echo $item['title']; ?></span></h4>
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
                    </div><!-- / team -->
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->
</div>

<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>