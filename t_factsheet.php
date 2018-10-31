<?php 
/*
Template Name: Fact Sheet
*/ 
get_header();

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


    					$parent = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => '152'
                        ));
                        ?>

                        <?php while ($parent->have_posts()) : $parent->the_post(); ?>
                              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

						
                    </ul>

                    <ul class="nav-tabs nav visible-xs">

                        <select id="sticky_tab_select">
                        <?php
                        $parent = new WP_Query(array(
                            'post_type'      => 'page',
                            'posts_per_page' => -1,
                            'post_parent'    => '152'
                        ));
                        ?>
                         <?php while ($parent->have_posts()) : $parent->the_post(); 
                                $permalink = get_the_permalink();
                                $title = get_the_title();
                                printf('<option value="%s">%s</option>',$permalink, $title);
                            endwhile;
                            
                            ?>
                            <?php wp_reset_postdata(); ?>
                        </select>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-8">
                <div class="tab-content">
					<div class="subsidy sheets">
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
                </div><!-- / col -->
            </div>
        </div>
	</div>
</div>
<?php echo cubby_get_booking_room(); ?>
<?php get_footer(); ?>