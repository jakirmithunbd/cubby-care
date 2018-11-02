<?php get_header(); ?>
<?php $con = get_field('community_content'); ?>
<section class="blog-single">
	<div class="container">
		<div class="row">
            <div class="col-md-12 hidden-xs">
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
	                </div>
	            </div>
	        </div>
        </div>
		
		<div class="blog-thumb">
			<div class="row justify-content-center">
	            <div class="col-md-8 ">
					<div class="media">
						<?php $img = get_the_post_thumbnail(array('class' => 'img-responisve'), 'large'); ?>
		                <?php if ($img): ?>
		                	<?php echo $img; ?>
		                <?php endif ?>
					</div>

					<?php if ($con['content']): ?>
						<?php echo $con['content']; ?>
					<?php endif; ?>
	            </div>
	        </div>
        </div>
		
		<?php $client = $con['client_quote']; ?>
        <div class="quote row justify-content-center">
        	<div class="col-md-8 col-sm-12">
        		<div class="col-md-6 col-sm-6">
	        		<div class="client-info">
	        			<?php if ($client['quote']): ?>
	        				<?php echo $client['quote']; ?>
	        			<?php endif; ?>

	        			<?php if ($client['client_name']): ?>
	        			<h3><?php echo $client['client_name']; ?></h3>
	        			<?php endif; ?>
	        		</div>
	        	</div>

	        	<div class="col-md-6 col-sm-6">
	        		<div class="client-content">
	        			<?php if ($client['client_content']): ?>
	        				<?php echo $client['client_content']; ?>
	        			<?php endif; ?>
	        		</div>
	        	</div>
        	</div>
        </div>
		
		<?php $env = $con['environment']; ?>
        <div class="row justify-content-center">
        	<div class="col-md-8 col-sm-12">
        		<div class="environment">
        			<?php if ($env['title']): ?>
        				<h4><?php echo $env['title']; ?></h4>
        			<?php endif; ?>

        			<?php if ($env['description']): ?>
        				<?php echo $env['description']; ?>
        			<?php endif; ?>
					
					<ul class="list-inline">
        			<?php $imgs = $env['images']; ?>
        			<?php if ($imgs): 
        				foreach ($imgs as $img):
        				?>
        				<li><img src="<?php echo $img['image']; ?>" class="img-responsive" alt=""></li>
        			<?php endforeach; endif ?>
        			</ul>

        			<?php if ($env['bottom_content']): ?>
        				<?php echo $env['bottom_content']; ?>
        			<?php endif ?>
        		</div>
        	</div>
        </div>

        <div class="row justify-content-center">
        	<div class="col-md-8 col-sm-12">
        		<div class="row">
        			<div class="col-sm-8">
		        		<div class="author">
		        			<?php
							    global $post;
							    $author_id=$post->post_author;
							?>
		        			<ul class="list-inline">
		        				<li>
		        					<span>
		        						<?php echo get_the_author_meta('display_name', $author_id); ?>
		        							
		        					</span>
		        				</li>
								<li>
									<?php the_tags(' '); ?>
								</li>
		        			</ul>
		        		</div>
		        	</div>
		        	<div class="col-sm-4">
		        		<div class="share">
		        			<?php echo sharethis_inline_buttons(); ?>
		        		</div>
		        	</div>
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