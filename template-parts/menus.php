<div class="tab-content">
	<div class="subsidy">
		<?php 
		$info_menus = get_field('info_menu_item');
        var_dump($info_menus);
        $top = $info_menus['top_text'];
        ?>

        <div class="top-text fadeInUp">  
            <?php if ($top['title']): ?>
            <h2><?php echo $top['title']; ?></h2>
            <?php endif; ?>

            <?php if ($top['description']): ?>
                <?php echo $top['description']; ?>
            <?php endif; ?>
        </div>

        <div class="subsidy-content fadeInUp">
        	<?php if ($info_menus['description']): ?>
        		<?php echo $info_menus['description']; ?>
        	<?php endif; ?>
        </div>
	</div>
</div><!-- / col -->