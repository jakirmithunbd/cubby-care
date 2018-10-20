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
            <div class="col-md-12 hidden-xs">
                <?php echo beacon_breadcrumb(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-4 no-padding-custom">
                <div class="side-bar" id="sticky_tab">
                    <ul class="nav nav-tabs hidden-xs">
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

                    <ul class="nav-tabs nav visible-xs">
                        <select id="sticky_tab_select">
                        <?php 
                            foreach ($tabs as $key => $tab):
                                $text = get_field($tab);
                                printf('<option value="info_%s" data-toggle="tab">%s</option>',$key, $text['tab_menu']);
                            endforeach; 
                        ?>
                        </select>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
                	
                    <div class="tab-pane fade in subsidy active" id="info_0">
                        <?php $subsidy = get_field('child_care_subsidy'); ?>

                        <?php
                        $top = $subsidy['top_text'];
                        if ($top): ?>
                        <div class="top-text wow fadeInUp">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="subsidy-content  wow fadeInUp">
                        	<?php if ($subsidy['subsidy_content']): ?>
                        		<?php echo $subsidy['subsidy_content']; ?>
                        	<?php endif; ?>
                        </div>

                        <div class="info-for-you">
                            <div class="top-text">  
                                <h2>Info for you</h2>
                                <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest</p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-xs-6 col">
                                    <div class="info-item">
                                        <div class="icon pull-right">
                                            <img src="<?php echo get_theme_file_uri('/images/svg/subsidy.svg'); ?>" alt="">
                                        </div>
                                        <a class="title" href="#">Child Care Subsidy</a>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                        <div class="info-bottom">
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 col">
                                    <div class="info-item">
                                        <div class="icon pull-right">
                                            <img src="<?php echo get_theme_file_uri('/images/svg/subsidy.svg'); ?>" alt="">
                                        </div>
                                        <a class="title" href="#">Child Care Subsidy</a>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                        <div class="info-bottom">
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 col">
                                    <div class="info-item">
                                        <div class="icon pull-right">
                                            <img src="<?php echo get_theme_file_uri('/images/svg/subsidy.svg'); ?>" alt="">
                                        </div>
                                        <a class="title" href="#">Child Care Subsidy</a>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                        <div class="info-bottom">
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6 col">
                                    <div class="info-item">
                                        <div class="icon pull-right">
                                            <img src="<?php echo get_theme_file_uri('/images/svg/subsidy.svg'); ?>" alt="">
                                        </div>
                                        <a class="title" href="#">Child Care Subsidy</a>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                        <div class="info-bottom">
                                            <a href="#" class="btn">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade subsidy sheets" id="info_1">
                        <?php $sheets = get_field('fact_sheets'); ?>

                        <?php
                        $top = $sheets['top_text'];
                        if ($top): ?>
                        <div class="top-text  wow fadeInUp">  
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
                        <div class="sheet wow fadeInUp">

                            <?php if ($item['title']): ?>
                            	<h3><?php echo $item['title']; ?></h3>
                            <?php endif; ?>
                            
                            <div class="download-btn hidden-xs">
                                <?php $btn = $item['button']; ?>
                                <?php if ($btn['text'] || $btn['file']): ?>
                                <a class="btn" href="<?php echo $btn['file']; ?>"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span><?php echo $btn['text']; ?></a>
                                <span class="float-right"><?php echo  $filesize; ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if ($item['content']): ?>
                            	<?php echo $item['content']; ?>
                            <?php endif; ?>

                            <?php $attachment_id = $item['button']['file']; 
                            $filesize = filesize( get_attached_file( $attachment_id ) );
                            $filesize = size_format($filesize, 2);
                            ?>

                            <div class="download-btn float-right visible-xs">
                                <?php $btn = $item['button']; ?>
                                <?php if ($btn['text'] || $btn['file']): ?>
                                <a class="btn" href="<?php echo $btn['file']; ?>"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span><?php echo $btn['text']; ?></a>
                                <span><?php echo  $filesize; ?></span>
                                <?php endif; ?>
                            </div>
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