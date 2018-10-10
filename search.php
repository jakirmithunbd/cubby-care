<?php get_header(); 
?>

<section class="page-banner" style="background: url(<?php echo get_theme_file_uri('assets/images/page-banner.jpg'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <h1><?php _e('Search Result', 'leisure'); ?></h1>
                    <div class="search">
                        <form action="" class="search-box">
	                        <input type="search" name="s" class="text form-control" value="<?php the_search_query(); ?>" placeholder="Search..." />
	                    </form>

						<form class="search-box">
							<div class="input-group">
								<input type="text" name="s" class="form-control" placeholder="Search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="col-md-12 hidden">
        <div class="media">
            <img src="<?php echo get_theme_file_uri('images/banner-mobile-bg.jpg'); ?>" class="img-responsive" alt="">
        </div>
    </div>
</div><!-- page banner -->

<section class="search-results">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-9">
                <div class="search-number">
                    <h4>
                         <?php 
                            $args = [
                                's' => get_search_query(),
                                'posts_per_page' => -1,
                            ];
                        ?>
                        <?php $allsearch = new WP_Query($args); $count = $allsearch->post_count; echo $count . ' results found matching query.'; wp_reset_query(); ?>
                    </h4>
                </div>
                <?php 
	                $args = [
					's' => get_search_query(),
					'posts_per_page' => -1,
				];
				$loop = new WP_Query($args);

				if($loop->have_posts()) :  

				?>
				<?php
				while($loop->have_posts()) : $loop->the_post(); ?>
               <div class="result-item">
                   <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                   <?php the_excerpt(); ?>
               </div> 
           		<?php endwhile; endif; wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>