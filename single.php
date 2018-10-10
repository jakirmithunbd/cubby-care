<?php get_header(); ?>
<section class="blog-single">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <?php echo beacon_breadcrumb(); ?>
                </div>
            </div>
        </div>
		
		<div class="blog-info">
			<div class="row">
	            <div class="col-md-12">
	                <div class="post-title text-center">
	                    <?php the_title(); ?>
	                    <ul class="list-inline">
	                    	<li><?php the_category(); ?></li>
	                    	<li><?php echo get_the_date(); ?></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
        </div>
		
		<div class="blog-thumb">
			<div class="row">
	            <div class="col-md-12">
	                <?php $img = get_the_post_thumbnail(null, 'large'); ?>
	                <?php if ($img): ?>
	                	<?php echo $img; ?>
	                <?php endif ?>

	            </div>
	        </div>
        </div>
	</div>
</section>

<section class="related-post">
	<div class="container">
		<div class="row">
			<div class="col-md-12 title text-center">
				<h1>Related Articles</h1>
			</div>
		</div>
		<div class="row" id="cubby-related-post">
			<?php echo cubby_blog_related_post(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>