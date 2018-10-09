<?php 
get_header();
/*
Template Name: Booking
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
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
				<div class="contact-form">
					<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>