<div class="tab-content">
    <div class="">
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
</div><!-- / col -->
