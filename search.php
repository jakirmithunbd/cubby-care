<?php get_header(); 
?>

<section class="page-banner search-page" style="background: url(<?php echo get_theme_file_uri('assets/images/page-banner.jpg'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-title">
                    <h1><?php _e('Search Result', 'cubby'); ?></h1>
                    <div class="search-area">
                        <form class="search-input">
                            <input type="search" value="<?php the_search_query(); ?>" name="s" id="s">

                            <button type="submit"><span class="fa fa-search"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="search-results">
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <?php echo beacon_breadcrumb(); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1" id="search-result">
                <div class="search-number">
                    <h1><?php echo ' Showing results for ' ?><span>'<?php the_search_query(); ?>'</span></h1>
                </div>

                <?php 
	                $args = [
					's' => get_search_query(),
					'posts_per_page' => 10,
				];
				$loop = new WP_Query($args);

				if($loop->have_posts()) :  

				?>
				<?php
				while($loop->have_posts()) : $loop->the_post(); ?>
               <div class="result-item">
                   <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                   <?php the_excerpt(); ?>
               </div> 
           		<?php endwhile; endif; wp_reset_postdata(); ?>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-load-more" id="search_load_more"><?php _e('Load More', 'cubby'); ?></button>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>