<?php 
// search page load more ajax
add_action("wp_ajax_load_search", "cubby_load_search");
add_action("wp_ajax_nopriv_load_search", "cubby_load_search");
function cubby_load_search(){
    $page = $_POST['page'];
    $posts_per_page = 8;
    $keywords = $_POST['keywords'];
    $args = [
        's' => $keywords,
        'posts_per_page' => $posts_per_page,
        'paged' => $page
    ];
    $loop = new WP_Query($args);
    if($loop->have_posts()) : 
        while($loop->have_posts()) : $loop->the_post(); ?>
            <div class="result-item" data-found_posts="<?php echo $loop->found_posts; ?>">
               <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               <p><?php echo the_field('custom_excerpt'); ?></p>
           </div>
    <?php
        endwhile;
    else : ?>
        <div class="entry-content notResult col-md-12 col-sm-12 col-xs-12">
            <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                <?php _e('No more search result!!!', 'cubby'); ?>
            </h4>
        </div> 
<?php
    endif;
    die();
}


// post Load more button ajax
function cubby_load_more_post(){
    $post_page = $_POST['page'];

    if ($post_page == null) {
        $posts_per_page = 9;
    } else {
        $posts_per_page = 3;
    }

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
    ];

    if( $_POST['page'] > 1 ){
        $args['offset'] = ( $_POST['page'] * $posts_per_page ) - $posts_per_page;
    }

    $loop = new WP_Query($args);

    if($loop->have_posts()) : 
        while($loop->have_posts()) : $loop->the_post(); 
            $id = get_the_ID();
            ?>
            <div class="col-md-4 col-sm-6 col-xs-6 col">
                <div class="post">
                    <a href="<?php the_permalink(); ?>">
                        <div class="media">
                            <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail("post_image", array('class' => 'img-responsive')); ?>
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
                        <a data-id="<?php echo $id; ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php echo the_field('custom_excerpt'); ?>
                        <a class="read-more" class="text-uppercase" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cubby') ?></a>
                    </div>
                </div><!-- /  Post -->
            </div><!-- /  Post col -->
        <?php endwhile; else: wp_reset_postdata(); ?>

        <div class="entry-content notResult col-md-12 col-sm-12 col-xs-12">
            <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                <?php _e('No more posts!!!', 'cuddy'); ?>
            </h4>
        </div> 
    <?php 
    endif;
    die();
}
add_action("wp_ajax_load_more_post", "cubby_load_more_post");
add_action("wp_ajax_nopriv_load_more_post", "cubby_load_more_post");
