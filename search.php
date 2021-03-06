<?php get_header(); 
$page_id = get_queried_object_id();
?>
<section class="page-banner search-page" style="background: url(<?php echo get_theme_file_uri('assets/images/page-banner.jpg'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-title">
                    <h1><?php _e('Search Result', 'cubby'); ?></h1>
                    <div class="search-area">
                        <form class="search-input" role="search" method="get" action="<?php esc_url( home_url( '/' ) ); ?>">
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
                    <p class="pull-right">
                    </p>
                    <h1><?php echo ' Showing results for ' ?><span>'<?php the_search_query(); ?>'</span></h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="button" data-keyword="<?php the_search_query(); ?>" data-perpage="<?php echo get_option( 'posts_per_page' ); ?>" class="btn btn-load-more" id="search_load_more"><?php _e('Load More', 'cubby'); ?></button>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>