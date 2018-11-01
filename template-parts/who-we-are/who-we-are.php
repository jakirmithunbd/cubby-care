<div class="tab-content">
    <div class="mission">
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
</div><!-- / col -->