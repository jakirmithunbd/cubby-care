<?php 
get_header();
/*
Template Name: Who We Are
*/ 
?>   

<?php echo cubby_page_banner(); ?>

<div class="about-us">
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
							'cubby_care_family', 
							'our_mission_to_kindness', 
							'our_people',
							'cubby_careers'
						];

						foreach ($tabs as $key => $tab):
						$active = $key === 0 ? 'active' : '';
						$text = get_field($tab);
							printf('<li class="%s"><a href="#item_%s" data-toggle="tab">%s</a></li>', $active, $key, $text['tab_menu']);

						endforeach; 

						?>
                    </ul>
                </div><!-- / Side bar -->
            </div><!-- / col -->

            <div class="col-md-9 col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane mission fade in family active" id="item_0">
                        <?php $kindness = get_field('cubby_care_family'); ?>

                        <?php
                        $top = $kindness['top_text'];
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

                        <ul class="list-inline">
                            <?php $items = $kindness['images']; ?>
                            <?php if ($items): 
                                foreach ($items as $item):
                            ?>
                            <li>
                                <?php if ($item['image']): ?>
                                <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif ?>

                        </ul>
                        
                        <?php $citems = $kindness['commitment']; ?>
                        <?php if ($citems) :
                            foreach ( $citems as $citem):
                        ?>

                        <?php if ($citem['title']): ?>
                        <h3><?php echo $citem['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($citem['description']): ?>
                            <?php echo $citem['description']; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; ?>
                    </div>
                    <div class="tab-pane fade mission" id="item_1">
                        <?php $mission = get_field('our_mission_to_kindness'); ?>

                        <?php
                        $top = $mission['top_text'];
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

                        <ul class="list-inline">
                            <?php $items = $mission['images']; ?>
                            <?php if ($items): 
                                foreach ($items as $item):
                            ?>
                            <li>
                                <?php if ($item['image']): ?>
                                <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif ?>

                        </ul>
                        
                        <?php $citems = $mission['commitment']; ?>
                        <?php if ($citems) :
                            foreach ( $citems as $citem):
                        ?>

                        <?php if ($citem['title']): ?>
                        <h3><?php echo $citem['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($citem['description']): ?>
                            <?php echo $citem['description']; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; ?>
                    </div>
                    <div class="tab-pane fade people" id="item_2">

                        <?php
                        $people = get_field('our_people');
                        $ptop = $people['top_text'];
                        if ($ptop): ?>
                        <div class="top-text">  
                            <?php if ($ptop['title']): ?>
                            <h2><?php echo $ptop['title']; ?></h2>
                            <?php endif; ?>

                            <?php if ($ptop['description']): ?>
                                <?php echo $ptop['description']; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php $peoples = $people['team_members']; 
                        ?>
                        <?php if($peoples): 
                            foreach ($peoples as $item):
                        ?>
                        <div class="team-member">
                            <?php if ($item['image']): ?>
                            <div class="media pull-left">
                                <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
                            </div>
                            <?php endif; ?>

                            <div class="team-meta">
                                <?php if ($item['name'] || $item['title'] || $item['position']): ?>
                                <div class="title">
                                    <?php if ($item['name'] || $item['title']): ?>
                                    <h4><?php echo $item['name']; ?> <span><?php echo $item['name']; ?></span></h4>
                                    <?php endif; ?>
                                    
                                    <?php if ($item['position']): ?>
                                    <p><?php echo $item['position']; ?></p>
                                    <?php endif; ?>

                                </div>
                                <?php endif; ?>
                                
                                <?php if ($item['description']): ?>
                                    <?php echo $item['description']; ?>
                                
                                <?php endif; ?>
                            </div>
                        </div><!-- / team -->
                        <?php endforeach; endif; ?>

                    </div><!-- / team pane -->
                    <div class="tab-pane mission fade family" id="item_3">
                        <?php $cubby_careers = get_field('cubby_careers'); ?>

                        <?php
                        $top = $cubby_careers['top_text'];
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

                        <ul class="list-inline">
                            <?php $items = $cubby_careers['images']; ?>
                            <?php if ($items): 
                                foreach ($items as $item):
                            ?>
                            <li>
                                <?php if ($item['image']): ?>
                                <img src="<?php echo $item['image']; ?>" class="img-responsive" alt="">
                                <?php endif; ?>
                            </li>
                            <?php endforeach; endif ?>

                        </ul>
                        
                        <?php $citems = $cubby_careers['commitment']; ?>
                        <?php if ($citems) :
                            foreach ( $citems as $citem):
                        ?>
                        
                        <?php if ($citem['title']): ?>
                        <h3><?php echo $citem['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($citem['description']): ?>
                            <?php echo $citem['description']; ?>
                        <?php endif; ?>
                        <?php endforeach; endif; ?>
                    </div>
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->


<?php echo cubby_get_booking_room(); ?>

<?php get_footer(); ?>