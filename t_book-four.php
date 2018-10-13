<?php 
get_header();
/*
Template Name: Booking Tour
*/ 
$page_id = get_queried_object_id();
?>

<?php cubby_page_banner(); ?>

<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php echo beacon_breadcrumb(); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<div class="contact-form">
					<?php $con = get_field('book_a_tour'); ?>
					<div class="tour-info text-center">
						<?php if ($con['title']): ?>
						<h2><?php echo $con['title']; ?></h2>
						<?php endif; ?>
						
						<?php if ($con['content']): ?>
							<?php echo $con['content']; ?>
						<?php endif; ?>
					</div>
					<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>