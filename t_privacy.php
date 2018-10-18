<?php 
get_header();
/*
Template Name: Privacy
*/ 
$page_id = get_queried_object_id();
?>

<?php cubby_page_banner(); ?>

<section class="privacy">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo beacon_breadcrumb(); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo the_field('privacy_policy'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>