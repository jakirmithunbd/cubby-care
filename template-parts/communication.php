<div class="tab-content">
	<div class="subsidy">
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

        <div class="subsidy-content fadeInUp">
        	<?php if ($info_communication['description']): ?>
        		<?php echo $info_communication['description']; ?>
        	<?php endif; ?>
        </div>
	</div>
                </div><!-- / col -->