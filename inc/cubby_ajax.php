<?php 
// post Load more button ajax
function cubby_load_posts(){
    $paged = $_POST['page'];

    if ($paged == null) {
		$posts_per_page = 8;
	} else {
		$paged = 2;
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
		while($loop->have_posts()) : $loop->the_post(); ?>

        <div class="col-sm-4 col-xs-6 col">
            <div class="post">
                <a href="<?php the_permalink(); ?>">
                    <div class="media">
                        <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail("post_image", array('class' => 'img-responsive')); ?>
                        <?php endif ?>
                    </div>
                </a>

                <div class="post-meta">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php the_excerpt(); ?>
                    <a class="read-more" class="text-uppercase" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cubby') ?></a>
                </div>
            </div><!-- /  Post -->
        </div><!-- /  Post col -->
        <?php endwhile; endif; wp_reset_postdata(); ?>

		<div class="entry-content notResult col-md-12 col-sm-12 col-xs-12">
            <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                <?php _e('No more posts!!!', 'cubby'); ?>
            </h4>
        </div> 
	<?php 
	endif;
	die();
}
add_action("wp_ajax_load_posts", "cubby_load_posts");
add_action("wp_ajax_nopriv_load_posts", "cubby_load_posts");
