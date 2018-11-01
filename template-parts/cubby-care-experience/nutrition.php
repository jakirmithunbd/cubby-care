<div class="tab-content">
    <div class="">
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