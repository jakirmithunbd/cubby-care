<?php 
get_header();
/*
Template Name: Experience
*/ 
$page_id = get_queried_object_id();
?> 
<?php echo cubby_page_banner(); ?>

<div class="about-us experience">
    <div class="container">
        <div class="row">
            <div class="col-md-12 hidden-xs">
                <?php echo beacon_breadcrumb(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4 no-padding-custom">
                <div class="side-bar" id="sticky_tab">
                    <ul class="nav nav-tabs hidden-xs info-tab">
                    	<?php
						$tabs = [
							'what_to_expect', 
							'our_education_&_care', 
							'early_start_programs',
							'nutrition'
						];

						foreach ($tabs as $key => $tab):
						$active = $key === 0 ? 'active' : '';
						$text = get_field($tab);
							printf('<li class="%s"><a href="#section_%s" data-toggle="tab">%s</a></li>', $active, $key, $text['tab_menu']);

						endforeach; 

						?>
                    </ul>

                    <ul class="nav-tabs nav visible-xs">

                        <select id="sticky_tab_select">
                        <?php 
                            foreach ($tabs as $key => $tab):
                                $text = get_field($tab);
                                printf('<option value="section_%s" data-toggle="tab">%s</option>',$key, $text['tab_menu']);
                            endforeach; 
                        ?>
                        </select>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="section_0">
                        <?php $expect = get_field('what_to_expect'); ?>

                        <?php
                        $top = $expect['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
							
							<?php if ($top['image']): ?>
                            <div class="media">
                            	<img src="<?php echo $top['image']; ?>" class="img-responsive" alt="">
                            </div>
							<?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="repeating-items">
                        <?php $citems = $expect['experience_content']; ?>
                        <?php if ($citems) :
                            foreach ( $citems as $citem):
                        ?>

                        <?php if ($citem['title']): ?>
                        <h3><?php echo $citem['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($citem['description']): ?>
                            <?php echo $citem['description']; ?>
                        <?php endif; ?>

                        <?php if ($citem['image']): ?>
                        <div class="media">
                        	<img src="<?php echo $citem['image']; ?>" class="img-responsive" alt="">
                        </div>
						<?php endif; ?>
						<?php endforeach; endif; ?>
						</div>
                    </div>
                    <div class="tab-pane fade" id="section_1">
                        <?php $education = get_field('our_education_&_care'); ?>

                        <?php
                        $top = $education['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
							
							<?php if ($top['image']): ?>
                            <div class="media">
                            	<img src="<?php echo $top['image']; ?>" class="img-responsive" alt="">
                            </div>
							<?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="repeating-items">
	                        <?php $items = $education['experience_content']; ?>
	                        <?php if ($items) :
	                            foreach ( $items as $item):
	                        ?>

	                        <?php if ($item['title']): ?>
	                        <h3><?php echo $item['title']; ?></h3>
	                        <?php endif; ?>

	                        <?php if ($item['description']): ?>
	                            <?php echo $item['description']; ?>
	                        <?php endif; ?>

	                        <?php if ($item['edu_image']): ?>
	                        <div class="media">
	                        	<img src="<?php echo $item['edu_image']; ?>" class="img-responsive" alt="">
	                        </div>
							<?php endif; ?>
							<?php endforeach; endif; ?>
						</div>
                    </div>

                    <div class="tab-pane fade" id="section_2">
                        <?php $early = get_field('early_start_programs'); ?>

                        <?php
                        $top = $early['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
							
							<?php if ($top['image']): ?>
                            <div class="media">
                            	<img src="<?php echo $top['image']; ?>" class="img-responsive" alt="">
                            </div>
							<?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="repeating-items">
	                        <?php $items = $early['experience_content']; ?>
	                        <?php if ($items) :
	                            foreach ( $items as $item):
	                        ?>

	                        <?php if ($item['title']): ?>
	                        <h3><?php echo $item['title']; ?></h3>
	                        <?php endif; ?>

	                        <?php if ($item['description']): ?>
	                            <?php echo $item['description']; ?>
	                        <?php endif; ?>

	                        <?php if ($item['edu_image']): ?>
	                        <div class="media">
	                        	<img src="<?php echo $item['edu_image']; ?>" class="img-responsive" alt="">
	                        </div>
							<?php endif; ?>
							<?php endforeach; endif; ?>
						</div>
                    </div>

                    <div class="tab-pane fade" id="section_3">
                        <?php $nutrition = get_field('nutrition'); ?>

                        <?php
                        $top = $nutrition['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
							
							<?php if ($top['image']): ?>
                            <div class="media">
                            	<img src="<?php echo $top['image']; ?>" class="img-responsive" alt="">
                            </div>
							<?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="repeating-items">
	                        <?php $items = $nutrition['experience_content']; ?>
	                        <?php if ($items) :
	                            foreach ( $items as $item):
	                        ?>

	                        <?php if ($item['title']): ?>
	                        <h3><?php echo $item['title']; ?></h3>
	                        <?php endif; ?>

	                        <?php if ($item['description']): ?>
	                            <?php echo $item['description']; ?>
	                        <?php endif; ?>

	                        <?php if ($item['nut_image']): ?>
	                        <div class="media">
	                        	<img src="<?php echo $item['nut_image']; ?>" class="img-responsive" alt="">
	                        </div>
							<?php endif; ?>
							<?php endforeach; endif; ?>
						</div>
                    </div>
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->
</div>

<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>