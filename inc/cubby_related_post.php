<?php 

// Blog related post
function cubby_blog_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => 'post',
        'post_not_in'    => array($post_id),
        'posts_per_page'  => -1
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
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
        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
     endif;
}