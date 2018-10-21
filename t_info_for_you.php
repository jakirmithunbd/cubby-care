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
                    <ul class="nav nav-tabs hidden-xs info-tab">
                    	<?php
						$tabs = [
							'child_care_subsidy', 
							'fact_sheets',
                            'info_downloads',
                            'info_menus',
                            'info_communication'
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

                     <div class="info-for-you">
                        <div class="row">
                            <?php $counter = 0; ?>
                            <?php foreach ($tabs as $key => $tab): 
                                $text = get_field($tab);
                                $icon = $text['info_icon'];
                                $top_text = $text['top_text']['description'];
                            ?>
                            <div class="col-md-6 col-xs-6 col">
                                <?php if ($icon): ?>
                                <div class="icon pull-right">
                                    <img src="<?php echo $icon; ?>" class="img-responsive" alt="">
                                </div>
                                <?php endif; ?>
                                <div class="info-item">
                                    <?php if ($text['tab_menu']): ?>
                                    <h4 class="title" href="#"><?php echo $text['tab_menu']; ?></h4>
                                    <?php endif; ?>
                                    <?php if ($top_text): ?>
                                        <?php echo $top_text; ?>
                                    <?php endif; ?>
                                    <div class="info-bottom">
                                        <a class="btn" href="#<?php echo 'info_'.$counter; ?>" data-toggle="tab"> <?php _e('Learn More', 'cubby'); ?> <span class="fa fa-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++; endforeach;?>

                        </div>
                    </div><!-- / info for you -->
                	
                    <div class="tab-pane fade subsidy" id="info_0">
                        <?php $subsidy = get_field('child_care_subsidy'); ?>

                        <?php
                        $top = $subsidy['top_text'];
                        if ($top): ?>
                        <div class="top-text fadeInUp">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <div class="subsidy-content fadeInUp">
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
                        <div class="top-text fadeInUp">  
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
                        <div class="sheet fadeInUp">

                            <?php if ($item['title']): ?>
                                <h3><?php echo $item['title']; ?></h3>
                            <?php endif; ?>

                            <?php $attachment_id = $item['button']['file']; 
                            $filesize = filesize( get_attached_file( $attachment_id ) );
                            $filesize = size_format($filesize, 2);
                            ?>
                            
                            <div class="download-btn hidden-xs pull-right">
                                <?php $btn = $item['button']; ?>
                                <?php if ($btn['text'] || $btn['file']): ?>
                                <a class="btn" href="<?php echo $btn['file']; ?>"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span><?php echo $btn['text']; ?></a>
                                <span class="file-size">(Document, <?php echo  $filesize; ?>)</span>
                                <?php endif; ?>
                            </div>

                            <?php if ($item['content']): ?>
                                <?php echo $item['content']; ?>
                            <?php endif; ?>

                            <div class="download-btn visible-xs">
                                <?php $btn = $item['button']; ?>
                                <?php if ($btn['text'] || $btn['file']): ?>
                                <a class="btn" href="<?php echo $btn['file']; ?>"><span><img src="<?php echo get_theme_file_uri('assets/images/svg/download.svg');?>" alt=""></span><?php echo $btn['text']; ?></a>
                                <span class="file-size">(Document, <?php echo  $filesize; ?>)</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; endif; ?>                        
                    </div>

                    <div class="tab-pane fade subsidy" id="info_2">
                    <?php
                        $info_downloads = get_field('info_downloads');
                        $top = $info_downloads['top_text'];
                        if ($top): ?>
                        <div class="top-text fadeInUp">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade subsidy" id="info_3">
                    <?php
                        $info_downloads = get_field('info_menus');
                        $top = $info_downloads['top_text'];
                        if ($top): ?>
                        <div class="top-text fadeInUp">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade subsidy" id="info_4">
                    <?php
                        $info_downloads = get_field('info_communication');
                        $top = $info_downloads['top_text'];
                        if ($top): ?>
                        <div class="top-text fadeInUp">  
                            <?php if ($top['title']): ?>
                            <h2><?php echo $top['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($top['description']): ?>
                                <?php echo $top['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->
</div>

<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>