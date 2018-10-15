<?php 
get_header();
/*
Template Name: Info For You
*/ 
?> 
<?php echo cubby_page_banner(); ?>
<div class="about-us info-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo beacon_breadcrumb(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="side-bar">
                    <ul class="nav nav-tabs">
                    	<?php
						$tabs = [
							'child_care_subsidy', 
							'fact_sheets'
						];

						foreach ($tabs as $key => $tab):
						$active = $key === 0 ? 'active' : '';
						$text = get_field($tab);
							printf('<li class="%s"><a href="#info_%s" data-toggle="tab">%s</a></li>', $active, $key, $text['tab_menu']);

						endforeach; 

						?>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-9">
                <div class="tab-content">
                	
                    <div class="tab-pane fade in subsidy active" id="info_0">
                        <?php $subsidy = get_field('child_care_subsidy'); ?>

                        <?php
                        $top = $subsidy['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="subsidy-content">
                        	<?php if ($subsidy['subsidy_content']): ?>
                        		<?php echo $subsidy['subsidy_content']; ?>
                        	<?php endif; ?>
                        </div>

                    </div>

                    <div class="tab-pane fade subsidy sheets" id="info_1">
                        <?php $sheets = get_field('fact_sheets'); ?>

                        <?php
                        $top = $sheets['top_text'];
                        if ($top): ?>
                        <div class="top-text">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <?php $items = $sheets['sheets']; 
                        if($items):
                        	foreach ($items as $item) :
                        ?>
                        <div class="sheet">

                        <?php if ($item['title']): ?>
                        	<h3><?php echo $item['title']; ?></h3>
                        <?php endif; ?>

                        <a class="btn" href="#"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span>Download</a>

                        <?php if ($item['content']): ?>
                        	<?php echo $item['content']; ?>
                        <?php endif; ?>

						</div>
						<?php endforeach; endif; ?>
                    </div>

                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->
</div>

<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>