
<?php 
get_header();

?>  
    <section class="blog-page">
        <div class="featured-post-area">
            <div class="container">
                <div class="featured-post">
                    <?php 
                    $args = array(
                        'meta_key'  =>  'featured_post',
                        'meta_value'=> '1',
                        );
                    ?>

                    <?php $loop = new WP_Query($args); ?>
                    <?php if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="post">

                        <div class="post-meta">
                            <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php the_excerpt(); ?>
                            <a class="read-more" class="text-uppercase" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cubby') ?></a>
                        </div>

                        <a class="post-img" href="<?php the_permalink(); ?>">
                            <div class="media">
                                <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail("post_image", array('class' => 'img-responsive')); ?>
                                <?php endif ?>
                            </div>
                        </a>
                        
                    </div><!-- /  Post -->
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div><!-- / Featured Post -->

        <div class="blog-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-left">
                            <?php echo beacon_breadcrumb(); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center title">
                        <h1>Latest Blog</h1>
                    </div>
                </div>

                <div class="row">
                    <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1
                        );
                    ?>

                    <?php $loop = new WP_Query($args); ?>
                    <?php if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post(); ?>
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
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>
    </section><!-- / Latest Post -->

<?php get_footer(); ?>