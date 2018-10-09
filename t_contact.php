<?php 
get_header();
/*
Template Name: Contact Us
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
			<div class="col-md-4 col-sm-4">
				<div class="quick-contact">
					<ul>
						<li>
							<div class="icon pull-left">
								<span class="fa fa-phone"></span>
							</div>

							<div class="text">
								<label>Phone</label>
								<p>CALL US <span>1300 DAY CARE</span><a href="tel:1300 329 227">( 1300 329 227 )</a></p>
							</div>
						</li>

						<li>
							<div class="icon pull-left">
								<span class="fa fa-fax"></span>
							</div>

							<div class="text">
								<label>Fax</label>
								<p>1300 329 227</p>
							</div>
						</li>

						<li>
							<div class="icon pull-left">
								<span class="fa fa-envelope-o"></span>
							</div>

							<div class="text">
								<label>email</label>
								<a href="mailto:westcourt@cubbycare.com.au">westcourt@cubbycare.com.au</a>
							</div>
						</li>

						<li class="social-media">
							<div class="icon pull-left">
								<span class="fa fa-bullhorn"></span>
							</div>

							<div class="text">
								<label>Connect With Us</label>
								<a href="#"><span class="fa fa-facebook"></span></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-8 col-sm-8">
				<div class="contact-form">
					<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>