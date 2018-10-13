<?php 
get_header();
/*
Template Name: Contact Us
*/ 
$page_id = get_queried_object_id();
?>

<?php cubby_page_banner(); ?>

<section class="contact contact-page">
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
						<?php $cont = get_field('contacts', 'options'); ?>
						<li>
							<div class="icon pull-left">
								<span><img src="<?php echo get_theme_file_uri('assets/images/svg/call.svg'); ?>" alt=""></span>
							</div>
							
							<?php if ($cont['phone']): ?>
							<div class="text">
								<label><?php _e('Phone', 'cubby'); ?></label>
								<p><?php _e( 'CALL US', 'cubby' ); ?> <span><?php _e( '1300 DAY CARE', 'cubby' ); ?></span><a href="tel:1300 329 227">( <?php echo $cont['phone']; ?> )</a></p>
							</div>
							<?php endif; ?>
						</li>

						<li>
							<div class="icon pull-left">
								<span><img src="<?php echo get_theme_file_uri('assets/images/svg/fax.svg'); ?>" alt=""></span>
							</div>
							
							<?php if ($cont['fax']): ?>
							<div class="text">
								<label><?php _e( 'Fax', 'cubby' ); ?></label>
								<p><?php echo $cont['fax']; ?></p>
							</div>
							<?php endif; ?>
						</li>

						<li>
							<div class="icon pull-left">
								<span><img src="<?php echo get_theme_file_uri('assets/images/svg/email.svg'); ?>" alt=""></span>
							</div>
							
							<?php if ($cont['email']): ?>
							<div class="text">
								<label><?php _e( 'email', 'cubby' ); ?></label>
								<a href="mailto:<?php echo $cont['email']; ?>"><?php echo $cont['email']; ?></a>
							</div>
							<?php endif; ?>
						</li>

						<li class="social-media">
							<div class="icon pull-left">
								<span><img src="<?php echo get_theme_file_uri('assets/images/svg/link.svg'); ?>" alt=""></span>
							</div>
							
							<?php $social = get_field('social_media', 'options'); ?>
							<?php foreach ($social as $item):?>
							<?php if ($item['url'] && $item['icon']['value']): ?>
							<div class="text">
								<label>Connect With Us</label>
								<a href="<?php echo $item['url']; ?>"><span class="fa fa-<?php echo $item['icon']['value']; ?>"></span></a>
							</div>
							<?php endif; endforeach; ?>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-md-8 col-sm-8">
				<div class="contact-form">
					<?php $con = get_field('contact_info'); ?>
					<div class="tour-info">
						<?php if ($con['title']): ?>
						<h2><?php echo $con['title']; ?></h2>
						<?php endif; ?>
						
						<?php if ($con['content']): ?>
							<?php echo $con['content']; ?>
						<?php endif; ?>
					</div>
					<?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>