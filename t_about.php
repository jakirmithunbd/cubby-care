<?php 
get_header();
/*
Template Name: Who We Are
*/ 
?>   

<?php $banner = get_field('about_banner_content'); ?>
<section class="page-banner" style="background: url(<?php echo $banner['image']; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-banner-info">
                	<?php if ($banner['title']): ?>
                    <h2><?php echo $banner['title']; ?></h2>
                	<?php endif; ?>

                	<?php if ($banner['description']): ?>
                    	<?php echo $banner['description']; ?>
                	<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- / Banner -->

<div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="side-bar">

                        <?php echo beacon_breadcrumb(); ?>

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

                <div class="col-md-8 col-sm-8">
                    <div class="tab-content">
                        <div class="tab-pane mission fade in family active" id="item_1">
                            <div class="top-text">  
                                <h2>Committed to kindness</h2>
                                <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest</p>
                            </div>

                            <ul class="list-inline">
                                <li>
                                    <img src="../assets/images/mission-1.jpg" class="img-responsive" alt="">
                                </li>
                                <li>
                                    <img src="../assets/images/mission-1.jpg" class="img-responsive" alt="">
                                </li>
                            </ul>

                            <h3>Committed to kindness</h3>
                            <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>

                            <h3>Committed to kindness</h3>
                            <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                        </div>
                        <div class="tab-pane fade mission" id="item_2">
                            <div class="top-text">  
                                <h2>Committed to kindness</h2>
                                <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest</p>
                            </div>

                            <ul class="list-inline">
                                <li>
                                    <img src="../assets/images/mission-1.jpg" class="img-responsive" alt="">
                                </li>
                                <li>
                                    <img src="../assets/images/mission-1.jpg" class="img-responsive" alt="">
                                </li>
                            </ul>

                            <h3>Committed to kindness</h3>
                            <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>

                            <h3>Committed to kindness</h3>
                            <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                        </div>
                        <div class="tab-pane fade people" id="item_3">
                            <div class="top-text">  
                                <h2>The kindest kind of people make the best kind of educators </h2>
                                <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest</p>
                            </div>
                        
                            <div class="team-member">
                                <div class="media pull-left">
                                    <img src="../assets/images/parent-1.jpg" class="img-responsive" alt="">
                                </div>

                                <div class="team-meta">
                                    <div class="title">
                                        <h4>Audrey Borrie <span>BSc Hons. MPA MAICD</span></h4>
                                        <p>Director and Chief  Executive Office</p>
                                    </div>

                                    <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                                </div>
                            </div><!-- / team -->
                        
                            <div class="team-member">
                                <div class="media pull-left">
                                    <img src="../assets/images/parent-1.jpg" class="img-responsive" alt="">
                                </div>

                                <div class="team-meta">
                                    <div class="title">
                                        <h4>Audrey Borrie <span>BSc Hons. MPA MAICD</span></h4>
                                        <p>Director and Chief  Executive Office</p>
                                    </div>

                                    <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                                </div>
                            </div><!-- / team -->
                        
                            <div class="team-member">
                                <div class="media pull-left">
                                    <img src="../assets/images/parent-1.jpg" class="img-responsive" alt="">
                                </div>

                                <div class="team-meta">
                                    <div class="title">
                                        <h4>Audrey Borrie <span>BSc Hons. MPA MAICD</span></h4>
                                        <p>Director and Chief  Executive Office</p>
                                    </div>

                                    <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                                </div>
                            </div><!-- / team -->
                        
                            <div class="team-member">
                                <div class="media pull-left">
                                    <img src="../assets/images/parent-1.jpg" class="img-responsive" alt="">
                                </div>

                                <div class="team-meta">
                                    <div class="title">
                                        <h4>Audrey Borrie <span>BSc Hons. MPA MAICD</span></h4>
                                        <p>Director and Chief  Executive Office</p>
                                    </div>

                                    <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                                </div>
                            </div><!-- / team -->
                        </div><!-- / team pane -->
                        <div class="tab-pane fade mission" id="item_4">
                            <div class="top-text">  
                                <h2>Committed to kindness</h2>
                                <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest</p>
                            </div>

                            <ul class="list-inline">
                                <li>
                                    <img src="../assets/images/mission-1.jpg" class="img-responsive" alt="">
                                </li>
                                <li>
                                    <img src="../assets/images/mission-1.jpg" class="img-responsive" alt="">
                                </li>
                            </ul>

                            <h3>Committed to kindness</h3>
                            <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>

                            <h3>Committed to kindness</h3>
                            <p>Harum voloreh endandento dent quiandi into vendita tionect uriatassi iditati umquam nihilla borerio blatendae re volor molorum inciis magnimolorat harum digendest doluptati consequi conet laut dolor serum sitas aut laboreria atenis et a delest, ipienimincit rerum volorrum etur, volum volores autem re porum, ium qui occus et ut endi dem. Fuga. Igendigendi tet quam, in reped esto quatus. Agnistium iure nonsequae asperro ritassin prem. Sed etur aut experum hic te nobit, tem et perferitatus res rem. Itae. Magnatus acculpa rciminum.</p>
                        </div>
                    </div>
                </div><!-- / col -->
            </div>
        </div>
    </div><!-- / About Us -->

<?php get_footer(); ?>